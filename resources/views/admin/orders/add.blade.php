
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
                    <a href="{{route('admin.shipping.list')}}">
                    <li class="inline-block relative text-sm text-primary-500 font-Inter">
                      Shipping
                      <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                      </li></a>
                      
                       
                    <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                      Add Shipping</li>
                  </ul>
                </div>
                <!-- END: BreadCrumb -->
                <div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
                  <!-- Basic Inputs -->
                  <div class="card">
                    <div class="card-body flex flex-col p-6">
                      <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                          <div class="card-title text-slate-900 dark:text-white">Add Category</div>
                        </div>
                      </header>
                      <div class="card-text h-full space-y-4">
                        <form action="{{route('admin.shipping.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="grid xl:grid-cols-2 grid-cols-1 gap-12>">
                            <div class="input-area mb-4">
                                <label for="name" class="form-label">Name</label>
                                <input id="name" name="name" type="text" class="form-control" required placeholder="Shipping Name">
                            </div>
                          
                        </div>
                        
                          <div class="grid xl:grid-cols-2 grid-cols-1 gap-12>">
                          <div class="input-area mb-4">
                            <label for="description" class="form-label">Status</label>
                            <select class="form-control" name="status">
                              <option value="1">Active</option>
                              <option value="2">In-Active</option>

                            </select>
                        </div>
                            </div>
                            <div class="input-area mb-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        
                        
                      </div>
                    </div>
                  </div>
               
                </div>

              </div>
            </div>
          </div>
        </div>
@endsection