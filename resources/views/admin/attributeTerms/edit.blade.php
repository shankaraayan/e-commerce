@extends('admin.layout.header')

@section('content')

<style>
.gaps-6 {
    gap: 0.5rem;
}
.text-danger{
  color: red;
}
</style>
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
            </a>
             <a href="{{route('admin.product.attribute.list')}}">
            <li class="inline-block relative text-sm text-primary-500 font-Inter">
              Attribute
              <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
              </li>
              </a>

            {{--<li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
              Add Attribute Term

              </li> --}}


          </ul>
        </div>
        <!-- END: BreadCrumb -->

        <div class="grid xl:grid-cols-1 grid-cols-1">
          <!-- Basic Inputs -->
          <div class="card">
            <div class="card-body flex flex-col p-6">
              <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                  <div class="card-title text-slate-900 dark:text-white">{{$attributeTerms->attribute_term_name}} Attribute Terms</div>
                </div>
              </header>

              <form action="{{route('admin.product.attribute_terms.update',[$attributeTerms->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="attributes_id" value="{{$attributeTerms->attributes_id}}">
              <div class="card-text h-full space-y-4">
                <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                <div class="input-area">
                  <label for="name" class="form-label">Attribute Terms Name*</label>
                  <input id="attribute_term_name" name="attribute_term_name" type="text" class="form-control" placeholder="Attribute Term Name" value="{{$attributeTerms->attribute_term_name}}">
                  @if ($errors->has('attribute_term_name'))
                    <span class="text-danger">{{ $errors->first('attribute_term_name') }}</span>
                  @endif
                </div>

                <div class="input-area">
                  <label for="name" class="form-label">kWh*</label>
                  <input id="attribute_term_kWh_name" name="attribute_term_kWh_name" type="text" class="form-control" placeholder="kWh" value="{{$attributeTerms->attribute_term_kWh_name}}" required>
                  @if ($errors->has('attribute_term_kWh_name'))
                    <span class="text-danger">{{ $errors->first('attribute_term_kWh_name') }}</span>
                  @endif
                </div>

                </div>

                <input type="hidden" name="id" value="{{$attributeTerms->id}}"/>
                <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                <div class="input-area">
                  <label for="name" class="form-label">Price*</label>
                  <input id="price" name="price" type="text" class="form-control" placeholder="price" value="{{$attributeTerms->price}}">
                  @if ($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                  @endif
                </div>
                </div>
                <div class="input-area">
                  <label for="description" class="form-label">Attribute Term Description*</label>
                  <textarea id="description" name="attribute_term_description" rows="5" class="form-control" >{{$attributeTerms->attribute_term_description}}</textarea>
                  @if ($errors->has('attribute_term_description'))
                  <span class="text-danger">{{ $errors->first('attribute_term_description') }}</span>
                @endif
                </div>
                <div class="input-area">
                    <label for="description" class="form-label">Attribute Term Html*</label>
                    <textarea id="description" name="component_description" rows="5" class="form-control" placeholder="Type Here">{{ @$attributeTerms->component_description }}</textarea>
                    @if ($errors->has('attribute_term_description'))
                    <span class="text-danger">{{ $errors->first('attribute_term_html') }}</span>
                  @endif
                  </div>
                  <div class="input-area">
                    <label for="" class="priority">Priority</label>
                    <select  name="component_priority"  class="form-control">
                        @if (!empty(@$attributeTerms->component_priority))
                            <option selected value="{{@$attributeTerms->component_priority}}" class="dark:bg-slate-700">Choose priority</option>
                        @endif
                        <option value="0" class="dark:bg-slate-700">Choose priority</option>
                        <option value="1" class="dark:bg-slate-700">1</option>
                        <option value="2" class="dark:bg-slate-700">2</option>
                        <option value="3" class="dark:bg-slate-700">3</option>
                        <option value="4" class="dark:bg-slate-700">4</option>
                        <option value="5" class="dark:bg-slate-700">5</option>
                        <option value="6" class="dark:bg-slate-700">6</option>
                        <option value="7" class="dark:bg-slate-700">7</option>
                        <option value="8" class="dark:bg-slate-700">8</option>
                        <option value="9" class="dark:bg-slate-700">9</option>
                        <option value="10" class="dark:bg-slate-700">10</option>
                    </select>
                  </div>
                <div class="input-area mb-5">
                  <label for="select" class="form-label">Image</label>
                  <input type="file" name="image">
                </div>
                </div>

                <div class="input-area">
                  <button class="btn inline-flex justify-center btn-dark" style="float:right; margin-top:15px;">Submit</button>
                </div>
              </div>

            </form>
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
