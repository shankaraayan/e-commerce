@extends('admin.layout.header')

@section('content')

<div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
    <div class="page-content">
      <div class="transition-all duration-150 container-fluid" id="page_layout">
        <div id="content_layout">



        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white  shadow sm:rounded-lg grid grid-cols-2">
                <div class="max-w-xl p-2">
                    @include('admin.users.edit')
                </div>
            </div>
        </div>


    </div>
    </div>
    </div>
    </div>


@endsection
