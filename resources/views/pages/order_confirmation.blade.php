@extends('../Layout.Layout')
@section('style')
<style>
    :root {
  --blue-color: #33507f;
  --green-color: #4b9f64;
}
:root {
  --space-unit: 1em;
  --space-xxxxs: calc(0.09 * var(--space-unit));
  --space-xxxs: calc(0.146 * var(--space-unit));
  --space-xxs: calc(0.236 * var(--space-unit));
  --space-xs: calc(0.382 * var(--space-unit));
  --space-sm: calc(0.618 * var(--space-unit));
  --space-md: calc(1 * var(--space-unit));
  --space-lg: calc(1.618 * var(--space-unit));
  --space-xl: calc(2.618 * var(--space-unit));
  --space-xxl: calc(4.236 * var(--space-unit));
  --space-xxxl: calc(6.854 * var(--space-unit));
  --space-xxxxl: calc(11.08 * var(--space-unit));
  --component-padding: var(--space-xxxl);
}
.order_thankyou{
  border: dashed 3px var(--green-color);
}
.order_thankyou .thanyou_customer_name{
  color: var(--green-color);
  font-weight: 600;
}
.order_thankyou .thanyou_customer_name{
  color: var(--green-color);
  font-weight: 600;
}
.order_thankyou .check_icon i{
  color: var(--green-color);
}
.order_thankyou .check_icon i{
  color: var(--green-color);
}
.thankyou_message {
  border: solid 1px var(--green-color);
  padding: 30px;
  border-radius: 5px;
  box-shadow: 1px 1px 10px 1px #00000029;
}
.thankyou_page_track .thankyou_tracking_btn .btn{
  padding: 6px 30px;
  font-size: 24px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.thankyou_page_track .thankyou_tracking_btn .btn:hover {
  background: #fff !important;
  border: solid 1px var(--green-color) !important;
  color: var(--green-color) !important;
}
.thankyou_page_track .thankyou_tracking_btn i {
  font-size: 3rem;
}
.order_details_tbl {
  max-width: 991px;
  margin-left: auto;
  margin-right: auto;
}
</style>
@endsection

@section('content')
    <!--------------- Cart Page HTML Start ------------------------->

    <div class="thankyou-page-section pt-70 pb-70">
        <div class="container">

                <div class="row mb-100 justify-content-center">
                    <div class="col-12 col-md-10">
                        <div class="order_thankyou d-flex align-items-center justify-content-center p-4">
                            <div class="check_icon">
                                <i class="icon-checkmark-circle" style="font-size: 5rem;"></i>
                            </div>
                            <div class="order_details_msg ml-3">
                                <h3 class="font-weight-normal mb-0">Vielen Dank, <span class="thanyou_customer_name">
                                    @php
                                        $name = \App\Models\User::whereId($order->user_id)->pluck('name')->first();
                                    @endphp
                                    {{$name}}
                                    .
                                </span> Ihre Bestellung ist eingegangen.</h3>
                                        <h5>Order Id <span class="order_ID"><a href="#">#{{ $order->order_id }}</a></span></h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row order_details_tbl mb-100 justify-content-center">
                    <div class="col-6 col-md-3 col-lg-3 border-right">
                        <div class="order_number text-center">
                            <h4>Bestellnr:</h4>
                            <p class="order_no"><b># <a href="javascript:void(0);">{{$order->order_id}}</a></b></p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-3 border-right">
                        <div class="order_number text-center">
                            <h4>Datum</h4>
                            <p class="order_date">{{date('d-M-Y',strtotime($order['created_at']))}}</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-3 border-right">
                        <div class="order_number text-center">
                            <h4>Gesamt</h4>
                            @php
                                $data = json_decode($order['product_details'], true);
                                $totalPrice = 0;
                                    $shipping_data = (end($data));

                                foreach ($data as $product) {
                                    $totalPrice += $product['price'] * $product['quantity'];
                                }
                            @endphp
                            <p class="order_total">{{ formatPrice($totalPrice + $shipping_data['shipping_price'])}}</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-3">
                        <div class="order_number text-center">
                            <h4>Zahlungsmethode</h4>
                            <p class="order_pay_method">{{$order->payment_method}}</p>
                        </div>
                    </div>
                </div>

                <div class="row mb-50 justify-content-center">
                    <div class="col-12 col-md-10">
                        <div class="order_details_info">
                            <div class="table-responsive">
                                <h3 class="mb-5 text-center text-uppercase">Details zur Bestellung</h3>
                                <table class="table single_order_details">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase font-weight-bold border-top-0">Produkte</th>
                                            <th class="text-uppercase font-weight-bold border-top-0 text-right">Insgesamt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $products = json_decode($order['product_details'], true);

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
                                            <td>Zwischensumme :</td>
                                            <td class="text-right">{{ formatPrice($totalPrice)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Versand :</td>
                                            <td class="text-right">

                                                {{ formatPrice($product['shipping_price'] ?? 0)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Zahlungsmethode :</td>
                                            <td class="text-right">{{$order->payment_method}}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold fs-2">Insgesamt</td>
                                            <td class="font-weight-bold text-right fs-2">{{ formatPrice($totalPrice+$product['shipping_price'] ?? 0)}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
    <!--------------- Cart Page HTML End ------------------------->
@endsection
