@extends('user.layout')
@section('dasboard_content')
<style>
    .dashboard_content .dashboard_box {
        min-height: 150px;
        display: flex;
    }
    .dashboard_content .dashboard_box i {
        font-size: 5rem;
        color: #b5b5b5;
        font-weight: lighter;
    }
    .dashboard_content .dashboard_box:hover i, .dashboard_content .dashboard_box:hover h6 {
        color: var(--green-color);
    }
</style>
<div class="dashboard_content">
    <a href="/logout"> </a>
    <p>Hello <a class="text-green" href="{{route('user.dashboard')}}"> <b>{{Auth::user()->name}}</b> </a> <span class="small">(nicht {{Auth::user()->name}} ? <a class="text-danger" href="{{route('logout')}}">logout</a>)</span></p>
    <p class="mb-5 fs-4" style="line-height: 1.5;">In your account overview you can view your <a class="text-blue border-bottom" href="{{route('user.orders')}}">recent orders</a> , manage your <a class="text-blue border-bottom" href="{{route('user.address')}}">shipping and billing addresses</a> , and <a class="text-blue border-bottom" href="{{route('user.account')}}">edit your password and account details</a>.</p>
    <div class="container">
        <div class="row">
            <a href="{{route('user.dashboard')}}" class="col-md-4 col-sm-6 col-6 px-2 px-sm-3 mb-4">
                <div class="dashboard_box text-center shadow-sm border align-items-center justify-content-center">
                    <div class="dash_box">
                        {{-- <img src="{{asset('assets/img/stegpearl/dashboard.png')}}" /> --}}
                        <i class="icon-grid"></i>
                        <h6 class="ps-section__title fw-400 pt-4 mb-0">Dashboard</h6>
                    </div>
                </div>
            </a>
            <a href="{{route('user.orders')}}" class="col-md-4 col-sm-6 col-6 px-2 px-sm-3 mb-4">
                <div class="dashboard_box text-center shadow-sm border align-items-center justify-content-center">
                    <div class="order_box">
                        {{-- <img src="{{asset('assets/img/stegpearl/orders.png')}}" /> --}}
                        <i class="icon-outbox"></i>
                        <h6 class="ps-section__title fw-400 pt-4 mb-0">Orders</h6>
                    </div>
                </div>
            </a>
            <a href="{{route('user.address')}}" class="col-md-4 col-sm-6 col-6 px-2 px-sm-3 mb-4">
                <div class="dashboard_box text-center shadow-sm border align-items-center justify-content-center">
                    <div class="address_box">
                        {{-- <img src="{{asset('assets/img/stegpearl/marker.png')}}" /> --}}
                        <i class="icon-map2"></i>
                        <h6 class="ps-section__title fw-400 pt-4 mb-0">Address</h6>
                    </div>
                </div>
            </a>
            <a href="{{route('user.account')}}" class="col-md-4 col-sm-6 col-6 px-2 px-sm-3 mb-4">
                <div class="dashboard_box text-center shadow-sm border align-items-center justify-content-center">
                    <div class="account_info_box">
                        {{-- <img src="{{asset('assets/img/stegpearl/user.png')}}" /> --}}
                        <i class="icon-user"></i>
                        <h6 class="ps-section__title fw-400 pt-4 mb-0">Account Details</h6>
                    </div>
                </div>
            </a>
            <a href="{{route('user.wishlist')}}" class="col-md-4 col-sm-6 col-6 px-2 px-sm-3 mb-4">
                <div class="dashboard_box text-center shadow-sm border align-items-center justify-content-center">
                    <div class="wishlist_box">
                        {{-- <img src="{{asset('assets/img/stegpearl/wishlist.png')}}" /> --}}
                        <i class="icon-heart"></i>
                        <h6 class="ps-section__title fw-400 pt-4 mb-0">Wishlist</h6>
                    </div>
                </div>
            </a>
            {{--<a href="{{route('logout')}}" class="col-md-4 col-xs-12 px-1 px-sm-2 mb-3">
                <div class="dashboard_box text-center shadow-sm border align-items-center justify-content-center p-3 pt-5">
                    <div class="logout_box">
                        <img src="{{asset('assets/img/stegpearl/logout.png')}}" />
                        <h4 class="ps-section__title pt-4">Logout</h4>
                    </div>
                </div>
            </a>--}}
        </div>
    </div>
</div>

@endsection
