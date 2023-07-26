<div class="dashboard_left_sidebar pe-3 border-end customer_dashboard">
    <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills w-100 btn" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a href="{{route('user.dashboard')}}" class="nav-link rounded-0 align-items-center ps-block__title text-left fs-3 {{(Route::currentRouteName()=='user.dashboard')? 'active':''}}">
                <i class="bi bi-layout-text-sidebar-reverse fs-4 me-3"></i> Dashboard
            </a>
            <a href="{{route('user.orders')}}" class="nav-link rounded-0 align-items-center ps-block__title text-left fs-3  {{(Route::currentRouteName()=='user.orders')? 'active':''}}" id="orders"  type="button" role="tab" aria-controls="v-pills-orders" aria-selected="false">
                <i class="bi bi-boxes fs-4 me-3"></i>Orders
            </a>
            <!-- <a href="{{route('user.dashboard')}}" class="d-none nav-link rounded-0 d-flex align-items-center" id="downloads"  type="button" role="tab" aria-controls="v-pills-downloads" aria-selected="false">
                <i class="bi bi-cloud-download fs-4 me-3"></i>Downloads
            </a> -->
            <!-- <a href="{{route('user.dashboard')}}" class="nav-link rounded-0 d-flex align-items-center" id="payment_mthd" data-bs-toggle="pill" data-bs-target="#v-pills-payments" type="button" role="tab" aria-controls="v-pills-payments" aria-selected="false">
                <i class="bi bi-wallet2 fs-4 me-3"></i>Payment Methods
            </a> -->
            <a href="{{route('user.address')}}" class="nav-link rounded-0 align-items-center ps-block__title text-left fs-3  {{(Route::currentRouteName()=='user.address')? 'active':''}}" >
                <i class="bi bi-geo-alt fs-4 me-3"></i>Addresses
            </a>
            <a href="{{route('user.account')}}" class="nav-link rounded-0 align-items-center ps-block__title text-left fs-3  {{(Route::currentRouteName()=='user.account')? 'active':''}}">
                <i class="bi bi-person-vcard fs-4 me-3"></i>Account Details
            </a>

            <a href="{{route('user.wishlist')}}" class="nav-link rounded-0 align-items-center ps-block__title text-left fs-3  {{(Route::currentRouteName()=='user.wishlist')? 'active':''}}">
                <i class="bi bi-heart fs-4 me-3"></i>Wishlist
            </a>
            <!-- <a href="{{route('user.dashboard')}}" class="nav-link rounded-0 d-flex align-items-center">
                <i class="bi bi-box-arrow-left  me-3"></i>Logout
            </a> -->
        </div>
    </div>
</div>
fs-4