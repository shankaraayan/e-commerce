
@extends('Layout.Layout')
@section("title")
Login
@endsection

@section("content")
<div class="ps-account">
            <div class="container py-6 py-5">
                <div class="row">
                    <div class="col-12 col-md-6 offset-md-3">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                    <form action="{{route('login')}}" method="post" id="loginForm">
                                        @csrf
                                        <div class="ps-form--review">
                                            <h2 class="ps-form__title p-0 m-0">Einloggen</h2><hr>
                                            <div class="ps-form__group">
                                                <label class="ps-form__label">Benutzername oder E-Mail Adresse *</label>
                                                <input class="form-control ps-form__input" type="email" name="email" value="{{old('email')}}">
                                                @if(session()->has('login_error'))
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                @endif
                                            </div>
                                            <div class="ps-form__group">
                                                <label class="ps-form__label">Passwort *</label>
                                                <div class="input-group">
                                                    <input class="form-control ps-form__input" type="password" name="password" value="{{old('password')}}">
                                                    <div class="input-group-append"><a class="fa fa-eye-slash toogle-password" href="javascript: void(0);"></a></div>
                                                </div>
                                                @if(session()->has('login_error'))
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                @endif
                                            </div>
                                            {{-- <div class="ps-form__group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="remember">
                                                    <label class="form-check-label" for="remember">Erinnern Sie sich an mich</label>
                                                </div>
                                            </div> --}}
                                            <div class="ps-form__submit">
                                                <button id="login_button" class="ps-btn ps-btn--warning mb-4">Einloggen</button>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center flex-column">
                                                <a class="ps-account__link" href="{{route('forget-password')}}">Haben Sie Ihr Passwort vergessen?</a>
                                                <a class="ps-account__link" href="{{route('register')}}">Neu bei EPPSolar? Erstelle ein Konto?</a>
                                            </div>
                                           
                                        </div>
                                    </form>
                                    
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $("#login_button").on('click', function (e) {
                    setTimeout(() => {
                        $(this).attr("disabled", true);
                    }, 500);
                });
            });
        </script>
@endsection


