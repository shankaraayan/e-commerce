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
                Products</li>
            </ul>
          </div>
          <!-- END: BreadCrumb -->


          <div class=" space-y-5">

            <div class="card">
              <header class=" card-header noborder">
                <h4 class="card-title">Products List
                </h4>
                <a href="{{route('admin.product.add')}}"> <button type="button" class="btn text-white bg-slate-800" style="float:right;"> Add Product </button></a>
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
                              Product Name
                            </th>

                            <th scope="col" class=" table-th ">
                              Price
                            </th>

                            <th scope="col" class=" table-th ">
                              SKU
                            </th>
                            <th scope="col" class=" table-th ">
                              Stock
                            </th>
                            <th scope="col" class=" table-th ">
                              Type
                            </th>
                            <th scope="col" class=" table-th ">
                              Shipping Class
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
                        @foreach($product as $key=>$values)
                          <tr>
                            <td class="table-td">{{++$key}}</td>
                            <td class="table-td ">{{$values->product_name}}</td>
                            <td class="table-td ">€{{$values->price}}</td>
                            <td class="table-td ">{{$values->sku}}</td>
                            <td class="table-td ">{{$values->quantity}}</td>
                            <td class="table-td ">{{$values->type}}</td>
                            <td class="table-td ">{{shippingClass()->where('id',$values->shipping_class)->pluck('name')->first()}}</td>
                            <td class="table-td ">
                                @if ($values->status == 1)
                                    <span class="badge bg-success-500 text-success-500 bg-opacity-30">Active</span>
                              @else
                                    <span class="badge bg-danger-500 text-danger-500 bg-opacity-30">In active</span>

                              @endif
                            </td>
                            <td class="table-td ">
                              <div class="flex space-x-3 rtl:space-x-reverse">
                              <a href="{{route('product.detail',[$values->slug,'page'=>'view'])}}" target="_blank"> <button class="action-btn" type="button">
                                  <iconify-icon icon="heroicons:eye"></iconify-icon>
                                </button></a>
                                <a href="{{route('admin.product.edit',$values->id)}}">  <button class="action-btn" type="button">
                                  <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                </button></a>
                                <a href="{{route('feed',$values->slug)}}">  <button class="action-btn" type="button">
                                  <iconify-icon icon="fe:feed"></iconify-icon>
                                </button></a>
                                <a href="{{route('admin.product.delete',$values->id)}}">  <button class="action-btn" onclick="return confirm('Are you sure you want to delete this product?')" type="button">
                                  <iconify-icon icon="heroicons:trash"></iconify-icon>
                                </button></a>
                              </div>
                            </td>
                          </tr>
                        @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                {{$product->links()}}
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  @endsection
