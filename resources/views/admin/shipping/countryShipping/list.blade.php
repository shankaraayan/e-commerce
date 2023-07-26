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
              </li></a>
              <a href="{{route('admin.shipping.list')}}">
              <li class="inline-block relative text-sm text-primary-500 font-Inter">
                Shipping
                <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                </li></a>


              <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                Country Shipping</li>
            </ul>
          </div>
          <!-- END: BreadCrumb -->


          <div class=" space-y-5">

            <div class="card">
              <header class=" card-header noborder">
                <h4 class="card-title">Country Shipping List
                </h4>
                <a href="{{route('admin.shipping.country.add',$id)}}"> <button type="button" class="btn bg-slate-800 text-white" style="float:right;"> Add Shipping </button></a>
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
                              Country Short Code
                            </th>
                            <th scope="col" class=" table-th ">
                              Price
                            </th>
                            <th scope="col" class=" table-th ">
                              Country
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

                        @foreach($countryShipping as $key=>$values)
                          <tr>
                            <td class="table-td">{{++$key}}</td>
                            <td class="table-td ">{{$values->name}}</td>
                            <td class="table-td ">{{$values->price}}</td>
                            <td class="table-td ">{{$values->country}}</td>
                            <td class="table-td">
                              @if ($values->status == 1)
                                  <span class="badge bg-success-500 text-success-500 bg-opacity-30 capitalize">Active</span>
                              @else
                                   <span class="badge bg-danger-500 text-danger-500 bg-opacity-30 capitalize">In active</span>
                              @endif
                          </td>
                            <td class="table-td ">
                              <div class="flex space-x-3 rtl:space-x-reverse">
                                  <button class="action-btn" data-bs-toggle="modal" data-bs-target="#vertically_center{{$key}}" type="button">
                                    <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                  </button>
                                <a href="{{route('admin.shipping.country.delete',$values->id)}}">
                                  <button class="action-btn" onclick="return confirm('Are you sure you want to delete this Shipping?')" type="button">
                                    <iconify-icon icon="heroicons:trash"></iconify-icon>
                                  </button>
                                </a>

                              </div>
                            </td>

                          </tr>

                          {{-- model start --}}
                          <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="vertically_center{{$key}}" tabindex="-1" aria-labelledby="vertically_center" aria-hidden="true">
                            <div class="modal-dialog top-1/2 !-translate-y-1/2 relative w-auto pointer-events-none">
                              <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
                              rounded-md outline-none text-current">
                                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                                  <!-- Modal header -->
                                  <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-green-500">
                                    <h3 class="text-xl font-medium text-white dark:text-white capitalize">
                                      {{$values->name}}
                                    </h3>
                                    <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                                          dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
                                      <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                                  11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                      </svg>
                                      <span class="sr-only">Close modal</span>
                                    </button>
                                  </div>
                                  <!-- Modal body -->
                                  <form action="{{route('admin.shipping.country.update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                  <div class="p-6 space-y-4">
                                          <div class="input-area mb-4">
                                              <label for="name" class="form-label">Country Short Code</label>
                                              <input id="name" name="name" type="text" class="form-control" value="{{$values->name}}" required placeholder="Country Short Code">
                                          </div>
                                          <div class="input-area mb-4">
                                            <label for="name" class="form-label">Country</label>
                                            <input id="name" name="country" type="text" class="form-control" value="{{$values->country}}" required placeholder="Shipping Country">
                                        </div>
                                        <div class="input-area mb-4">
                                          <label for="name" class="form-label">Price</label>
                                          <input id="name" name="price" type="text" class="form-control" value="{{$values->price}}" required placeholder="Shipping Price">
                                      </div>
                                          <input type="hidden" name="shipping_id" value="{{$values->id}}">
                                          <div class="input-area mb-4">
                                            <label for="description" class="form-label">Status</label>
                                            <select  name="status" class="form-control">
                                              <option value="1">Active</option>
                                              <option value="2">In-Active</option>
                                            </select>
                                        </div>


                                  </div>
                                  <!-- Modal footer -->
                                  <div class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                                    <button type="submit" data-bs-dismiss="modal" class="btn inline-flex justify-center text-white bg-green-500">Update</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                          {{-- model end --}}
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
