@extends('admin.layout.header')

@section('content')
    <style>
        .text-danger {
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
                                <a href="{{ route('admin') }}">
                                    <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                                    <iconify-icon icon="heroicons-outline:chevron-right"
                                        class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                                </a>
                            </li>
                            <a href="{{ route('admin') }}">
                                <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                                    Dashboard
                                    <iconify-icon icon="heroicons-outline:chevron-right"
                                        class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                                </li>
                            </a>
                            <a href="{{ route('admin.category.list') }}">
                                <li class="inline-block relative text-sm text-primary-500 font-Inter">
                                    Taxation
                                    <iconify-icon icon="heroicons-outline:chevron-right"
                                        class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                                </li>
                            </a>
                            <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                                Add Country</li>
                        </ul>
                    </div>
                    <!-- END: BreadCrumb -->
                    <form action="{{ route('admin.taxation.update') }}" method="post" enctype="multipart/form-data"
                        id="multipleValidation">
                        @csrf
                        <input type="hidden" name="id" value="{{ $taxation->id }}">
                        <div class="grid xl:grid-cols-2 flex gap-6">
                            <!-- Basic Inputs -->
                            <div class="w-3/5">
                                <div class="card">
                                    <div class="card-body flex flex-col p-6">
                                        <header
                                            class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                            <div class="flex-1">
                                                <div class="card-title text-slate-900 dark:text-white">Edit Country</div>
                                            </div>
                                        </header>
                                        <div class="card-text h-full space-y-4">
                                            <div>
                                                <div class="input-area mb-4">
                                                    <label for="price" class="form-label">Tax (%)</label>
                                                    <input name="vat_tax" type="number" class="form-control"
                                                        placeholder="e.g. 10" value={{ $taxation->vat_tax }} required>
                                                    @if (session()->has('country_error'))
                                                        @error('vat_tax')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    @endif
                                                </div>

                                                <div class="input-area mb-4">
                                                    <label for="price" class="form-label">Country</label>
                                                    <input name="country" type="text" class="form-control"
                                                        placeholder="Germany" value="{{ $taxation->country }}" required ="required">
                                                    @if (session()->has('country_error'))
                                                        @error('country')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    @endif
                                                </div>
                                                <div class="input-area mb-4">
                                                    <label for="price" class="form-label">Country Short Code</label>
                                                    <input name="short_code" type="text" class="form-control"
                                                        placeholder="DE" value="{{ $taxation->short_code }}" required ="required">
                                                    @if (session()->has('country_error'))
                                                        @error('short_code')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    @endif
                                                </div>

                                                <div class="input-area mb-4">
                                                    <button type="submit" class="btn text-white bg-slate-800">Update</button>
                                                </div>


                                                {{-- <div class="input-area mb-4">
                                                    <label for="use_limit" class="form-label">Country</label>
                                                    <select name="country" class="form-control w-full mt-2">
                                                        <option selected="Selected" disabled="disabled" value="none"
                                                            class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">
                                                            Select an option</option>
                                                                @foreach (country() as $country)
                                                                <option value="{{$country->id}}"
                                                                class="py-1 inline-block font-Inter font-normal text-sm text-slate-600"
                                                                {{ old('country') ===  '' ? 'selected' : '' }}>{{$country->country}}</option>

                                                                @endforeach
                                                    </select>
                                                    @if (session()->has('coupan_code_errore'))
                                                        @error('country')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    @endif
                                                </div> --}}
                                            </div>

                                        </div>
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
@endsection
