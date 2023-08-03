
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
                      Forms
                      <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                    </li>
                    <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                      Input</li>
                  </ul>
                </div>
                <!-- END: BreadCrumb -->
                <div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
                  <!-- Basic Inputs -->
                  <div class="card">
                    <div class="card-body flex flex-col p-6">
                      <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                          <div class="card-title text-slate-900 dark:text-white">Add Sliders</div>
                        </div>
                      </header>
                      <div class="card-text h-full space-y-4">
                        <form action="{{route('admin.settings.slider.upload')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="input-area mb-4">
                                <label for="name" class="form-label" required>Slider url</label>
                                <input  name="slider_url" type="text" class="form-control" placeholder="url">
                            </div>
                            <div class="input-area mb-5">
                                <label for="select" class="form-label">Status</label>
                
                                <select id="select" name="status" class="form-control" required>
                             
                                    <option value="1" selected="" class="dark:bg-slate-700">Active</option>
            
                                    <option value="0" class="dark:bg-slate-700">Inactive</option>
                                </select>
                            </div>
                            <div class="input-area mb-4">
                                <label for="select" class="form-label">Choose Screen</label>
                                <div class="flex items-center space-x-7 flex-wrap">
                                    {{-- <div class="primary-radio">
                                        <label class="flex items-center cursor-pointer">
                                            <input type="radio" class="hidden" name="screen" value="desktop" checked="checked" />
                                            <span class="flex-none bg-white dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                            <span class="text-secondary-500 text-sm leading-6 capitalize">Desktop</span>
                                        </label>
                                    </div>
                                    <div class="primary-radio">
                                        <label class="flex items-center cursor-pointer">
                                            <input type="radio" class="hidden" name="screen" value="phone" checked="checked" />
                                            <span class="flex-none bg-white dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                            <span class="text-secondary-500 text-sm leading-6 capitalize">Phone</span>
                                        </label>
                                    </div> --}}
                                    <div class="primary-radio">
                                        <label class="flex items-center cursor-pointer">
                                            <input type="radio" class="hidden" name="screen" value="global_banner"  />
                                            <span class="flex-none bg-white dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                            <span class="text-secondary-500 text-sm leading-6 capitalize">Global Banner</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-area mb-4">
                                <div class="filegroup">
                                    <label>
                                      <span class="text-secondary-500 text-sm leading-6 capitalize">Phone Banner</span>
                                        <input name="phone" type="file" class=" w-full hidden"  required>
                                        <span class="w-full h-[40px] file-control flex items-center custom-class">
                                        <span class="flex-1 overflow-hidden text-ellipsis whitespace-nowrap">
                                        <span class="text-slate-400">Choose a file or drop it here...</span>
                                        </span>
                                        <span class="file-name flex-none cursor-pointer border-l px-4 border-slate-200 dark:border-slate-700 h-full inline-flex items-center bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400 text-sm rounded-tr rounded-br font-normal">Browse</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="input-area mb-4">
                                <div class="filegroup">
                                    <label>
                                      <span class="text-secondary-500 text-sm leading-6 capitalize">Desktop Banner</span>
                                        <input name="desktop" type="file" class=" w-full hidden"  required>
                                        <span class="w-full h-[40px] file-control flex items-center custom-class">
                                        <span class="flex-1 overflow-hidden text-ellipsis whitespace-nowrap">
                                        <span class="text-slate-400">Choose a file or drop it here...</span>
                                        </span>
                                        <span class="file-name flex-none cursor-pointer border-l px-4 border-slate-200 dark:border-slate-700 h-full inline-flex items-center bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400 text-sm rounded-tr rounded-br font-normal">Browse</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="input-area mb-4 flex items-center">
                                <button type="submit" class="btn inline-flex justify-center btn-outline-primary rounded-[25px]">
                                    <span class="flex items-center">
                                        <span>UPLOAD</span>
                                    <iconify-icon class="text-xl ltr:ml-2 rtl:mr-2" icon="heroicons:cloud-arrow-up-solid"></iconify-icon>
                                    </span>
                                </button>
                                
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