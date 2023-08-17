@extends('user.layout')
@section('dasboard_content')

<div class="dashboard_content">
    <a href="/logout"> </a>
    <p>Hello <a href="{{route('user.dashboard')}}"> <b>{{Auth::user()->name}}</b> </a> <span class="small">(nicht {{Auth::user()->name}} ? <a class="text-danger" href="{{route('logout')}}">logout</a>)</span></p>
    <p class="mb-4">In your account overview you can view your <a class="text-blue border-bottom" href="{{route('user.orders')}}">recent orders</a> , manage your <a class="text-blue border-bottom" href="{{route('user.address')}}">shipping and billing addresses</a> , and <a class="text-blue border-bottom" href="{{route('user.account')}}">edit your password and account details</a>.</p>
    <div class="container">
        <div class="row row-cols-xl-3 row-cols-lg-3 row-cols-md-3 row-cols-2">
            <a href="{{route('user.dashboard')}}" class="col-md-4 col-xs-12 px-1 px-sm-2 mb-3">
                <div class="dashboard_box text-center shadow-sm border align-items-center justify-content-center">
                    <div class="order_box p-5">
                        <img src="{{asset('assets/img/stegpearl/dashboard.png')}}" />
                        <h6 class="ps-section__title pt-4 mb-0">Dashboard</h6>
                    </div>
                </div>
            </a>
            <a href="{{route('user.orders')}}" class="col-md-4 col-xs-12 px-1 px-sm-2 mb-3">
                <div class="dashboard_box text-center shadow-sm border align-items-center justify-content-center">
                    <div class="order_box p-5">
                        <img src="{{asset('assets/img/stegpearl/orders.png')}}" />
                        <h6 class="ps-section__title pt-4 mb-0">Orders</h6>
                    </div>
                </div>
            </a>
            <a href="{{route('user.address')}}" class="col-md-4 col-xs-12 px-1 px-sm-2 mb-3">
                <div class="dashboard_box text-center shadow-sm border align-items-center justify-content-center">
                    <div class="address_box p-5">
                        <img src="{{asset('assets/img/stegpearl/marker.png')}}" />
                        <h6 class="ps-section__title pt-4 mb-0">Address</h6>
                    </div>
                </div>
            </a>
            <a href="{{route('user.account')}}" class="col-md-4 col-xs-12 px-1 px-sm-2 mb-3">
                <div class="dashboard_box text-center shadow-sm border align-items-center justify-content-center">
                    <div class="account_info_box p-5">
                        <img src="{{asset('assets/img/stegpearl/user.png')}}" />
                        <h6 class="ps-section__title pt-4 mb-0">Account Details</h6>
                    </div>
                </div>
            </a>
            <a href="{{route('user.wishlist')}}" class="col-md-4 col-xs-12 px-1 px-sm-2 mb-3">
                <div class="dashboard_box text-center shadow-sm border align-items-center justify-content-center">
                    <div class="wishlist_box p-5">
                        <img src="{{asset('assets/img/stegpearl/wishlist.png')}}" />
                        <h6 class="ps-section__title pt-4 mb-0">Wishlist</h6>
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
