
@extends('Layout.Layout')
@section("title")
Forgot password
@endsection

@section("content")
<div class="ps-account">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <form action="{{route('forget-password')}}" method="post">
                            @csrf
                            <div class="ps-form--review">
                                <h2 class="ps-form__title">Forgot Password</h2>
                                <div class="ps-form__group">
                                    <label class="ps-form__label">Email address *</label>
                                    <input class="form-control ps-form__input" type="email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                <div class="ps-form__submit">
                                    <button type="submit" class="ps-btn ps-btn--warning">Forgot</button>
                                </div>
                                <a class="ps-account__link" href="{{route('login.register')}}">You already have an account. Please login here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection


