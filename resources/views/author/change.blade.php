{{-- аккаунт пользователя - изменить --}}
@extends('layouts.login')
@section('content')
    <div class="container">
        <div class="account">
            {{-- подключаем пункты меню аккаунта пользователя --}}
            @include('incs.account-links')
            {{-- выводим информацию о пользователе --}}
            {{-- все поля только для чтения --}}
            <div class="account-content">
                <form method="post" action="{{ route('author.save') }}" class="change-form">
                    @csrf
                    {{-- имя пользователя --}}
                    <div class="change-form_item">
                        <label for="name">Имя</label>
                        <input
                            class="account-input"
                            type="text"
                            placeholder="Ваше имя *"
                            value="{{ auth()->user()->name }}"
                            name="name"
                        >
                    </div>
                    {{-- адрес пользователя, он же адрес доставки --}}
                    <div class="change-form_item">
                        <label for="address">Адрес доставки</label>
                        <input
                            class="account-input"
                            type="text"
                            placeholder="не указано"
                            value="{{ old('phone', auth()->user()->address) }}"
                            name="address"
                        >
                    </div>
                    {{-- почта пользователя, он же логин для входа --}}
                    <div class="change-form_item">
                        <label for="email">Почта</label>
                        <input
                            class="account-input"
                            type="email"
                            placeholder="Ваш email *"
                            value="{{ auth()->user()->email }}"
                            name="email"
                        >
                    </div>
                    {{-- телефон пользователя --}}
                    <div class="change-form_item">
                        <label for="address">Телефон</label>
                        <input
                            class="account-input"
                            type="text"
                            placeholder="не указано"
                            value="{{ old('phone', auth()->user()->phone) }}"
                            name="phone"
                        >
                    </div>

                    <div class="change-form_item">
                        <label class="labelBtn" for="btn">btn</label>
                        <button class="button-submit" type="submit">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
