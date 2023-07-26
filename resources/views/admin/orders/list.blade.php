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
              </li></a>
              <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                Orders</li>
            </ul>
          </div>
          <!-- END: BreadCrumb -->


          <div class=" space-y-5">

            <div class="card">
              <header class=" card-header noborder">
                <h4 class="card-title">Orders List
                </h4>

              </header>
              <div class="card-body px-6 pb-6">
                <div class="overflow-x-auto -mx-6 dashcode-data-table">
                  <span class=" col-span-8  hidden"></span>
                  <span class="  col-span-4 hidden"></span>
                  <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                      <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                        <thead class=" bg-slate-200 dark:bg-slate-700">
                          <tr>
                            <th scope="col" class=" table-th ">
                              Id
                            </th>
                            <th scope="col" class=" table-th ">
                             Order Number
                            </th>
                            <th scope="col" class=" table-th ">
                             Customer Name
                            </th>
                            <th scope="col" class=" table-th ">
                              Status
                            </th>
                            <th scope="col" class=" table-th ">
                              Action
                            </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                        @foreach($orders as $key=>$values)
                        @php
                        $productDetails = json_decode($values->product_details);

                        @endphp
                          <tr>
                            <td class="table-td">{{++$key}}</td>
                            <td class="table-td">{{$values->order_id}}</td>
                           @php
                                $billing =  json_decode($values->billing_details,true);

                            @endphp
                            <td class="table-td ">{{$billing['fullname']}}</td>
                             <td class="table-td ">
                                <span class="badge bg-primary-500 text-primary-500 bg-opacity-30 capitalize">{{$values->status}}</span>
                                {{-- <button class="badge bg-success-500 text-white capitalize" type="button">
                                    {{$values->status}}
                                </button> --}}
                            </td>

                            <td class="table-td ">
                                <a href="{{route('admin.orders.view',$values->id)}}" >
                                    <button class="btn btn-small inline-flex justify-center text-white bg-slate-600">
                                        <span class="flex items-center">
                                            <iconify-icon class="text-xl" icon="ic:baseline-remove-red-eye"></iconify-icon>
                                        </span>
                                    </button>
                                </a>
                            </td>
                          </tr>
                        @endforeach

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  @endsection