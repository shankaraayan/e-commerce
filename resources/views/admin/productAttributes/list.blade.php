@extends('admin.layout.header')

@section('content')
<div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
    <div class="page-content">
      <div class="transition-all duration-150 container-fluid" id="page_layout">
        <div id="content_layout" class="fiexed top-0 right-0">
         <div id="alert_status_update" style="width: 300px;display:none;" class="fixed flex-col top-0 right-0 flex gap-4 py-4">
            <div class="py-[18px] px-6 font-normal font-Inter text-sm rounded-md bg-success-500 text-white dark:bg-success-500 dark:text-slate-300">
                <div class="flex items-start space-x-3 rtl:space-x-reverse">
                    <div class="flex-1">
                     Status updated successfully !
                    </div>
                </div>
            </div>
         </div>
          <!-- BEGIN: Breadcrumb -->
          <div class="mb-5">
            <ul class="m-0 p-0 list-none">
              <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                <a href="index.html">
                  <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                  <iconify-icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                </a>
              </li>
             <a href="{{route('admin')}}"><li class="inline-block relative text-sm text-primary-500 font-Inter ">
                Dashboard
                <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
              </li></a>
              <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                Attribute List</li>
            </ul>
          </div>
          <!-- END: BreadCrumb -->

          <div class=" space-y-5">

            <div class="card">
              <header class=" card-header noborder">
                <h4 class="card-title">Attributes List
                </h4>
                <a href="{{route('admin.product.attribute.add')}}"> <button type="button" class="btn bg-slate-800 text-white" style="float:right;"> Add Attribute </button></a>
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
                              Attribute Name
                            </th>

                            <th scope="col" class=" table-th ">
                                Attribute Terms
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
                            {{-- @dd($attribute); --}}
                        @foreach($attribute as $key=>$values)
                          <tr>
                            <td class="table-td">{{++$key}}</td>
                            <td class="table-td ">
                                <a style="color:rgb(20, 20, 229)" href="{{route('admin.product.attribute_terms.add',$values->id)}}">   {{$values->attribute_name}} </a>
                            </td>

                            <td class="table-td">
                                @php
                                    $attributeTermNames = '-';

                                    if (!empty($values->attributeTerms)) {
                                        $attributeTermNames = $values->attributeTerms->pluck('attribute_term_name')->implode(', ');
                                    }
                                @endphp
                                {{ $attributeTermNames }}
                            </td>

                            <td class="table-td ">

                              <div class="flex items-center mr-2 sm:mr-4 mt-2 space-x-2">
                                <label class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
                                  <input attribute_id="{{$values->id}}" name="status" value="{{$values->attribute_status}}" type="checkbox" {{ $values->attribute_status ==1 ? 'checked':'uncheked' }}  class="sr-only peer attribute_status">
                                  <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:z-10 after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary-500"></div>
                                </label>

                              </div>

                            </td>
                            <td class="table-td ">
                              <div class="flex space-x-3 rtl:space-x-reverse">
                              <a href="{{route('admin.product.attribute.view',$values->id)}}"> <button class="action-btn" type="button">
                                  <iconify-icon icon="heroicons:eye"></iconify-icon>
                                </button></a>
                                 <a href="{{route('admin.product.attribute.edit',$values->id)}}">
                                <button class="action-btn" type="button">
                                  <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                </button></a>
                                <a href="{{route('admin.product.attribute.delete',$values->id)}}">
                                  <button class="action-btn" onclick="return confirm('Are you sure you want to delete this Attribute?')" type="button">
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

<script>
    // update attribute status
    $(document).ready(function(){
        $(".attribute_status").each(function(){
            $(this).click(function(){
                let checkbox = this;
                let status;
                let id = $(this).attr('attribute_id');
                if(this.checked){
                    status = this.checked;
                }else{
                    status = this.checked;
                }
               $.ajax({
                   type : 'post',
                   url :' {{ route("admin.product.attribute.update_status") }}',
                   data : {
                       "_token": "{{ csrf_token() }}",
                       "id" : id,
                       "status" : status
                   },
                   success : function(response){
                    if(response){
                        $("#alert_status_update").fadeIn();
                        setTimeout(() => {
                            $("#alert_status_update").fadeOut();
                        }, 2000);
                    }
                      console.log(response);
                   },
                   error: function( error) {
                        console.log(error);
                    }
               });

            });
        });
    });
</script>
  @endsection
