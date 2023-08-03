@extends('admin.layout.header')

@section('content')
{{-- @dd($orders); --}}
<div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
  <div class="page-content">
    <div class="transition-all duration-150 container-fluid" id="page_layout">
      <div id="content_layout">

        <!-- BEGIN: Breadcrumb -->
        <div class="mb-5">
          <ul class="m-0 p-0 list-none">
            <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
              <a href="{{route('admin')}}">
                <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                <iconify-icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
              </a>
            </li>
           <a href="{{route('admin')}}">
            <li class="inline-block relative text-sm text-primary-500 font-Inter ">
              Dashboard
              <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
            </li>
            <a href="{{route('admin.orders.list')}}">
            <li class="inline-block relative text-sm text-primary-500 font-Inter">
              Order
              <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
              </li></a>
              <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
             View Order</li>
          </ul>
        </div>
        <!-- END: BreadCrumb -->
        @php
        $productDetails = json_decode($orders->product_details);

        @endphp

<div class="lg:col-span-4 col-span-12 mb-5">
  <div class="card h-full">
    <header class="card-header">
      <h4 class="card-title">Order Info</h4>
    </header>
    <div class="card-body p-6">
        <ul class="list space-y-8 mb-5">
            <div class="grid xl:grid-cols-3 grid-cols-1 gap-6">
                <li class="flex space-x-3 rtl:space-x-reverse">
                    <div class="flex-1">
                        <div class="uppercase text-xl text-slate-600 dark:text-slate-300 mb-1">
                        Order Number
                        </div>
                        <a href="#" class="text-base text-slate-400 dark:text-slate-50">
                            {{$orders->order_id}}
                        </a>
                    </div>
                </li>
                <!-- end single list -->
                <li class="flex space-x-3 rtl:space-x-reverse">
                    <div class="flex-1">
                        <div class="uppercase text-xl text-slate-600 dark:text-slate-300 mb-1">
                        Transaction Id
                        </div>
                        <a href="#" class="text-base text-slate-400 dark:text-slate-50">
                        {{$orders->transaction_id}}
                        </a>
                    </div>
                </li>
                <li class="flex space-x-3 rtl:space-x-reverse">
                    <div class="flex-1">
                        <div class="uppercase text-xl text-slate-600 dark:text-slate-300 mb-1">
                        Order Date
                        </div>
                        <a href="#" class="text-base text-slate-400 dark:text-slate-50">
                        {{ date('d-M-Y', strtotime($orders->created_at) ) }}
                        </a>
                    </div>
                </li>
            </div>
        </ul>

        <ul class="list space-y-8 mb-4">
          <div class="grid xl:grid-cols-3 grid-cols-1 gap-6">
            <li class="flex space-x-3 rtl:space-x-reverse">
              <div class="flex-1">
                <div class="uppercase text-xl text-slate-600 dark:text-slate-300 mb-2 leading-[12px]">
                 Payment Method
                </div>
                <a href="#" class="text-base text-slate-400 dark:text-slate-50">
                  {{$orders->payment_method}}
                </a>
              </div>
            </li>
            <!-- end single list -->
            <li class="flex space-x-3 rtl:space-x-reverse">

              <div class="flex-1">
                <div class="uppercase text-xl text-slate-600 dark:text-slate-300 mb-2 leading-[12px]">
                 Estimated Delivery Date
                </div>
                <a href="#" class="text-base text-slate-400 dark:text-slate-50">
                  {{$orders->estimated_delivery_date}}
                </a>
              </div>
            </li>
            <li class="flex space-x-3 rtl:space-x-reverse">

              <div class="flex-1">
                <div class="uppercase text-xl text-slate-600 dark:text-slate-300 mb-2 leading-[12px]">
                  status
                </div>
                <span class="badge bg-primary-500 text-primary-500 bg-opacity-30 capitalize">{{$orders->status}}</span>

              </div>
            </li>
            </div>
       </ul>

