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
                  <div class="card-title text-slate-900 dark:text-white">{{$attributeName->attribute_name}} Attribute Terms</div>
                </div>
              </header>
              <form id="multipleValidation" action="{{route('admin.product.attribute_terms.store')}}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="card-text h-full space-y-4">
                <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                <div class="input-area">
                  <label for="name" class="form-label">Attribute Terms Name*</label>
                  <input id="attribute_term_name" name="attribute_term_name" type="text" class="form-control" placeholder="Attribute Term Name" required="required">
                  @if ($errors->has('attribute_term_name'))
                    <span class="text-danger">{{ $errors->first('attribute_term_name') }}</span>
                  @endif
                </div>
                @if($attributeName->attribute_type=='panel')
                <div class="input-area">
                  <label for="name" class="form-label">kWh*</label>
                  <input id="attribute_term_kWh_name" name="attribute_term_kWh_name" type="text" class="form-control" placeholder="kWh" required="required">
                  @if ($errors->has('attribute_term_kWh_name'))
                    <span class="text-danger">{{ $errors->first('attribute_term_kWh_name') }}</span>
                  @endif
                </div>
                @endif
                @if($attributeName->attribute_type=='inverter')
                <div class="input-area">
                  <label for="name" class="form-label">Supported Wh</label>

                  @foreach ($attributesTermsWh as $value)
                  @if(isset($value->attribute_term_kWh_name))
                  <label>
                    <input type="checkbox" name="supported_wh[]" value="{{ $value->attribute_term_kWh_name }}" required="required">
                    {{ $value->attribute_term_kWh_name }}
                  </label>
                  @endif
                @endforeach
                  @if ($errors->has('attribute_term_kWh_name'))
                    <span class="text-danger">{{ $errors->first('attribute_term_kWh_name') }}</span>
                  @endif
                </div>
                  @endif

                </div>

                <input type="hidden" name="attributes_id" value="{{$attributeName->id}}"/>
                <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                <div class="input-area">
                  <label for="name" class="form-label">Price*</label>
                  <input id="price" name="price" type="text" class="form-control" placeholder="price" required="required">
                  @if ($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                  @endif
                </div>
                
                <div class="input-area">
                  <label for="name" class="form-label">SKU*</label>
                  <input id="sku" name="sku" type="text" class="form-control" placeholder="sku" required="required">
                  @if ($errors->has('sku'))
                    <span class="text-danger">{{ $errors->first('sku') }}</span>
                  @endif
                </div>

                <div class="input-area">
                  <label for="name" class="form-label">Quantity*</label>
                  <input id="quantity" name="quantity" type="text" class="form-control" placeholder="quantity" required="required">
                  @if ($errors->has('quantity'))
                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                  @endif
                </div>

                </div>
                <div class="input-area">
                  <label for="description" class="form-label">Attribute Term Description*</label>
                  <textarea id="description" name="attribute_term_description" rows="5" class="form-control" placeholder="Type Here" required="required"></textarea>
                  @if ($errors->has('attribute_term_description'))
                  <span class="text-danger">{{ $errors->first('attribute_term_description') }}</span>
                @endif
                </div>
                <div class="input-area">
                    <label for="description" class="form-label">Attribute Term Html*</label>
                    <textarea id="description" name="component_description" rows="5" class="form-control" placeholder="Type Here" required="required"></textarea>
                    @if ($errors->has('attribute_term_description'))
                    <span class="text-danger">{{ $errors->first('attribute_term_html') }}</span>
                  @endif
                  </div>
                  <div class="input-area">
                    <label for="" class="priority">Priority</label>
                    <select  name="component_priority"  class="form-control">
                        <option  value="0"  class="dark:bg-slate-700">Choose priority</option>
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
                  <input type="file" name="image" required="required">
                </div>
                <div class="input-area mb-5">
                  <label for="select" class="form-label">Status</label>
                  <div class="flex items-center mr-2 sm:mr-4 mt-2 space-x-2">
                    <label class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
                    <input onclick="this.checked ? this.value=1 : this.value=0" name="status"  type="checkbox"  class="sr-only peer">

                    <div class="w-14 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:z-10 after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary-500">

                    </div>
                    </label>

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

<div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
  <div class="page-content">
    <div class="transition-all duration-150 container-fluid" id="page_layout">
      <div id="content_layout">
        <div class=" space-y-5">
                  <div class="card">
                    <header class=" card-header noborder">
                      <h4 class="card-title">Attributes Term List
                      </h4>
                     {{-- <a href="{{route('admin.product.attribute.add')}}"> <button type="button" class="btn btn-primary" style="float:right;"> Add Attribute </button></a> --}}
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
                                    Attribute Term Name
                                  </th>
                                  <th scope="col" class=" table-th ">
                                    SKU
                                  </th>
                                  <th scope="col" class=" table-th ">
                                    Quantity
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    WH
                                  </th>
                                  <th scope="col" class=" table-th ">
                                    Price
                                  </th>

                                  {{--<th scope="col" class=" table-th ">
                                    Status
                                  </th> --}}
                                  <th scope="col" class=" table-th ">
                                      Action
                                    </th>
                                </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                @foreach($attributesTerms as $key=>$values)
                                <tr>
                                  <td class="table-td">{{++$key}}</td>
                                  <td class="table-td ">{{$values->attribute_term_name}}</td>
                                  <td class="table-td ">{{$values->sku}}</td>
                                  <td class="table-td ">{{$values->quantity}}</td>
                                  <td class="table-td ">{{$values->attribute_term_kWh_name}}</td>

                                  <td class="table-td ">{{$values->price}}</td>

                                  {{-- <td class="table-td ">
                                      <div>{{$values->attribute_terms_status == 1?'Active':'IN ACTIVE'}}
                                      </div>
                                  </td> --}}
                                  <td class="table-td ">
                                    <div class="flex space-x-3 rtl:space-x-reverse">
                                     {{-- <button class="action-btn" type="button">
                                        <iconify-icon icon="heroicons:eye"></iconify-icon>
                                      </button> --}}
                                      <a href="{{ route('admin.product.attribute_terms.edit', [$values->id]) }}">

                                        <button class="action-btn" type="button">
                                            <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                        </button>
                                    </a>
                                        <a href="{{route('admin.product.attribute_terms.delete',$values->id)}}">
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
                </div>

              </div>
            </div>
          </div>
        </div>
  @endsection
