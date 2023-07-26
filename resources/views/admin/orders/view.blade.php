@extends('admin.layout.header')

@section('content')

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
                        Order Id
                        </div>
                        <a href="#" class="text-base text-slate-400 dark:text-slate-50">
                        {{$orders->order_id}}
                        </a>
                    </div>
                </li>
            </div>
        </ul>

        <ul class="list space-y-8 mb-8">
            <div class="grid xl:grid-cols-3 grid-cols-1 gap-6">
                <li class="flex space-x-3 rtl:space-x-reverse">
                  <div class="flex-1">
                    <div class="uppercase text-lg text-slate-600 dark:text-slate-300 mb-1 ">
                      Shipping Address
                    </div>
                    <a href="#" class="text-base text-slate-400 dark:text-slate-50">
                      <div id="shipping_address"></div>
                      {{-- {{$orders->shipping_address}} --}}
                      @php
                          $shipping = $orders->shipping_address;
                      @endphp

                      <script>
                          var shipping = @json($shipping); // Convert PHP data to a JSON object
                          shipping = JSON.parse(shipping);

                          for(key in shipping){
                              console.log(key);
                              const el = `
                                  <p  class="text-slate-600 mb-1 capitalize"> <strong>${key.split('_')[1]}</strong> : ${shipping[key] == null ? '': shipping[key]} </p>
                              `;
                              $('#shipping_address').append(el);
                          }
                      </script>
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
                              $billing = $orders->billing_details;
                          @endphp

                          <script>
                              var billing = @json($billing); // Convert PHP data to a JSON object
                              billing = JSON.parse(billing);

                              for(key in billing){
                                  const el = `
                                      <p class="text-slate-600 mb-1 capitalize"> <strong class="text-zinc-500">${key}</strong> :  ${billing[key] == null ? '': billing[key]} </p>
                                  `;
                                  $('#billing_address').append(el);
                              }
                          </script>
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
    </div>
  </div>
</div>

{{-- <div class="card-text h-full space-x-3">

    <span class="badge bg-primary-500 text-primary-500 bg-opacity-30 capitalize">primary</span>

    <span class="badge bg-secondary-500 text-secondary-500 bg-opacity-30 capitalize">secondary</span>

    <span class="badge bg-info-500 text-info-500 bg-opacity-30 capitalize">info</span>

    <span class="badge bg-success-500 text-success-500 bg-opacity-30 capitalize">success</span>

    <span class="badge bg-warning-500 text-warning-500 bg-opacity-30 capitalize">warning</span>

    <span class="badge bg-danger-500 text-danger-500 bg-opacity-30 capitalize">danger</span>

    <span class="badge bg-slate-900 text-slate-900 dark:text-slate-200 bg-opacity-30 capitalize">dark</span>

  </div> --}}

<!--order summery-->

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
                                    Totals
                                  </th>

                                </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                                <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                  <td class="table-td">@if ($productDetails && count($productDetails) > 0)
                                    {{ $productDetails[0]->product_name }}
                                    @else
                                        N/A
                                    @endif
                                  </td>
                                  <td class="table-td">€12000</td>
                                  <td class="table-td ">1</td>
                                  <td class="table-td ">€15000</td>
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
