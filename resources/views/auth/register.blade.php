@extends('layouts.app')
@section('title', 'Ам-ням | Регистрация')
@section('content')

<div class="wrapper">

    <div class="login2">

            <div class="login-form2">
                <h3>РЕГИСТРАЦИЯ</h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-control">
                            <label for="name"></label>
                            <input
                                id="name"
                                placeholder="Имя"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autocomplete="name"
                                autofocus
                            >
                        </div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-control">
                            <label for="email"></label>
                            <input
                                id="email"
                                type="email"
                                placeholder="email"
                                class="form-control"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                            >
                            @error('email')
                            <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-1rem)">
                                <p style="text-align: center; width: 100%;">{{ $message }}</p>
                            </div>
                            @enderror
                        </div>

                        <div class="form-control">
                            <label for="password"></label>
                            <input
                                id="password"
                                type="password"
                                placeholder="Пароль"
                                name="password"
                                required
                                autocomplete="new-password"
                            >
                        </div>

                        <div class="form-control">
                            <label for="password-confirm"></label>
                            <input
                                id="password-confirm"
                                type="password"
                                placeholder="Повтор пароля"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                            >
                        </div>

                        <div class="btn-box">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="login2-link">Регистрация</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
