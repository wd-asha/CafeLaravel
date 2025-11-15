{{-- аккаунт пользователя - заказы блюд подробнее --}}
@extends('layouts.login')
@section('content')
    <div class="container">
        <div class="account">
            {{-- подключаем пункты меню аккаунта пользователя --}}
            @include('incs.account-links')
            {{-- выводим информацию о заказе блюд пользователя --}}
            <div class="account-content">
                @if($orderItems->isNotEmpty())
                    <div class="orders-place">
                        <div class="orders-item orders-captions">
                            <span>№ заказа</span>
                            <span></span>
                            <span>Блюдо</span>
                            <span>Вес, г.</span>
                            <span>Цена. руб</span>
                        </div>
                        @foreach($orderItems as $orderItem)
                            <div class="orders-item">
                                <span>{{ $order->id }}</span>
                                <span>
                                    <img src="/{{ $orderItem->dish->image }}" alt="" style="width: 5rem;"></span>
                                <span>{{ $orderItem->dish_title }}</span>
                                <span>{{ $orderItem->dish_weight }}</span>
                                <span>{{ $orderItem->dish_price }}</span>
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
