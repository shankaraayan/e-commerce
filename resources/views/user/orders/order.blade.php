@extends('user.layout')

@section('dasboard_content')
<div class="orders_section table-responsive px-0">
        <div class="dash_title text-uppercase border-bottom pb-3 mb-4 fs-3">Order Details</div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @if(!empty($orders))
                    @foreach($orders as $order)

                    @php
                        $result = (json_decode($order['product_details'],true));
                        $shipping_data = (end($result));
                        $total = 0;
                        foreach($result as $product){
                            $tax = getTaxCountry((int)$product['shipping_country']);
                                                                    
                            if(empty($tax)){
                                $tax['vat_tax'] = 0;
                            }

                            if(isset($product['solar_product']) && $product['solar_product'] === 'yes'){
                                if($tax['short_code'] == 'DE'){
                                    $tax['vat_tax'] = 0;
                                }
                            }
                            $total+=($product['price']*$product['quantity'] + (@$product['price'] * $tax['vat_tax'] /100 * @$product['quantity']) );
                        }
                        $finalPrice = $total + $shipping_data['shipping_price'];

                    @endphp

                        <tr style="vertical-align: middle;">
                            <td><a href="#">{{$order['order_id']}}</a></td>
                            <td>{{ date('d-m-Y',strtotime($order['created_at'])) }}</td>
                            <td>{{$order['status']}}</td>
                             @php
                                $member = json_decode($order['product_details']);
                             @endphp

                            <td><span class="ci_green">{{ formatPrice($finalPrice) }}</span>
                            {{-- <span class="order_qty p text-muted">for 2 items</span> --}}
                            </td>
                            <td>
                                <a href="orders/{{$order['order_id']}}" class="btn ps-btn--warning fs-4">To Sue</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p>No order </p>
                @endif
            </tbody>
        </table>
    </div>
@endsection
