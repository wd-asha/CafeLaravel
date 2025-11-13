@extends('layouts.app')
@section('title', 'Ам-ням | Авторизация')
@section('content')

<div class="wrapper">

    <div class="login2">

        <div class="login-form2">
            <h3>ВХОД</h3>
            <form method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-control">
                    <label for="emailInput"></label>
                    <input
                        type="email"
                        placeholder="E-mail"
                        id="emailInput"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        autofocus
                    >
                </div>
                @error('email')
                <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-1rem)">
                    <p style="text-align: center; width: 100%;">{{ $message }}</p>
                </div>
                @enderror

                <div class="form-control">
                    <label for="passInput"></label>
                    <input
                        type="password"
                        placeholder="Пароль"
                        id="passInput"
                        name="password"
                        required
                        autocomplete="current-password"
                    >
                </div>
                <div class="btn-box">
                    <button type="submit" class="login2-link">Войти</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
