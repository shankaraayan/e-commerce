
@extends('Layout.Layout')
@section("title")
Passwort zurücksetzen
@endsection

@section("content")
<div class="ps-account">
            <div class="container py-6 py-5">
                <div class="row">
                    <div class="col-12 col-md-6 offset-md-3">
                        <div class="card shadow-sm border-0 px-4">
                            <form action="{{route('password-reset')}}" method="post">
                            
                                @csrf
                                <div class="ps-form--review">
                                <input type="hidden" name="id" value="{{ $user[0]['id']}}">
                                    <h2 class="ps-form__title">Passwort zurücksetzen</h2>
                                    <div class="ps-form__group">
                                        <label class="ps-form__label">neues Passwort</label>
                                        <input class="form-control ps-form__input" type="password" name="password" value="{{ old('password') }}">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div class="ps-form__group">
                                        <label class="ps-form__label">Passwort bestätigen</label>
                                        <input class="form-control ps-form__input" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">
                                            @error('confirm-password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div class="ps-form__submit">
                                        <button type="submit" class="ps-btn ps-btn--warning">Zurücksetzen</button>
                                    </div>
                                    <a class="ps-account__link" href="{{route('login')}}">Sie haben bereits ein Konto. Bitte hier anmelden</a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
@endsection