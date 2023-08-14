@extends('admin.layout.header')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
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
                Coupon
                <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
              </li>
              <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                list</li>
            </ul>
          </div>
          <!-- END: BreadCrumb -->


          <div class=" space-y-5">

            <div class="card">
              <header class=" card-header noborder">
                <h4 class="card-title">Coupon List
                </h4>
                <p class="text-green-900" id="copy-message"></p>
                <a href="{{route('admin.coupon.add')}}"> <button type="button" class="btn bg-slate-800 text-white" style="float:right;"> New Coupon </button></a>
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
                              code
                            </th>
                            <th scope="col" class=" table-th ">
                              Applicable On
                            </th>
                            <th scope="col" class=" table-th ">
                              Price
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
                            @php
                                $x = 1;
                            @endphp
                            @foreach ($coupons as $coupon)

                            <tr>

                                <td scope="col" class=" table-td ">
                                    {{ $x }}
                                </td>

                                <td scope="col" class=" table-td ">
                                    {{ $coupon->code }}
                                </td>
                                <td scope="col" class=" table-td ">
                                    {{ $coupon->appliable_on }}
                                </td>
                                <td scope="col" class=" table-td ">
                                    {{ $coupon->price }}
                                </td>
                                <td scope="col" class=" table-td ">
                                    @if($coupon->status)
                                    <span class="badge bg-success-500 text-success-500 bg-opacity-30 capitalize">Active</span>
                                    @endif

                                    {{-- {{ $coupon->status }} --}}
                                </td>

                                <td scope="col" class=" table-td flex">
                                    <a href="{{route('admin.coupon.edit',$coupon->id)}}">  <button class="action-btn" type="button">
                                        <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                    </button></a>

                                    <button class="action-btn ml-3 copy-button" id="copyReferralButton"
                                        data-referral="{{ $coupon->code }}">
                                        <iconify-icon icon="heroicons:clipboard-document-list"></iconify-icon>
                                    </button>

                                    <a href="{{route('admin.coupon.delete',$coupon->id)}}">
                                        <button class="action-btn ml-3" >
                                            <iconify-icon icon="heroicons:trash"></iconify-icon>
                                        </button>
                                    </a>
                                </td>

                            </tr>
                            @php
                                $x++;
                            @endphp
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                {{$coupons->links()}}
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        var copyButtons = document.querySelectorAll('.copy-button');
        copyButtons.forEach(function(copyButton) {
            var referralText = copyButton.getAttribute('data-referral');
            new ClipboardJS(copyButton, {
                text: function() {
                    return referralText;
                }
            });
            copyButton.addEventListener('click', function() {
                const messageElement = document.getElementById('copy-message');
                messageElement.textContent = 'Code copied!';
                messageElement.style.opacity = 1;
                setTimeout(function() {
                    messageElement.style.opacity = 0;
                }, 1000);
            });
        });
    });
</script>


  @endsection
