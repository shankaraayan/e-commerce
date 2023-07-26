
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
                          <div class="card-title text-slate-900 dark:text-white">Edit Category</div>
                        </div>
                      </header>
                      <div class="card-text h-full space-y-4">
                        <form action="{{route('admin.category.update',$category->id)}}" method="post">
                        @csrf
                            <div class="input-area mb-4">
                                <label for="name" class="form-label">Name</label>
                                <input value="{{$category->name}}" id="name" name="name" type="text" class="form-control" placeholder="Category Name">
                            </div>
                            <div class="input-area mb-4">
                                <label for="slug" class="form-label">Slug</label>
                                <input name="slug" type="text" class="form-control" placeholder="slug" value="{{$category->slug}}">
                            </div>
                            <div class="input-area mb-4">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" rows="5" class="form-control" placeholder="Description">
                                {{$category->description}}
                                </textarea>
                            </div>
                            <div class="input-area mb-4">
                                <button type="submit" class="btn btn-primary">Update</button>
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
