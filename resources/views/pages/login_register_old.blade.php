
@extends('Layout.Layout')
@section("title")
Register
@endsection

@section("content")
      <!--------------- Register Start ------------------------->
      <section class="user_register_div">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="shadow bg-white p-xl-5 p-lg-5 p-md-5 p-3 my-5">
                                <div class="row flex-row-reverse align-items-center justify-content-center">
                                    <div class="col-xl-5 col-lg-5 col-md-6 col-12">
                                        <div class="user_registerPic">
                                            <img src="https://stegback.com/root/storage/uploads/01685967810-undrawAccessaccountre8spm.png" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-7 col-lg-7 col-12">
                                        <h6 class="text-secondary text-uppercase p">Start for free</h6>
                                        <h2 class="mb-3 fw-normal">Sign up to CamperGold.</h2>
                                        <h6 class="text-secondary fw-normal p">Already have an account? <a href="javascript:void(0)"
                                             data-bs-toggle="modal" data-bs-target="#loginPopup" class="h6">Log in</a></h6>
                                        <div class="user_registerform mt-5">
                                            <form id="registerForm" method="post" action="{{route('register')}}">
                                                @csrf
                                                <div class="row row-cols-xl-2 row-cols-lg-2 row-cols-md-2 row-cols-1">
                                                    <div class="col">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" name="firstname" class="form-control input" id="user_firstname"
                                                                placeholder="Jhon">
                                                            <label for="floatingInput">First name</label>
                                                            @if(session()->has('message'))
                                                                @error('firstname')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            @endif
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-floating">
                                                            <input type="text" name="lastname" class="form-control input" id="user_lastname"
                                                                placeholder="Doe">
                                                            <label for="floatingPassword">Last name</label>
                                                            @error('lastname')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-floating mb-3">
                                                            <input type="email" name="email" class="form-control input" id="user_email"
                                                                placeholder="jhondoe@xyz.com">
                                                            <label for="floatingInput">Email address</label>
                                                            @error('email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-floating mb-3">
                                                            <input name="phone" type="number" class="form-control input" id="user_phone"
                                                                placeholder="jhondoe@xyz.com">
                                                            <label for="floatingInput">Phone</label>
                                                            @error('phone')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-floating  mb-3">
                                                        <select name="country" class="form-select pt-0 input" id="user_country"
                                                            aria-label="Floating label select example">
                                                            <option value="">Choose your country</option>
                                                            <option value="GR">Germany</option>
                                                            <option value="AT">Austria</option>
                                                        </select>
                                                        @error('country')
                                                                <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row row-cols-xl-2 row-cols-lg-2 row-cols-md-2 row-cols-1">
                                                    <div class="col">
                                                        <div class="form-floating mb-3">
                                                            <input name="password" type="password" class="form-control input"
                                                                id="user_password" placeholder="Jhon">
                                                            <label for="floatingInput input">Password</label>
                                                            @error('password')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-floating">
                                                            <input type="password" class="form-control input" 
                                                                id="user_cnf_password" name="password_confirmation" placeholder="Doe">
                                                            <label for="floatingPassword">Confirm Password</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="user_submit_btn text-end">
                                                    <button class="btn btn_primary" type="submit" id="submit_btn">Submit</button>
                                                </div>
                                                <div id="register_message">
                                                    
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--------------- Register End ------------------------->
@endsection


