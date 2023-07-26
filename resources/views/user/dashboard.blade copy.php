@extends('user.layout')
<style>
        .customer_dashboard .nav-link{
            font-size: 18px;
        }
        .customer_dashboard .nav-pills .nav-link.active, .customer_dashboard .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #345080;
        }
        .customer_dashboard .nav-pills .nav-link.active, .customer_dashboard .nav-pills .show > .nav-link {
            color: #fff;
            background-color: #4b9f64;
            justify-content: flex-start;
            border-right: solid 7px var(--theme_green);
            box-shadow: 1px 1px 10px 1px #0000001f;
        }
</style>
@section('dasboard_content')

    <div class="dashboard_content">
            @auth <a href="/logout">
                  <p>Hello <b>{{Auth::user()->firstname}}</b>
                    <a href="{{route('logout')}}">loout</a>
                  </p>
                </a> @endauth <p>In your account overview you can view your <a href="{{route('user.orders')}}">recent orders</a> , manage your <a href="{{route('user.address')}}">shipping and billing addresses</a> , and <a href="{{route('user.account')}}">edit your password and account details</a>. </p>
            <div class="row row-cols-xl-3 row-cols-lg-3 row-cols-md-3 row-cols-2 g-3">
                <a href="{{route('user.orders')}}">
                    <div class="col dashboard_box text-center shadow-sm border d-flex align-items-center justify-content-center">
                        <div class="order_box">
                            <i class="bi bi-boxes"></i>
                            <h6 class="fs-6 mb-0 mt-2 text-uppercase">Orders</h6>
                        </div>
                    </div>
                </a>
                <!-- <a href="#">
                    <div class="col dashboard_box text-center shadow-sm border d-flex align-items-center justify-content-center">
                        <div class="payment_box">
                            <i class="bi bi-wallet2"></i>
                            <h6 class="fs-6 mb-0 mt-2 text-uppercase">Payment Methods</h6>
                        </div>
                    </div>
                </a> -->
                <a href="{{route('user.address')}}">
                    <div class="col dashboard_box text-center shadow-sm border d-flex align-items-center justify-content-center">
                        <div class="address_box">
                            <i class="bi bi-geo-alt"></i>
                            <h6 class="fs-6 mb-0 mt-2 text-uppercase">Addresses</h6>
                        </div>
                    </div>
                </a>
                <a href="{{route('user.account')}}">
                    <div class="col dashboard_box text-center shadow-sm border d-flex align-items-center justify-content-center">
                        <div class="account_info_box">
                            <i class="bi bi-person-vcard"></i>
                            <h6 class="fs-6 mb-0 mt-2 text-uppercase">Account Details</h6>
                        </div>
                    </div>
                </a>
                <a href="{{route('user.wishlist')}}">
                    <div class="col dashboard_box text-center shadow-sm border d-flex align-items-center justify-content-center">
                        <div class="wishlist_box">
                            <i class="bi bi-heart"></i>
                            <h6 class="fs-6 mb-0 mt-2 text-uppercase">Wishlist</h6>
                        </div>
                    </div>
                </a>
                <a href="{{route('logout')}}">
                    <div class="col dashboard_box text-center shadow-sm border d-flex align-items-center justify-content-center">
                        <div class="logout_box">
                            <i class="bi bi-box-arrow-left"></i>
                            <h6 class="fs-6 mb-0 mt-2 text-uppercase">Logout</h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection