
@extends('Layout.Layout')
@section("title")
Login
@endsection
{{-- <style>
    .ps-form--review .ps-form__input, .ps-form--review .ps-form__textarea,.ps-account .ps-form__group .toogle-password,.ps-btn{
        border-radius : 5px !important;
    }
    .ps-account .ps-form__group .toogle-password{
        border-top-left-radius: 0px !important;
        border-bottom-left-radius: 0px !important;
    }
</style> --}}
@section("content")
<div class="ps-account">
            <div class="container py-6 py-5">
                <div class="row">
                    <div class="col-12 col-md-6 offset-md-3">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                    <form action="{{route('login')}}" method="post">
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
                                                <button class="ps-btn ps-btn--warning mb-4">Einloggen</button>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center flex-column">
                                                <a class="ps-account__link" href="{{route('forget-password')}}">Haben Sie Ihr Passwort vergessen?</a>
                                                <a class="ps-account__link" href="{{route('register')}}">Neu bei Stegpearl? Erstelle ein Konto?</a>
                                            </div>
                                           
                                        </div>
                                    </form>
                                    
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-12 col-md-6">
                        <form action="{{route('register')}}" method="post">
                            @csrf
                            <div class="ps-form--review">
                                <h2 class="ps-form__title">Register</h2>
                                <div class="ps-form__group">
                                    <label class="ps-form__label">E-Mail Adresse *</label>
                                    <input class="form-control ps-form__input" type="email" name="email" value="{{old('email')}}">

                                    @if(session()->has('signup_error'))
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
                                    @if(session()->has('signup_error'))
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                     @endif

                                    <p class="ps-form__text">Hinweis: Das Passwort sollte mindestens 8 Zeichen lang sein. Um es sicherer zu machen, verwenden Sie Groß- und Kleinbuchstaben, Zahlen und Symbole wie ! " ? $ % ^ & ).</p>
                                </div>
                                <div class="ps-form__submit">
                                    <button class="ps-btn ps-btn--warning">Register</button>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>
@endsection


