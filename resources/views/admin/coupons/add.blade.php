
@extends('admin.layout.header')

@section('content')
<style>
    .text-danger{
        color:red;
    }
</style>
@php
    $country = country();
@endphp
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
                    <a href="{{route('admin.category.list')}}">
                    <li class="inline-block relative text-sm text-primary-500 font-Inter">
                      Categories
                      <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                      </li></a>
                      <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                      Add Coupon</li>
                  </ul>
                </div>
                <!-- END: BreadCrumb -->
                <form action="{{route('admin.coupon.store')}}" method="post" enctype="multipart/form-data" id="multipleValidation">
                    @csrf
                    <div class="grid xl:grid-cols-2 flex gap-6">
                        <!-- Basic Inputs -->
                            <div class="w-3/5">
                                    <div class="card">
                                        <div class="card-body flex flex-col p-6">
                                            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                                <div class="flex-1">
                                                <div class="card-title text-slate-900 dark:text-white">New Coupon</div>
                                                </div>
                                            </header>
                                            <div class="card-text h-full space-y-4">

                                                <div>

                                                    <div class="input-area mb-4">
                                                        <label for="code" class="form-label">Code</label>
                                                        <input id="code" disabled name="code" type="text" class="form-control" placeholder="Auto Genrated" required>
                                                    </div>

                                                    <div class="input-area mb-4">
                                                        <label for="country" class="form-label">Applicable (Type)</label>
                                                        <select name="appliable_on" class="form-control w-full mt-2">
                                                            <option value="" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select Coupon Type</option>
                                                            <option value="flat" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Flat discount</option>
                                                            <option value="Percentage" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Percentage</option>
                                                        </select>
                                                        @if(session()->has('coupan_code_errore'))
                                                            @error('coupon_type')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        @endif
                                                    </div>



                                                    <div class="input-area mb-4">
                                                        <label for="price" class="form-label">Price</label>
                                                        <input  name="price" type="number" class="form-control" placeholder="e.g. 10" value={{old('price')}}>
                                                        @if(session()->has('coupan_code_errore'))
                                                            @error('price')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        @endif
                                                    </div>
                                                    <div class="input-area mb-4">
                                                        <label for="use_limit" class="form-label">Limited use</label>
                                                        <select name="limit_use" class="form-control w-full mt-2">
                                                            <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                                            <option value="single" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600" {{ old('limited_use') === 'single' ? 'selected' : '' }}>Single Use</option>
                                                            <option value="multiuse" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600" {{ old('limited_use') === 'multiuse' ? 'selected' : '' }}>Multi Use</option>
                                                        </select>
                                                        @if(session()->has('coupan_code_errore'))
                                                            @error('limited_use')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        @endif
                                                    </div>
                                                    <div class="input-area mb-4">
                                                        <label for="min_order" class="form-label">Min order</label>
                                                        <input id="min_order" name="min_order" type="text" class="form-control" placeholder="Min order value" value={{old('min_order')}}>
                                                        @if(session()->has('coupan_code_errore'))
                                                        @error('min_order')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    @endif
                                                    </div>

                                                    <div class="input-area mb-4 ">
                                                        <label for="default-picker" class=" form-label">Coupon Expire Date</label>
                                                        <input name="expiry_date" class="form-control py-2 flatpickr flatpickr-input active" id="default-picker" value="" type="text" readonly="readonly" value="{{old('expiry_date')}}">
                                                    </div>
                                                    <div class="input-area mb-4">
                                                        <label for="status" class="form-label">Status</label>
                                                        <div class="flex items-center mr-2 sm:mr-4 mt-2 space-x-2">
                                                            <label class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
                                                            <input onclick="this.checked ? this.value=1 : this.value=0" name="status"  type="checkbox"  class="sr-only peer">
                                                            <div class="w-14 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:z-10 after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary-500">
                                                            </div>

                                                        </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                  </div>
                            </div>
                            <div class="w-2/5">
                                <div class="card">
                                    <div class="card-body flex flex-col p-6">
                                        <div class="input-area mb-4">
                                            <label for="country" class="form-label">Country</label>
                                            <select required name="applicable_country[]" id="country" class="select2 form-control w-full mt-2 py-2" multiple="multiple">
                                                <option value="all" class="inline-block font-Inter font-normal text-sm text-slate-600" {{ in_array('all', old('country', [])) ? 'selected' : '' }}>All</option>
                                                @foreach ($country as $country)
                                                <option value="{{$country->id}}" class="inline-block font-Inter font-normal text-sm text-slate-600" {{ in_array($country->id, old('country', [])) ? 'selected' : '' }}>{{$country->country}}</option>
                                                @endforeach
                                            </select>
                                            @if(session()->has('coupan_code_errore'))
                                                @error('country')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            @endif
                                        </div>

                                        <div class="input-area mb-4">
                                            <label for="specific_user" class="form-label">Specific User</label>
                                            <select name="specific_user" class="form-control w-full mt-2" id="specific_user">
                                                <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                                <option value="1" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Yes</option>
                                                <option value="0" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">No</option>
                                            </select>
                                            @if(session()->has('coupan_code_errore'))
                                                @error('specific_user')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            @endif
                                        </div>
                                        <div class="input-area mb-4">
                                            <div id="specific_user_option" style="display:none">
                                                <label for="user_id" class="form-label">Users (coma "," Saperated)</label>
                                                <input type="text" name="user_id" class="form-control" value="{{old('userList')}}">
                                            </div>

                                        </div>
                                        @php
                                            $category_data = categories();
                                        @endphp

                                        <div class="input-area mb-8">
                                            <label for="category_check" class="form-label">Applicable on</label>
                                           <div class="flex flex-col gap-4">
                                                <div>
                                                    <input type="checkbox" id="category_check" value="category" name="include_category" class=" mb-4"> Category
                                                </div>
                                               <div>
                                                    <input type="checkbox" id="products_check" value="product" name="include_product"> Product
                                               </div>

                                           </div>

                                        </div>

                                        <div style="display:none" id="CategorytContaier" class="mb-8">
                                            <label for="multiSelect" class="form-label">Category</label>
                                            <select name="exclude_category[]" id="multiSelect" class="select2 form-control w-full mt-2 py-2" multiple="multiple">
                                                @foreach ($category_data as $categpry)

                                                    <option value="{{$categpry->id}}" class=" inline-block font-Inter font-normal text-sm text-slate-600" {{ in_array($categpry->id, old('categoryList', [])) ? 'selected' : '' }}>{{$categpry->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>


                                        <div style="display:none" id="productContaier" class="mb-8">
                                            <label for="products" class="form-label">Products</label>
                                            <select name="exclude_product[]" id="products" class="select2 form-control w-full mt-2 py-2" multiple="multiple">
                                                <option value="option1" class=" inline-block font-Inter font-normal text-sm text-slate-600">Option 1</option>

                                            </select>
                                        </div>

                                        <div class="input-area mb-4">
                                            <button type="submit" class="btn text-white bg-slate-800">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      </div>
                    </form>
                    </div>
              </div>
            </div>
          </div>
        </div>

        <script>

            $(document).ready(function(){

                // specific user
                $("#specific_user").on('change',function(){
                    let specific_user = $(this).val();

                   if(specific_user.trim() === "1"){
                        $("#specific_user_option select").attr('required','required');
                        $("#specific_user_option").fadeIn();

                   }else{
                        $("#specific_user_option select").removeAttr('required','required');
                        $("#specific_user_option").fadeOut();
                   }
                })

                //category enable
                $("#category_check").on('change',function(){
                    if ($(this).is(":checked")) {
                        $("#CategorytContaier select").attr('required','required');
                        $("#CategorytContaier").fadeIn();
                    }
                    else
                    {
                        $("#CategorytContaier select").removeAttr('required','required');
                        $("#CategorytContaier").fadeOut();
                    }
                })

                // product enable
                $("#products_check").on('change',function(){
                    const con = document.querySelector("#productContaier");
                    console.log(con);
                    if ($(this).is(":checked")) {
                        $("#productContaier select").attr('required','required');
                        $("#productContaier").css("display","block");
                    }
                    else
                    {
                        $("#productContaier select").removeAttr('required','required');
                        $("#productContaier").fadeOut();
                    }
                })
            })
        </script>
@endsection
