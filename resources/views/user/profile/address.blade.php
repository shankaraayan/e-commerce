@extends('user.layout')
@section('dasboard_content')
<div class="address_section g-0 px-0">
                <div class="dash_title text-uppercase border-bottom pb-3 mb-4 h6 d-xl-flex d-lg-flex d-md-flex d-block justify-content-between">
                  <div class="fs-3 fw-600">Addresses</div>
                  <div class="text-muted text-capitalize fs-5 fw-500 mt-xl-0 mt-lg-0 mt-md-0 mt-2"> The following addresses are used by default on the checkout page. </div>
                </div>
                <div class="container">
                  <div class="row row-cols-xl-2 row-cols-lg-2 row-cols-md-2 row-cols-1">
                    <div class="col-md-6 col-sm-12 billing_add_section">
                      <h5 class="d-flex position-relative"> Billing Address <a data-toggle="collapse" class="edit_billing_add" href="#edit_billing_add" role="button" aria-expanded="false" aria-controls="edit_billing_add">
                          <i class="icon-pencil2 fs-3 ml-2"></i>
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
              
                    <div class="col-md-6 col-sm-12 delivery_add_section">
                      <h5 class="position-relative d-flex"> Delivery Address <a data-toggle="collapse" class="edit_delivery_add" href="#edit_delivery_add" role="button" aria-expanded="false" aria-controls="edit_delivery_add">
                      <i class="icon-pencil2 fs-3 ml-2"></i>
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
                            <label class="text-muted p" for="floatingInput">Name <sup class="text-danger">*</sup>
                            </label>
                            <input value="{{!empty($address['billing_address']['fullname']) ? $address['billing_address']['fullname'] : '' }}" name="fullname" type="text" class="form-control shadow-none" id="floatingInput" placeholder="full name" />
                             @error('fullname') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row row-cols-xl-2 row-cols-lg-2 row-cols-md-1 row-cols-1">
                        <div class="col-md-6">
                          <div class="form-floating mb-3">
                            <label class="text-muted p" for="floatingInput">Phone <sup class="text-danger">*</sup></label>
                            <input value="{{!empty($address['billing_address']['phone']) ? $address['billing_address']['phone'] : '' }}" type="number" name="phone" class="form-control" id="floatingInput" placeholder="Phone" />
                             @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-floating mb-3">
                          <label class="text-muted p" for="floatingInput">E-mail <sup class="text-danger">*</sup></label> 
                            <input value="{{!empty($address['billing_address']['email']) ? $address['billing_address']['email'] : '' }}" type="email" name="email" class="form-control" id="floatingInput" placeholder="Email" />
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <select name="country" class="form-control shadow-none mb-3" aria-label="counrty-select">
                            <option value="">Select country/Region... </option>
                            @if(!empty($address['billing_address']['country']))
                                <option value="{{$address['billing_address']['country']}}" selected>{{$address['billing_address']['country']}} </option>
                            @endif
                            <option value="AT">Austria</option>
                            <option value="GR">Germany</option>
                          </select> @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col">
                          <div class="form-floating mb-3">
                            <label class="text-muted p" for="floatingInput">Street <sup class="text-danger">*</sup>
                            </label> 
                            <input value="{{!empty($address['billing_address']['street']) ? $address['billing_address']['street'] : '' }}" name="street" type="text" class="form-control shadow-none" id="floatingInput" placeholder="Street" />
                            @error('street') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-floating mb-3">
                            <label class="text-muted p" for="floatingInput">Apartment <sup class="text-danger">*</sup>
                            </label>
                            <input value="{{!empty($address['billing_address']['apartment']) ? $address['billing_address']['apartment'] : '' }}"" name="apartment" type="text" class="form-control shadow-none" id="floatingInput" placeholder="Apartment" />
                             @error('apartment') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-floating mb-3">
                          <label class="text-muted p" for="floatingInput">Place/City <sup class="text-danger">*</sup>
                            </label>
                            <input value="{{!empty($address['billing_address']['city']) ? $address['billing_address']['city'] : '' }}" name="city" type="text" class="form-control shadow-none" id="floatingInput" placeholder="Place-city" />
                             @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-floating mb-3">
                          <label class="text-muted p" for="floatingInput">Zip code <sup class="text-danger">*</sup>
                            </label> 
                            <input value="{{!empty($address['billing_address']['pincode']) ? $address['billing_address']['pincode'] : '' }}" type="number" name="pincode" class="form-control shadow-none" id="floatingInput" placeholder="Zip code" />
                            @error('pincode') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>
                      </div>
                      <div class="address_btns">
                        <button type="submit" class="btn ps-btn--warning fs-4">Save Address</button>
                        <button type="button" class="btn btn_outline_secondary fs-4">Cancel</button>
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
                            <label class="text-muted p" for="floatingInput">Name <sup class="text-danger">*</sup></label> 
                            <input value="{{!empty($address['shipping_address']['fullname']) ? $address['shipping_address']['fullname'] : '' }}" name="fullname" type="text" class="form-control shadow-none" id="floatingInput" placeholder="full name" />
                            @error('fullname') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row row-cols-xl-2 row-cols-lg-2 row-cols-md-1 row-cols-1">
                        <div class="col">
                          <div class="form-floating mb-3">
                            <label class="text-muted p" for="floatingInput">Phone <sup class="text-danger">*</sup></label>
                            <input value="{{ !empty($address['shipping_address']['phone']) ? $address['shipping_address']['phone'] : '' }}" type="number" name="phone" class="form-control shadow-none" id="floatingInput" placeholder="Phone" />
                            
                             @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-floating mb-3">
                            <label class="text-muted p" for="floatingInput">E-mail <sup class="text-danger">*</sup>
                            </label> 
                            <input value="{{ !empty($address['shipping_address']['email']) ? $address['shipping_address']['email'] : '' }}" type="email" name="email" class="form-control shadow-none" id="floatingInput" placeholder="email" />
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <select name="country" class="form-control mb-3" aria-label="counrty-select">
                            <option value="">Select country/Region... </option>
                            @if(!empty($address['shipping_address']['country']))
                            <option value="{{$address['shipping_address']['country']}}" selected>{{$address['shipping_address']['country']}}</option>
                            @endif
                
                            <option value="GR">Germany</option>
                          </select> @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col">
                          <div class="form-floating mb-3">
                            <label class="text-muted p" for="floatingInput">Street <sup class="text-danger">*</sup>
                            </label>
                            <input value="{{ !empty($address['shipping_address']['street']) ? $address['shipping_address']['street'] : '' }}" name="street" type="text" class="form-control shadow-none" id="floatingInput" placeholder="Street" />
                             @error('street') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-floating mb-3">
                          <label class="text-muted p" for="floatingInput">Apartment <sup class="text-danger">*</sup>
                            </label>
                            <input name="apartment" value="{{ !empty($address['shipping_address']['apartment']) ? $address['shipping_address']['apartment'] : '' }}" type="text" class="form-control shadow-none" id="floatingInput" placeholder="Apartment" />
                             @error('apartment') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-floating mb-3">
                          <label class="text-muted p" for="floatingInput">Place/City <sup class="text-danger">*</sup>
                            </label> 
                            <input value="{{ !empty($address['shipping_address']['city']) ? $address['shipping_address']['city'] : '' }}" name="city" type="text" class="form-control shadow-none" id="floatingInput" placeholder="Place-city" />
                            @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-floating mb-3">
                            <label class="text-muted p" for="floatingInput">Zip code <sup class="text-danger">*</sup>
                            </label>
                            <input value="{{ !empty($address['shipping_address']['pincode']) ? $address['shipping_address']['pincode'] : '' }}" type="number" name="pincode" class="form-control shadow-none" id="floatingInput" placeholder="Zip code" />
                             @error('pincode') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>
                      </div>
                      <div class="address_btns">
                        <button type="submit" class="btn ps-btn--warning fs-4">Save Address</button>
                        <button type="button" class="btn btn_outline_secondary fs-4">Cancel</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              @if(session()->get('address_error_type'))
                  <span class="text-danger">
                  @php  
                      $type = session('address_error_type');
                  @endphp
                  @if($type=="billing")
                      <script>
                          $("#edit_billing_add").addClass('show');
                      </script>
                  @elseif($type=="delivery")
                      <script>
                           $("#edit_delivery_add").addClass('show');
                      </script>
                  @endif  
                </span>
              @endif
              

<script>
    const billing_address = document.querySelector(".edit_billing_add");
    
    const delivery_address = document.querySelector(".edit_delivery_add");
       billing_address.onclick = function(){
          $("#edit_delivery_add").collapse('hide');
       }
       delivery_address.onclick = function(){
          $("#edit_billing_add").collapse('hide');
       }
   
   
</script>
@endsection
