@extends('user.layout')
@section('dasboard_content')
<div class="accountInfo_section g-0 px-0">
              <div class="dash_title text-uppercase border-bottom pb-3 mb-4 fs-3 fw-600">Konto Details</div>
              <form method="post" action="{{route('update_profile',Auth::user()->id)}}">
                @csrf
                <div class="row">
                  <div class="col">
                    <div class="form-floating mb-3">
                      <label class="text-muted p" for="floatingInput">Name <sup class="text-danger">*</sup></label>

                      <input name="name" type="text" value="{{Auth::user()->name}}" class="form-control input shadow-none" id="floatingInput" placeholder="name" />
                       @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-floating mb-3">
                      <label class="text-muted p" for="floatingInput">Telefon <sup class="text-danger">*</sup></label>
                      <input name="phone" type="text" value="{{Auth::user()->phone}}" class="form-control input shadow-none" id="floatingInput" placeholder="phone" />
                       @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                 
                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input name="email" disabled type="email" value="{{Auth::user()->email}}" class="form-control input shadow-none" id="floatingInput" placeholder="name@example.com" />
                      <label class="text-muted p" for="floatingInput">E-Mail Adresse <sup class="text-danger">*</sup>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <button type="submit" id="update_profile" class="ps-btn ps-btn--warning mt-3">Update</button>
                  </div>
                  <div id="profile_notice"></div>
                </div>
              </form>
              <div class="dash_change_pass mt-4 border mx-xl-3 mx-lg-3 mx-md-3 mx-1 p-4">
                <div class="dash_title text-uppercase border-bottom pb-3 mb-4 h6"> Passwort ändern </div>
                <form method="post" action="{{route('change_password',Auth::user()->id)}}"> @csrf <div class="row">
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <label class="text-muted p" for="floatingInput">Current password (Leave blank for no changes)</label>
                            <input name="current_password" type="password" class="form-control shadow-none" id="current_password" placeholder="Current password" />
                        </div>
                        @error('current_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                      <div class="form-floating mb-3">
                      <label class="text-muted p" for="new_password">Neues Passwort (leer lassen, wenn keine Änderungen vorgenommen werden)</label>
                        <input name="new_password" type="password" class="form-control input shadow-none" id="new_password" placeholder="New password" />
                        @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-floating">
                      <label class="text-muted p" for="floatingPassword">Neues Passwort bestätigen</label> @error('new_password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                        <input type="password" class="form-control input shadow-none" name="new_password_confirmation" placeholder="Confirm New password" />
                      </div>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <button id="change_password" type="submit" class="ps-btn ps-btn--warning mt-3">Passwort ändern</button>
                    </div>
                    <div id="notice"></div>
                  </div>
                </form>
              </div>
            </div>

@endsection