<ul class="list space-y-8 mb-8">
            <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                <li class="flex space-x-3 rtl:space-x-reverse">
                  <div class="flex-1">
                    <div class="uppercase text-lg text-slate-600 dark:text-slate-300 mb-1 ">
                      Shipping Address
                    </div>
                    <a href="#" class="text-base text-slate-400 dark:text-slate-50">
                      <div id="shipping_address"></div>
                      {{-- {{$orders->shipping_address}} --}}
                      @php
                        $shipping = json_decode($orders->shipping_address,true);
                        //dd($shipping);
                        if($shipping['shipping_fullname'] == null){
                            $shipping = json_decode($orders->billing_details,true);
                        }
                      @endphp

                        {!! str_replace(', ,',', ',implode(', ',$shipping)) !!}
                    </a>
                  </div>
                </li>
                <!-- end single list -->
                <li class="flex space-x-3 rtl:space-x-reverse">
                      <div class="flex-1">
                      <div class="uppercase text-lg text-slate-600 dark:text-slate-300 mb-1">
                          Billing Address
                      </div>
                      <a href="#" class="text-base text-slate-400 dark:text-slate-50">
                          <div id="billing_address"></div>
                          {{-- @dd($orders->billing_details); --}}
                          @php
                              $billing = json_decode($orders->billing_details,true);
                          @endphp
                            {!! str_replace(', ,',', ',implode(', ',$billing)) !!}
                      </a>
                      </div>
                </li>
            </div>
        </ul>

    </div>
  </div>
</div>


<div class="lg:col-span-4 col-span-12 mb-5">
  <div class="card h-full">
    <header class="card-header">
      <h4 class="card-title">Order summary</h4>
    </header>
   <div class="card">
                    <div class="card-body px-6 pb-6">
                      <div class="overflow-x-auto -mx-6">
                        <div class="inline-block min-w-full align-middle">
                          <div class="overflow-hidden ">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                              <thead class="bg-slate-200 dark:bg-slate-700">
                                <tr>

                                  <th scope="col" class=" table-th ">
                                    Item
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    Price
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    Quantity
                                  </th>
                                   <th scope="col" class=" table-th ">
                                    Totals (Include VAT)
                                  </th>
                                   {{-- <th scope="col" class=" table-th ">
                                    Order Date
                                  </th> --}}

                                </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                            @php
                            $productDetailsArray = json_decode($orders['product_details'], true);
                            //dd($productDetailsArray);
                            @endphp

                            @foreach($productDetailsArray as $product)
                                <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                  <td class="table-td">
                                    {{ $product['product_name'] }}
                                  
                                  </td>
                                  <td class="table-td">{{formatPrice($product['price'])}}</td>
                                  <td class="table-td ">{{$product['quantity']}}</td>

                                @php

                                    $product['price_with_tax'] = unforamtPrice($product['price_with_tax']);
                                    
                                    if(isset($product['discount']) && $product['discount']['type'] == 'flat'){
                                        $total = $product['price_with_tax'] * $product['quantity'] ;
                                    }
                                    else{
                                        $total = $product['price_with_tax'] * $product['quantity'];
                                    }
                                
                                    
                                @endphp

                                  <td class="table-td ">{{ (formatPrice($total)) }}</td>
                                  {{-- <td class="table-td ">{{date('d-M-Y',strtotime($orders['created_at']))}}</td> --}}
                                </tr>
                            @endforeach

                                    <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                        <td class="table-td" colspan="2" ></td>
                                            <td class="table-td" >
                                                Total Product Price <br>(Tax Inclusive)
                                            <td class="table-td">
                                        @php
                                                $fianlPrice = 0;
                                                foreach($productDetailsArray as $product){
                                                    $fianlPrice += (unforamtPrice($product['price_with_tax']) * $product['quantity']);
                                                }
                                        @endphp
                                        {{formatPrice($fianlPrice)}}
                                        </td>
                                    </tr>
                                    <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                        <td class="table-td" colspan="2" ></td>
                                            <td class="table-td" >
                                                Shippment Price
                                            <td class="table-td">
                                        @php
                                        $productDetailsArray = end($productDetailsArray);
                                        @endphp
                                        {{formatPrice($productDetailsArray['shipping_price'])}}
                                        </td>
                                    </tr>
                                    <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                        <td class="table-td" colspan="2" ></td>
                                            <td class="table-td" >
                                                Total
                                            <td class="table-td">
                                       
                                        {{formatPrice($fianlPrice + $productDetailsArray['shipping_price'])}}
                                        </td>
                                    </tr>

                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
  </div>
</div>

</div>
</div>
</div>
</div>
@endsection
