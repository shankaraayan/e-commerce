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
                <a href="index.html">
                  <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                  <iconify-icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                </a>
              </li>
              <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                Category
                <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
              </li>
              <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                Add New</li>
            </ul>
          </div>
          <!-- END: BreadCrumb -->


          <div class=" space-y-5">

            <div class="card">
              <header class=" card-header noborder">
                <h4 class="card-title">Category List
                </h4>
                <a href="{{route('admin.category.add')}}"> <button type="button" class="btn bg-slate-800 text-white" style="float:right;"> Add Category </button></a>
              </header>
              <div class="card-body px-6 pb-6">
                <div class="overflow-x-auto -mx-6 dashcode-data-table">
                  <span class=" col-span-8  hidden"></span>
                  <span class="  col-span-4 hidden"></span>
                  <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                      <table id="shorting-table" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                        <thead class=" bg-slate-200 dark:bg-slate-700">
                          <tr>

                            <th scope="col" class=" table-th ">
                              Id
                            </th>
                            <th scope="col" class=" table-th ">
                              Serial
                            </th>

                            <th scope="col" class=" table-th ">
                              Category Name
                            </th>

                            <th scope="col" class=" table-th ">
                              Slug
                            </th>
                            <th scope="col" class=" table-th ">
                              Parent Category
                            </th>

                            <th scope="col" class=" table-th ">
                              Description
                            </th>
                            <th scope="col" class=" table-th ">
                              Image
                            </th>
                            <th scope="col" class=" table-th ">
                                Action
                              </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                @foreach($category as $key=>$values)
                                <tr data-id="{{$values->id}}" id="row_1"  data-name="categories" >
                                    <td class="table-td">{{++$key}}</td>
                                    <td class="table-td ">
                                        {{-- <input type="hidden" id="row_id" name="row_id" value=""> --}}
                                       {{$values->serial}}
                                    </td>
                                    <td class="table-td ">{{$values->name}}</td>
                                    <td class="table-td ">{{$values->slug}}</td>
                                    <td class="table-td ">{{$values->where('id',$values->parent_id)->pluck('name')->first() ?? 'Null'}}</td>
                                    <td class="table-td ">{{$values->description}}</td>
                                    <td class="table-td ">
                                        <img width="100" src="{{asset('root/public/uploads/category/'.$values->image)}}" />
                                    </td>
                                    <td class="table-td ">
                                    <div class="flex space-x-3 rtl:space-x-reverse">
                                    <a href="{{ route('admin.category.edit',$values->id)}}">
                                        <button class="action-btn" type="button">
                                            <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                        </button>
                                    </a>
                                        <a href="{{route('admin.category.delete',$values->id)}}">
                                        <button class="action-btn" type="button">
                                            <iconify-icon icon="heroicons:trash"></iconify-icon>
                                        </button>
                                        </a>

                                    </div>
                                    </td>


                                </tr>
                                @endforeach
                           
                        </tbody>
                    </table>
                </div>
               
            </div>
        </div>
    </div>
</div>
{{-- {{$category->links()}} --}}
</div>
</div>
</div>
</div>
</div>


  @endsection
