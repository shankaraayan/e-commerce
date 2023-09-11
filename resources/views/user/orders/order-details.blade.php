@extends('user.layout')

@section('dasboard_content')
@php
    $data = json_decode($orders['product_details'], true);
    $bank_transfer = end($data);
    $discount = end($data);
    $totalPrice = 0;


    // @dd($data);
    foreach ($data as $product) {
        $tax = getTaxCountry((int)$product['shipping_country']);
																
        if(empty($tax)){
            $tax['vat_tax'] = 0;
        }

        if(isset($product['solar_product']) && $product['solar_product'] === 'yes'){
            if(@$tax['short_code'] == 'DE'){
                $tax['vat_tax'] = 0;
            }
        }
        $totalPrice+=($product['price']*$product['quantity'] + (@$product['price'] * $tax['vat_tax'] /100 * @$product['quantity']) );
    }


    if(isset($discount['discount']) && $discount['discount']['type'] == 'flat'){
            $discountPrice = $discount['discount']['discount_value'] . " ".$discount['discount']['type'] . " OFF";
            $totalPrice =  $totalPrice - $discount['discount']['discount_value'];
     }
    elseif(isset($discount['discount']) && $discount['discount']['type'] == 'Percentage'){
            $discountPrice = $discount['discount']['discount_value'] . " ". " %OFF";
            $totalPrice = $totalPrice - ($totalPrice * $discount['discount']['discount_value'] / 100 );
    }
    else{
            $discountPrice = '0';
    }
@endphp
<div class="container-fluid">
    <div class="row mb-10">
        <div class="col-6">
            <h4 class="mb-2 text-uppercase"><b>Details zur Bestellung</b></h4>
            <p class="mb-3 ">Order Id #{{$orders['order_id']}}</p>
        </div>
        <div class="col-6">
            <p class="mb-3 text-right">Order Date {{date('d-M-Y',strtotime($orders['created_at']))}}</p>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row mb-20">
        <div class="col-12 col-md-12">
            <div class="order_details_info">
                <div class="table-responsive">
                    <table class="table single_order_details">
                        <thead>
                            <tr>
                                <th class="text-uppercase font-weight-bold border-top-0">Produkte</th>
                                <th class="text-uppercase font-weight-bold border-top-0 text-right">Insgesamt</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $products = json_decode($orders['product_details'], true);
                            $shipping_data = (end($products))
                        @endphp
                        @foreach($products as $product)
                            @php
                                $ProducttotalPrice = $product['price'] * $product['quantity'];
                                $product['total_price'] += $ProducttotalPrice;
                            @endphp
                            <tr>
                                <td class="order_name">{{$product['product_name']}} x <span class="order_qty">{{$product['quantity']}}</span></td>
                                <td class="text-right">{{ formatPrice($product['price'])}}</td>
                            </tr>
                        @endforeach
                            <tr>
                                <td>{{'Zwischensumme(including tax):'}}</td>
                                <td class="text-right">{{ formatPrice($totalPrice)}}</td>
                            </tr>
                            
                            <tr>
                                <td>Versand :</td>
                                <td class="text-right">
                                    {{formatPrice($shipping_data['shipping_price'])}}
                                </td>
                            </tr>
                            @if(isset($discount['discount']))
                                <tr>
                                    <td>Gutschein <span class="text-green font-weight-bold">{{$discount['discount']['code'] }}</span> :</td>
                                    <td class="text-right"> {!! $discountPrice !!}</td>
                                </tr>
                                
                            @endif
                            @if($bank_transfer['bank_transfer']==="yes")
                                    @php 
                                        $bank_dis = ($totalPrice+$shipping_data['shipping_price'])*3/100;
                                    @endphp
                                    <tr>
                                        <td>Rabatt :</td>
                                        <td class="text-right">{{formatPrice($bank_dis)}}</td>
                                    </tr>
                            @endif
                            <tr>
                                <td>Zahlungsmethode :</td>
                                <td class="text-right">{{$orders->payment_method}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold fs-2">Insgesamt</td>
                                <td class="font-weight-bold text-right fs-2">
                                    {{-- {{ formatPrice($totalPrice + $shipping_data['shipping_price'])}} --}}
                                    @if($bank_transfer['bank_transfer']==="yes")
                                        {{ formatPrice( ($totalPrice+$product['shipping_price'])-$bank_dis) }}
                                    @else
                                        {{ formatPrice($totalPrice+$product['shipping_price'] ?? 0)}}
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-50 border p-2">
        
        <div class="col-md-6">
            @php
                $shipping = json_decode($orders['shipping_address'], true);
                if($shipping['shipping_fullname'] == null && $shipping['shipping_billing_address1']==null){
                    $shipping = json_decode($orders['billing_details'], true);
                }
                $shipping = implode(', ', $shipping);
                $shipping = str_replace(', ,',', ', $shipping);
            @endphp
            <p>
                <b>Shipping Address - </b>
                {{$shipping}}
            </p>
        </div>
        <div class="col-md-6">

            @php
                $billing = json_decode($orders['billing_details'], true);
                $billing = implode(', ', $billing);
                $billing = str_replace(', ,',', ', $billing);
            @endphp
            <p>
            <b>Billing Address - </b>
                {{$billing}}
            </p>
        </div>
    </div>

</div>


@endsection
