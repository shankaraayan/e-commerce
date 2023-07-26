@extends('../Layout.Layout') @section("content")

<!--------------- Dashboard Start ------------------------->

<section class="my-5">
  <div class="container bg-light py-5 shadow">
    <div class="row">
      <input type="hidden" name="user_id" value="{{Auth::user()->id}}" id="user_id" />
      <div class="col-xl-3 col-lg-3 col-md-12 col-12">
        <div class="dashboard_left_sidebar pe-3 border-end">
          <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills w-100" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <button class="nav-link rounded-0 d-flex align-items-center {{($type=='Dashboard')? 'active':''}}" id="dashboard" data-bs-toggle="pill" data-bs-target="#v-pills-dashboard" type="button" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">
                <i class="bi bi-layout-text-sidebar-reverse fs-4 me-3"></i> Dashboard </button>
              <button class="nav-link rounded-0 d-flex align-items-center {{($type=='order')? 'active':''}} " id="orders" data-bs-toggle="pill" data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders" aria-selected="false">
                <i class="bi bi-boxes fs-4 me-3"></i>Orders </button>
              <button class="d-none nav-link rounded-0 d-flex align-items-center" id="downloads" data-bs-toggle="pill" data-bs-target="#v-pills-downloads" type="button" role="tab" aria-controls="v-pills-downloads" aria-selected="false">
                <i class="bi bi-cloud-download fs-4 me-3"></i>Downloads </button>
              <!-- <button
                                class="nav-link rounded-0 d-flex align-items-center"
                                id="payment_mthd"
                                data-bs-toggle="pill"
                                data-bs-target="#v-pills-payments"
                                type="button"
                                role="tab"
                                aria-controls="v-pills-payments"
                                aria-selected="false"
                            ><i class="bi bi-wallet2 fs-4 me-3"></i>Payment Methods
                            </button> -->
              <button class="nav-link rounded-0 d-flex align-items-center {{($type=='Address')? 'active':''}}" id="address" data-bs-toggle="pill" data-bs-target="#v-pills-address" type="button" role="tab" aria-controls="v-pills-address" aria-selected="false">
                <i class="bi bi-geo-alt fs-4 me-3"></i>Addresses </button>
              <button class="nav-link rounded-0 d-flex align-items-center {{($type=='profile')? 'active':''}}" id="accnt_dtls" data-bs-toggle="pill" data-bs-target="#v-pills-account" type="button" role="tab" aria-controls="v-pills-account" aria-selected="false">
                <i class="bi bi-person-vcard fs-4 me-3"></i>Account Details </button>
              <button class="nav-link rounded-0 d-flex align-items-center {{($type=='wishlist')? 'active':''}}" id="wishlist" data-bs-toggle="pill" data-bs-target="#v-pills-wishlist" type="button" role="tab" aria-controls="v-pills-wishlist" aria-selected="false">
                <i class="bi bi-heart fs-4 me-3"></i>Wishlist </button>
              <!-- <button class="nav-link rounded-0 d-flex align-items-center {{($type=='logout')? 'active':''}}" id="logout" data-bs-toggle="pill" data-bs-target="#v-pills-logout" type="button" role="tab" aria-controls="v-pills-logout" aria-selected="false"><i class="bi bi-box-arrow-left fs-4 me-3"></i>Logout
                            </button> -->
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-9 col-lg-9 col-md-12 col-12 px-1">
        <div class="dashboard_right_details bg-white p-3">
          <div class="tab-content" id="CG_Dashboard_UI">
            <div class="tab-pane fade {{($type=='Dashboard')? 'active show':''}}" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
              <div class="dashboard_content"> 
                @auth <a href="/logout">
                  <p>Hello <b>{{Auth::user()->firstname}}</b>
                    <a href="{{route('logout')}}">loout</a>
                  </p>
                </a> @endauth <p>In your account overview you can view your <a href="#">recent orders</a> , manage your <a href="#">shipping and billing addresses</a> , and <a href="#">edit your password and account details</a>. </p>
                <div class="container dashboard_options mt-4 px-0">
                  <div class="row row-cols-xl-3 row-cols-lg-3 row-cols-md-3 row-cols-2 g-3">
                    <a href="">
                      <div class="col dashboard_box text-center shadow-sm border d-flex align-items-center justify-content-center">
                        <div class="order_box">
                          <i class="bi bi-boxes"></i>
                          <h6 class="fs-6 mb-0 mt-2 text-uppercase">Orders</h6>
                        </div>
                      </div>
                    </a>
                    <!-- <a href=""><div
                                                            class="col dashboard_box text-center shadow-sm border d-flex align-items-center justify-content-center"><div class="download_box"><i class="bi bi-cloud-download"></i><h6 class="fs-6 mb-0 mt-2 text-uppercase">Downloads</h6></div></div></a> -->
                    <a href="">
                      <div class="col dashboard_box text-center shadow-sm border d-flex align-items-center justify-content-center">
                        <div class="payment_box">
                          <i class="bi bi-wallet2"></i>
                          <h6 class="fs-6 mb-0 mt-2 text-uppercase">Payment Methods</h6>
                        </div>
                      </div>
                    </a>
                    <a href="">
                      <div class="col dashboard_box text-center shadow-sm border d-flex align-items-center justify-content-center">
                        <div class="address_box">
                          <i class="bi bi-geo-alt"></i>
                          <h6 class="fs-6 mb-0 mt-2 text-uppercase">Addresses</h6>
                        </div>
                      </div>
                    </a>
                    <a href="">
                      <div class="col dashboard_box text-center shadow-sm border d-flex align-items-center justify-content-center">
                        <div class="account_info_box">
                          <i class="bi bi-person-vcard"></i>
                          <h6 class="fs-6 mb-0 mt-2 text-uppercase">Account Details</h6>
                        </div>
                      </div>
                    </a>
                    <a href="">
                      <div class="col dashboard_box text-center shadow-sm border d-flex align-items-center justify-content-center">
                        <div class="wishlist_box">
                          <i class="bi bi-heart"></i>
                          <h6 class="fs-6 mb-0 mt-2 text-uppercase">Wishlist</h6>
                        </div>
                      </div>
                    </a>
                    <a href="">
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
            </div>
            <div class="tab-pane fade {{($type=='order')? 'active show':''}}" id="v-pills-orders" role="tabpanel" aria-labelledby="orders">
              <div class="orders_section table-responsive px-0">
                <div class="dash_title text-uppercase border-bottom pb-3 mb-4 h6">Order Details</div>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Order</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Total</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr style="vertical-align: middle;">
                      <td>
                        <a href="#">#12345</a>
                      </td>
                      <td>May 29, 2023</td>
                      <td>On hold</td>
                      <td>
                        <span class="ci_green">$ 1,1922</span>
                        <span class="order_qty p text-muted">for 2 items</span>
                      </td>
                      <td>
                        <a href="#" class="btn btn_primary">To Sue</a>
                      </td>
                    </tr>
                    <tr style="vertical-align: middle;">
                      <td>
                        <a href="#">#12345</a>
                      </td>
                      <td>May 29, 2023</td>
                      <td>On hold</td>
                      <td>
                        <span class="ci_green">$ 1,1922</span>
                        <span class="order_qty p text-muted">for 2 items</span>
                      </td>
                      <td>
                        <a href="#" class="btn btn_primary">To Sue</a>
                      </td>
                    </tr>
                    <tr style="vertical-align: middle;">
                      <td>
                        <a href="#">#12345</a>
                      </td>
                      <td>May 29, 2023</td>
                      <td>On hold</td>
                      <td>
                        <span class="ci_green">$ 1,1922</span>
                        <span class="order_qty p text-muted">for 2 items</span>
                      </td>
                      <td>
                        <a href="#" class="btn btn_primary">To Sue</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane d-none fade" id="v-pills-downloads" role="tabpanel" aria-labelledby="downloads">
              <div class="dash_title text-uppercase border-bottom pb-3 mb-4 h6">Downloads</div>
            </div>
            <div class="tab-pane fade" id="v-pills-payments" role="tabpanel" aria-labelledby="payment_mthd">
              <div class="dash_title text-uppercase border-bottom pb-3 mb-4 h6">Payment Methods</div>
            </div>
            <div class="tab-pane fade {{($type=='Address')? 'active show':''}}" id="v-pills-address" role="tabpanel" aria-labelledby="address">
              <div class="address_section g-0 px-0">
                <div class="dash_title text-uppercase border-bottom pb-3 mb-4 h6 d-xl-flex d-lg-flex d-md-flex d-block justify-content-between">
                  <div>Addresses</div>
                  <div class="p text-muted text-capitalize fw-normal fst-italic mt-xl-0 mt-lg-0 mt-md-0 mt-2"> The following addresses are used by default on the checkout page. </div>
                </div>
                <div class="container">
                  <div class="row row-cols-xl-2 row-cols-lg-2 row-cols-md-2 row-cols-1">
                    <div class="billing_add_section">
                      <h5 class="position-relative"> Billing Address <a data-toggle="collapse" href="#edit_billing_add" role="button" aria-expanded="false" aria-controls="edit_billing_add">
                          <i class="bi bi-pencil ci_blue"></i>
                        </a>
                      </h5> @if(!@empty($address['billing_address'])) <p class="fst-italic">{{$address["billing_address"]['fullname']}}</p>
                      <div class="small text-muted">
                        <span class="user_mob">{{$address["billing_address"]['phone']}}</span>
                        <br />
                        <span class="user_email">{{$address["billing_address"]['email']}}</span>
                        <br />
                        <!-- <span class="user_add_aprtmnt">, </span>
                        <br /> -->
                        <span class="user_add_street"> {{$address["billing_address"]['street']}}, </span>
                        <br />
                        <span class="user_zip_code">{{$address["billing_address"]['pincode']}}, </span>
                        <span class="user_add_city">Jaipur.</span>
                        <br />
                        <span class="user_country">{{$address["billing_address"]['country']}}</span>
                      </div> @else <p class="fst-italic text-muted no_address">You have not yet created an address of this type.</p> @endif
                    </div>
                    <div class="delivery_add_section">
                      <h5 class="position-relative"> Delivery Address <a data-toggle="collapse" href="#edit_delivery_add" role="button" aria-expanded="false" aria-controls="edit_delivery_add">
                          <i class="bi bi-pencil ci_blue"></i>
                        </a>
                      </h5> @if(!@empty($address['shipping_address'])) <p class="fst-italic">{{$address["shipping_address"]['fullname']}}</p>
                      <div class="small text-muted">
                        <span class="user_mob">{{$address["shipping_address"]['phone']}}</span>
                        <br />
                        <span class="user_email">{{$address["shipping_address"]['email']}}</span>
                        <!-- <br />
                        <span class="user_add_aprtmnt">, </span> -->
                        <br />
                        <span class="user_add_street"> {{$address["shipping_address"]['street']}}, </span>
                        <br />
                        <span class="user_zip_code">{{$address["shipping_address"]['pincode']}}, </span>
                        <span class="user_add_city">Jaipur.</span>
                        <br />
                        <span class="user_country">{{$address["shipping_address"]['country']}}</span>
                      </div> @else <p class="fst-italic text-muted no_address">You have not yet created an address of this type.</p> @endif
                    </div>
                  </div>
                </div>
                <div class="collapse" id="edit_billing_add">
                  <div class="billing_add_update mt-3">
                    <div class="dash_title text-uppercase border-bottom pb-3 mb-4 h6"> Billing Address </div>
                    <form method="post" action="{{url('add_address',Auth::user()->id)}}"> @csrf <input type="text" name="address_type" value="billing" hidden />
                      <div class="row row-cols-1">
                        <div class="col">
                          <div class="form-floating mb-3">
                            <input name="fullname" type="text" class="form-control shadow-none" id="floatingInput" placeholder="Rahul Kumawat" />
                            <label class="text-muted p" for="floatingInput">Name <sup class="text-danger">*</sup>
                            </label> @error('fullname') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row row-cols-xl-2 row-cols-lg-2 row-cols-md-1 row-cols-1">
                        <div class="col">
                          <div class="form-floating mb-3">
                            <input type="number" name="phone" class="form-control shadow-none" id="floatingInput" placeholder="Phone" />
                            <label class="text-muted p" for="floatingInput">Phone <sup class="text-danger">*</sup>
                            </label> @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control shadow-none" id="floatingInput" placeholder="Last name" />
                            <label class="text-muted p" for="floatingInput">E-mail <sup class="text-danger">*</sup>
                            </label> @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <select name="country" class="form-select shadow-none mb-3" aria-label="counrty-select">
                            <option value="" selected>Select country/Region... </option>
                            <option value="AT">Austria</option>
                            <option value="GR">Germany</option>
                          </select> @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col">
                          <div class="form-floating mb-3">
                            <input name="street" type="text" class="form-control shadow-none" id="floatingInput" placeholder="Street" />
                            <label class="text-muted p" for="floatingInput">Street <sup class="text-danger">*</sup>
                            </label> @error('street') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-floating mb-3">
                            <input name="apartment" type="text" class="form-control shadow-none" id="floatingInput" placeholder="Apartment" />
                            <label class="text-muted p" for="floatingInput">Apartment <sup class="text-danger">*</sup>
                            </label> @error('apartment') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-floating mb-3">
                            <input name="city" type="text" class="form-control shadow-none" id="floatingInput" placeholder="Place-city" />
                            <label class="text-muted p" for="floatingInput">Place/City <sup class="text-danger">*</sup>
                            </label> @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-floating mb-3">
                            <input type="number" name="pincode" class="form-control shadow-none" id="floatingInput" placeholder="Zip code" />
                            <label class="text-muted p" for="floatingInput">Zip code <sup class="text-danger">*</sup>
                            </label> @error('pincode') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>
                      </div>
                      <div class="address_btns">
                        <button type="submit" class="btn btn_primary">Save Address</button>
                        <button type="button" class="btn btn_outline_secondary">Cancel</button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="collapse" id="edit_delivery_add">
                  <div class="billing_add_update mt-3">
                    <div class="dash_title text-uppercase border-bottom pb-3 mb-4 h6"> Delivery Address </div>
                    <form method="post" action="{{url('add_address',Auth::user()->id)}}"> @csrf <input type="text" name="address_type" value="delivery" hidden />
                      <div class="row row-cols-1">
                        <div class="col">
                          <div class="form-floating mb-3">
                            <input name="fullname" type="text" class="form-control shadow-none" id="floatingInput" placeholder="Rahul Kumawat" />
                            <label class="text-muted p" for="floatingInput">Name <sup class="text-danger">*</sup>
                            </label> @error('fullname') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row row-cols-xl-2 row-cols-lg-2 row-cols-md-1 row-cols-1">
                        <div class="col">
                          <div class="form-floating mb-3">
                            <input type="number" name="phone" class="form-control shadow-none" id="floatingInput" placeholder="Phone" />
                            <label class="text-muted p" for="floatingInput">Phone <sup class="text-danger">*</sup>
                            </label> @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control shadow-none" id="floatingInput" placeholder="Last name" />
                            <label class="text-muted p" for="floatingInput">E-mail <sup class="text-danger">*</sup>
                            </label> @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <select name="country" class="form-select shadow-none mb-3" aria-label="counrty-select">
                            <option selected value="">Select country/Region... </option>
                            <option value="AT">Austria</option>
                            <option value="GR">Germany</option>
                          </select> @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col">
                          <div class="form-floating mb-3">
                            <input name="street" type="text" class="form-control shadow-none" id="floatingInput" placeholder="Street" />
                            <label class="text-muted p" for="floatingInput">Street <sup class="text-danger">*</sup>
                            </label> @error('street') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-floating mb-3">
                            <input name="apartment" type="text" class="form-control shadow-none" id="floatingInput" placeholder="Apartment" />
                            <label class="text-muted p" for="floatingInput">Apartment <sup class="text-danger">*</sup>
                            </label> @error('apartment') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-floating mb-3">
                            <input name="city" type="text" class="form-control shadow-none" id="floatingInput" placeholder="Place-city" />
                            <label class="text-muted p" for="floatingInput">Place/City <sup class="text-danger">*</sup>
                            </label> @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-floating mb-3">
                            <input type="number" name="pincode" class="form-control shadow-none" id="floatingInput" placeholder="Zip code" />
                            <label class="text-muted p" for="floatingInput">Zip code <sup class="text-danger">*</sup>
                            </label> @error('pincode') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>
                      </div>
                      <div class="address_btns">
                        <button type="submit" class="btn btn_primary">Save Address</button>
                        <button type="button" class="btn btn_outline_secondary">Cancel</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade {{($type=='profile')? 'active show':''}}" id="v-pills-account" role="tabpanel" aria-labelledby="accnt_dtls">
            <div class="accountInfo_section g-0 px-0">
              <div class="dash_title text-uppercase border-bottom pb-3 mb-4 h6">Account Details</div>
              <form method="post" action="{{route('update_profile',Auth::user()->id)}}"> @csrf <div class="row">
                  <div class="col">
                    <div class="form-floating mb-3">
                      <input name="firstname" type="text" value="{{Auth::user()->firstname}}" class="form-control input shadow-none" id="floatingInput" placeholder="First name" />
                      <label class="text-muted p" for="floatingInput">First name <sup class="text-danger">*</sup>
                      </label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-floating">
                      <input name="lastname" type="text" value="{{Auth::user()->lastname}}" class="form-control input shadow-none" id="floatingPassword" placeholder="Last Name" />
                      <label class="text-muted p" for="floatingPassword">Last name <sup class="text-danger">*</sup>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <!-- <div class="col-12"><div class="form-floating mb-3"><input type="text" class="form-control shadow-none"
                                                                    id="floatingInput" placeholder="Display name"><label class="text-muted p" for="floatingInput">Display
                                                                    name<sup class="text-danger">*</sup></label><span class="text-muted p fw-normal fst-italic">This is how
                                                                    your name will appear in the account section and
                                                                    reviews</span></div></div> -->
                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input name="email" disabled type="email" value="{{Auth::user()->email}}" class="form-control input shadow-none" id="floatingInput" placeholder="name@example.com" />
                      <label class="text-muted p" for="floatingInput">E-mail address <sup class="text-danger">*</sup>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <button type="submit" id="update_profile" class="btn btn_primary mt-3">Update</button>
                  </div>
                  <div id="profile_notice"></div>
                </div>
              </form>
              <div class="dash_change_pass mt-4 border mx-xl-3 mx-lg-3 mx-md-3 mx-1 p-4">
                <div class="dash_title text-uppercase border-bottom pb-3 mb-4 h6"> Change Password </div>
                <form method="post" action="{{route('change_password',Auth::user()->id)}}"> @csrf <div class="row">
                    <!-- <div class="col-12"><div class="form-floating mb-3"><input type="password" class="form-control shadow-none"
                                                                        id="floatingInput" placeholder="Current password"><label class="text-muted p" for="floatingInput">Current
                                                                        password (Leave blank for no changes)</label></div></div> -->
                    <div class="col-12">
                      <div class="form-floating mb-3">
                        <input name="new_passwrod" type="password" class="form-control input shadow-none" id="password" placeholder="New password" />
                        <label class="text-muted p" for="floatingPassword">New password (Leave blank for no changes)</label> @error('new_passwrod') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-floating">
                        <input type="password" class="form-control input shadow-none" name="confirm_password" placeholder="Confirm New password" />
                        <label class="text-muted p" for="floatingPassword">Confirm New password</label> @error('confirm_pass') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <button id="change_password" type="submit" class="btn btn_primary mt-3">Change password</button>
                    </div>
                    <div id="notice"></div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="tab-pane fade {{($type=='wishlist')? 'active show':''}}" id="v-pills-wishlist" role="tabpanel" aria-labelledby="wishlist">
            <div class="wishlist_section g-0 px-0">
              <div class="dash_title text-uppercase border-bottom pb-3 mb-4 h6">Your Products Wishlist</div>
              <div class="container">
                <div class="row row-cols-2 row-cols-xl-3 row-cols-lg-3 row-cols-md-3 g-3">
                  <div class="col">
                    <div id="" class="p-2 border position-relative rounded">
                      <div class="product_thumb position-relative">
                        <div class="remove_wrapper text-end d-flex justify-content-end">
                          <a href="#">
                            <i class="bi bi-trash3 shadow"></i>
                          </a>
                        </div>
                        <div class="product_thumb_info">
                          <a href="#" class="product_thumb_img">
                            <div class="overflow-hidden">
                              <img class="img-fluid" src="https://stegback.com/root/storage/uploads/01683286837-1800-with-Epp-new07.jpg" width="100%" />
                            </div>
                          </a>
                          <div class="product_info_box text-white py-2 mt-1">
                            <div class="product_title">
                              <h6 class="px-2 text-center product_thumb_title fw-normal"> Solar-PV 1520W Balkonkraftwerk Photovoltaik Solaranlage – Mit EPP 380W </h6>
                            </div>
                            <div class="px-2 text-center d-flex align-items-center justify-content-center">
                              <small class="discount_price ci_green">
                                <s>₹449</s>
                              </small>
                              <span class="net_price ci_green ms-2">₹349/-</span>
                            </div>
                          </div>
                          <!-- <a class="btn btn_outline_primary d-block m-2" href="#">ADD TO CART</a> -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div id="" class="p-2 border position-relative rounded">
                      <div class="product_thumb position-relative">
                        <div class="remove_wrapper text-end d-flex justify-content-end">
                          <a href="#">
                            <i class="bi bi-trash3 shadow"></i>
                          </a>
                        </div>
                        <div class="product_thumb_info">
                          <a href="#" class="product_thumb_img">
                            <div class="overflow-hidden">
                              <img class="img-fluid" src="https://stegback.com/root/storage/uploads/01683286837-1800-with-Epp-new07.jpg" width="100%" />
                            </div>
                          </a>
                          <div class="product_info_box text-white py-2 mt-1">
                            <div class="product_title">
                              <h6 class="px-2 text-center product_thumb_title fw-normal"> Solar-PV 1520W Balkonkraftwerk Photovoltaik Solaranlage – Mit EPP 380W </h6>
                            </div>
                            <div class="px-2 text-center d-flex align-items-center justify-content-center">
                              <small class="discount_price ci_green">
                                <s>₹449</s>
                              </small>
                              <span class="net_price ci_green ms-2">₹349/-</span>
                            </div>
                          </div>
                          <!-- <a class="btn btn_outline_primary d-block m-2" href="#">ADD TO CART</a> -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div id="" class="p-2 border position-relative rounded">
                      <div class="product_thumb position-relative">
                        <div class="remove_wrapper text-end d-flex justify-content-end">
                          <a href="#">
                            <i class="bi bi-trash3 shadow"></i>
                          </a>
                        </div>
                        <div class="product_thumb_info">
                          <a href="#" class="product_thumb_img">
                            <div class="overflow-hidden">
                              <img class="img-fluid" src="https://stegback.com/root/storage/uploads/01683286837-1800-with-Epp-new07.jpg" width="100%" />
                            </div>
                          </a>
                          <div class="product_info_box text-white py-2 mt-1">
                            <div class="product_title">
                              <h6 class="px-2 text-center product_thumb_title fw-normal"> Solar-PV 1520W Balkonkraftwerk Photovoltaik Solaranlage – Mit EPP 380W </h6>
                            </div>
                            <div class="px-2 text-center d-flex align-items-center justify-content-center">
                              <small class="discount_price ci_green">
                                <s>₹449</s>
                              </small>
                              <span class="net_price ci_green ms-2">₹349/-</span>
                            </div>
                          </div>
                          <!-- <a class="btn btn_outline_primary d-block m-2" href="#">ADD TO CART</a> -->
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
    </div>
  </div>
</section>


<script>
    const billing_address = document.getElementById("edit_billing_add");
    const delivery_address = document.getElementById("edit_delivery_add");

    billing_address.addEventListener("show.bs.collapse", function () {
        if (delivery_address.classList.contains("show")) {
            delivery_address.classList.remove("show");
        }
    });

    delivery_address.addEventListener("show.bs.collapse", function () {
        if (billing_address.classList.contains("show")) {
            billing_address.classList.remove("show");
        }
    });
</script>
<!--------------- Dashboard End ------------------------->

@endsection
