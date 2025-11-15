{{-- аккаунт пользователя - главная --}}
@extends('layouts.login')
@section('content')
    <div class="container-account">
        <div class="account">
            {{-- подключаем пункты меню аккаунта пользователя --}}
            @include('incs.account-links')
            {{-- выводим информацию о пользователе --}}
            {{-- все поля только для чтения --}}
            <div class="account-content">
                <form method="post" action="" class="change-form">
                    @csrf
                    {{-- имя пользователя --}}
                    <div class="change-form_item">
                        <label for="name">Имя</label>
                        <input
                            class="account-input readonly"
                            type="text"
                            placeholder="Ваше имя *"
                            value="{{ auth()->user()->name }}"
                            name="name"
                            readonly
                        >
                    </div>
                    {{-- адрес пользователя, он же адрес доставки --}}
                    <div class="change-form_item">
                        <label for="address">Адрес доставки</label>
                        <input
                            class="account-input readonly"
                            type="text"
                            placeholder=""
                            @if(empty(auth()->user()->address))
                                value="не указано"
                            @else
                                value="{{ auth()->user()->address }}"
                            @endif
                            name="address"
                            readonly
                        >
                    </div>
                    {{-- почта пользователя, он же логин для входа --}}
                    <div class="change-form_item">
                        <label for="email">Почта</label>
                        <input
                            class="account-input readonly"
                            type="email"
                            placeholder="Ваш email *"
                            value="{{ auth()->user()->email }}"
                            name="email"
                            readonly
                        >
                    </div>
                    {{-- телефон пользователя --}}
                    <div class="change-form_item">
                        <label for="address">Телефон</label>
                        <input
                            class="account-input readonly"
                            type="text"
                            placeholder=""
                            @if(empty(auth()->user()->phone))
                                value="не указано"
                            @else
                                value="{{ auth()->user()->phone }}"
                            @endif
                            name="phone"
                            readonly
                        >
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
