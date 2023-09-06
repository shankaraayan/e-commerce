
@extends('Layout.Layout')
@section("title")
Register
@endsection

@section("content")
<div class="ps-account">
            <div class="container py-6 py-5">
                <div class="row">
                    <div class="col-12 col-md-6 offset-md-3">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <form action="{{route('register')}}" method="post">
                                    @csrf
                                    <div class="ps-form--review">
                                        <h2 class="ps-form__title  m-0 p-0">Registrieren</h2><hr>
                                        <div class="ps-form__group">
                                            <label class="ps-form__label">Name *</label>
                                            <input class="form-control ps-form__input" type="text" name="name" value="{{old('name')}}">
        
                                            @if(session()->has('signup_error'))
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                             @endif
                                        </div>
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
                                        <div class="d-flex align-items-center justify-content-center flex-column">
                                            <a class="ps-account__link" href="{{route('login')}}">Haben Sie bereits ein Konto? Jetzt einloggen.</a>
                                        </div>
                                        
                                    </div>
                                </form>  
                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection


