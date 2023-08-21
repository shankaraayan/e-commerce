
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
                      Payment Gatway
                      <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                    </li>
                    <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                      Add</li>
                  </ul>
                </div>
                <!-- END: BreadCrumb -->
                <form action="{{route('admin.settings.payment-gatway.update',$gatway->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="grid xl:grid-cols-2 grid-cols-2 gap-6">
                  <!-- Basic Inputs -->
                  <div class="card">
                    <div class="card-body flex flex-col p-6">
                      <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                          <div class="card-title text-slate-900 dark:text-white">Add Pyment Gatway Method</div>
                        </div>
                      </header>
                      <div class="card-text h-full space-y-4">
                        
                            <div class="input-area mb-5">
                                <label for="select" class="form-label">Status</label>
                                <select id="select" name="status" class="form-control" required>
                                    <option value="1" class="dark:bg-slate-700" @if(@$gatway->status == '1') selected @endif>Active</option>
                                    <option value="0" class="dark:bg-slate-700" @if(@$gatway->status == '0') selected @endif>Inactive</option>
                                </select>
                            </div>
                            <div class="input-area mb-5">
                                <label for="select" class="form-label">Mode</label>
                                <select id="select" name="mode" class="form-control" required>
                                    <option value="0" class="dark:bg-slate-700" @if(@$gatway->mode == '0') selected @endif>Sandbox</option>
                                    <option value="1" class="dark:bg-slate-700" @if(@$gatway->mode == '1') selected @endif>Live</option>
                                </select>
                            </div>

                            <div class="input-area mb-4">
                                <label for="select" class="form-label">APP Name</label>
                                <input type="text" name="app_name" class="form-control" value="{{$gatway->app_name}}">
                            </div>
                            <div class="input-area mb-4">
                                <label for="select" class="form-label">APP ID</label>
                                <input type="text" name="app_id" class="form-control" value="{{$gatway->app_id}}">
                            </div>
                            <div class="input-area mb-4">
                                <label for="select" class="form-label">Currency</label>
                                <input type="text" name="PAYPAL_CURRENCY" class="form-control" value="{{$gatway->PAYPAL_CURRENCY}}">
                            </div>
                            
                            <div class="input-area mb-4">
                                <div class="filegroup">
                                    <label>
                                      <span class="text-secondary-900 text-sm leading-6 capitalize">Logo Image</span>
                                        <input name="logo" type="file" class=" w-full hidden" >
                                        <span class="w-full h-[40px] file-control flex items-center custom-class">
                                        <span class="flex-1 overflow-hidden text-ellipsis whitespace-nowrap">
                                        <span class="text-slate-800">Choose a file or drop it here...</span>
                                        </span>
                                        <span class="file-name flex-none cursor-pointer border-l px-4 border-slate-200 dark:border-slate-700 h-full inline-flex items-center bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400 text-sm rounded-tr rounded-br font-normal">Browse</span>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div>
                                Icon -
                                    <img width="100px" src="{{asset('root/public/uploads/payment-gatway/'.$gatway->logo)}}" />
                                 
                            </div>

                        </div>
                    </div>
                    </div>

                        <div class="card">
                            <div class="card-body flex flex-col p-6">
                                <div class="card-text h-full space-y-4 mb-4">
                                    <div class="input-area mb-4">
                                        <label for="select" class="form-label">Client ID</label>
                                        <input type="text" name="client_id" class="form-control" value="{{$gatway->API_KEY}}">
                                    </div>
                                    <div class="input-area mb-4">
                                        <label for="select" class="form-label">Client Secret</label>
                                        <input type="password" name="secret" class="form-control" value="{{$gatway->API_SECRET}}">
                                    </div>
                                    <div class="input-area mb-4">
                                        <label for="select" class="form-label">Success Callback URL </label>
                                        <input type="text" name="PAYPAL_SUCCESS_URL" class="form-control" value="{{$gatway->PAYPAL_SUCCESS_URL}}">
                                    </div>
                                    <div class="input-area mb-4">
                                        <label for="select" class="form-label">Failed Callback URL </label>
                                        <input type="text" name="PAYPAL_FAILED_URL" class="form-control" value="{{$gatway->PAYPAL_FAILED_URL}}">
                                    </div>

                                </div>

                                <div class="input-area mb-4 flex items-center">
                                    <button type="submit" class="btn inline-flex justify-center btn-outline-primary rounded-[25px]">
                                        <span class="flex items-center">
                                            <span>Update</span>
                                        <iconify-icon class="text-xl ltr:ml-2 rtl:mr-2" icon="heroicons:cloud-arrow-up-solid"></iconify-icon>
                                        </span>
                                    </button>
                                </div>

                          


                        
              
                      </div>
                    </div>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
@endsection