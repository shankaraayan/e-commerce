
@extends('Layout.Layout')
@section("title")
Forgot password
@endsection

@section("content")
<div class="ps-account">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 col-md-6 offset-md-3">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                        <form action="{{route('forget-password')}}" method="post">
                                            @csrf
                                            <div class="ps-form--review">
                                                <h2 class="ps-form__title p-0 m-0">Passwort vergessen</h2><hr>
                                                <div class="ps-form__group">
                                                    <label class="ps-form__label">E-Mail Adresse *</label>
                                                    <input class="form-control ps-form__input" type="email" name="email" value="{{ old('email') }}">
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                                <div class="ps-form__submit">
                                                    <button type="submit" class="ps-btn ps-btn--warning">Vergessen</button>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center flex-column">
                                                    <a class="ps-account__link" href="{{route('login')}}">Sie haben bereits ein Konto? Bitte hier einloggen.</a>
                                                </div>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
@endsection


