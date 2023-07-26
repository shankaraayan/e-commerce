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
            <a href="{{route('admin')}}">
            <li class="inline-block relative text-sm text-primary-500 font-Inter ">
              Dashboard
              <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
            </li>
            </a>
            <a href="{{route('admin.product.attribute.list')}}">
            <li class="inline-block relative text-sm text-primary-500 font-Inter">
              Attribute
              <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
              </li></a>
              
              <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
              View Attribute</li>
          </ul>
        </div>
        <!-- END: BreadCrumb -->


<div class="lg:col-span-2 col-span-6">
  <div class="card h-full">
    <header class="card-header">
      <h4 class="card-title">Info</h4>
    </header>
    <div class="card-body p-6">
      <ul class="list space-y-8">
        <div class="grid xl:grid-cols-3 grid-cols-1 gap-6">
        <li class="flex space-x-3 rtl:space-x-reverse">
          <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
            {{-- <iconify-icon icon="heroicons:envelope"></iconify-icon> --}}
          </div>
          <div class="flex-1">
            <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
              Attribute Name
            </div>
            <a href="#" class="text-base text-slate-600 dark:text-slate-50">
              {{$attribute->attribute_name}}
            </a>
          </div>
        </li>
        <!-- end single list -->
        <li class="flex space-x-3 rtl:space-x-reverse">
          <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
            {{-- <iconify-icon icon="heroicons:phone-arrow-up-right"></iconify-icon> --}}
          </div>
          <div class="flex-1">
            <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
              Attribute Type
            </div>
            <a href="#" class="text-base text-slate-600 dark:text-slate-50">
             {{$attribute->attribute_type}}
            </a>
          </div>
        </li>
        <li class="flex space-x-3 rtl:space-x-reverse">
          <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
            {{-- <iconify-icon icon="heroicons:phone-arrow-up-right"></iconify-icon> --}}
          </div>
          <div class="flex-1">
            <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
              Attribute Description
            </div>
            <a href="#" class="text-base text-slate-600 dark:text-slate-50">
              {{$attribute->attribute_description}}
            </a>
          </div>
          
         
        </li>
        
        </div>
        <!-- end single list -->


       




        <!-- end single list -->
      </ul>
    </div>
  </div>
</div>

 <!-- Formatter Support -->
 <div class="card xl:col-span-2 rounded-md bg-white dark:bg-slate-800 lg:h-full shadow-base">

 </div>
</div>

</div>
</div>
</div>
</div>
@endsection