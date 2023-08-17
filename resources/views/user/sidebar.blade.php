<div id="accordion">
    <div class="card shadow">
      <div class="card-header bg-white py-4" id="headingOne">
          <a class="btn btn-link d-block" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <h6 class="mb-0">Dashboard</h6>
          </a>
      </div>
  
      <div id="collapseOne" class="collapse show user_dashboard" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
            <div class="nav flex-column nav-pills w-100" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a href="{{route('user.dashboard')}}" class="nav-link rounded-0 align-items-center ps-block__title text-left fs-3 py-3 {{(Route::currentRouteName()=='user.dashboard')? 'active':''}}">
                    <i class="bi bi-layout-text-sidebar-reverse fs-4 me-3"></i> Dashboard
                </a>
                <a href="{{route('user.orders')}}" class="nav-link rounded-0 align-items-center ps-block__title text-left fs-3 py-3 {{(Route::currentRouteName()=='user.orders')? 'active':''}}" id="orders"  type="button" role="tab" aria-controls="v-pills-orders" aria-selected="false">
                    <i class="bi bi-boxes fs-4 me-3"></i>Orders
                </a>
                <!-- <a href="{{route('user.dashboard')}}" class="d-none nav-link rounded-0 align-items-center ps-block__title text-left fs-3" id="downloads"  type="button" role="tab" aria-controls="v-pills-downloads" aria-selected="false">
                    <i class="bi bi-cloud-download fs-4 me-3"></i>Downloads
                </a> -->
                <!-- <a href="{{route('user.dashboard')}}" class="nav-link rounded-0 align-items-center ps-block__title text-left fs-3" id="payment_mthd" data-bs-toggle="pill" data-bs-target="#v-pills-payments" type="button" role="tab" aria-controls="v-pills-payments" aria-selected="false">
                    <i class="bi bi-wallet2 fs-4 me-3"></i>Payment Methods
                </a> -->
                <a href="{{route('user.address')}}" class="nav-link rounded-0 align-items-center ps-block__title text-left fs-3 py-3 {{(Route::currentRouteName()=='user.address')? 'active':''}}" >
                    <i class="bi bi-geo-alt fs-4 me-3"></i>Addresses
                </a>
                <a href="{{route('user.account')}}" class="nav-link rounded-0 align-items-center ps-block__title text-left fs-3 py-3 {{(Route::currentRouteName()=='user.account')? 'active':''}}">
                    <i class="bi bi-person-vcard fs-4 me-3"></i>Account Details
                </a>
    
                <a href="{{route('user.wishlist')}}" class="nav-link rounded-0 align-items-center ps-block__title text-left fs-3  py-3{{(Route::currentRouteName()=='user.wishlist')? 'active':''}}">
                    <i class="bi bi-heart fs-4 me-3"></i>Wishlist
                </a>
                <a href="{{route('logout')}}" class="nav-link rounded-0 align-items-center ps-block__title text-left fs-3 py-3">
                    <i class="bi bi-box-arrow-left fs-4 me-3"></i>Logout
                </a>
            </div>
        </div>
      </div>
    </div>
     
  </div>