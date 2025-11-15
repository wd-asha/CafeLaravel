{{-- аккаунт пользователя - заказы столиков --}}
@extends('layouts.login')
@section('content')
    <div class="container">
        <div class="account">
            {{-- подключаем пункты меню аккаунта пользователя --}}
            @include('incs.account-links')
            {{-- выводим информацию о заказах столиков пользователя --}}
            <div class="account-content">
                @if($orders->isNotEmpty())
                    <div class="orders-place">
                        <div class="orders-item orders-captions">
                            <span>№ заказа</span>
                            <span>Столик</span>
                            <span>на дату</span>
                            <span>на 1 час</span>
                            <span>Создан</span>
                        </div>
                        @foreach($orders as $order)
                            <div class="orders-item">
                                <span>{{ $order->id }}</span>
                                <span>{{ $order->places }}</span>
                                <span>{{ $order->date }}</span>
                                <span>с {{ $order->time }}</span>
                                <span>{{ $order->created_at }}</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="orders-place">
                        <p>Нет заказов...</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
