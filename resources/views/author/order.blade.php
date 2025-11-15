{{-- аккаунт пользователя - заказы блюд --}}
@extends('layouts.login')
@section('content')
    <div class="container">
        <div class="account">
            {{-- подключаем пункты меню аккаунта пользователя --}}
            @include('incs.account-links')
            {{-- выводим информацию о заказах блюд пользователя --}}
            <div class="account-content">
                @if($orders->isNotEmpty())
                    <div class="orders-place">
                        <div class="orders-item orders-captions">
                            <span>№ заказа</span>
                            {{--<span>на дату</span>
                            <span>на время</span>--}}
                            <span>Всего. руб</span>
                            <span>Создан</span>
                            <span>Статус</span>
                            <span></span>
                        </div>
                        @foreach($orders as $order)
                            <div class="orders-item">
                                <span>{{ $order->id }}</span>
                                {{--<span>{{ $order->places }}</span>
                                <span>{{ $order->date }}</span>--}}
                                <span>{{ $order->order_total }}</span>
                                <span>{{ $order->created_at }}</span>
                                <span>
                                    @if($order->order_status == 0)
                                        принят
                                    @elseif($order->order_status == 1)
                                        в обработке
                                    @elseif($order->order_status == 2)
                                        на доставке
                                    @elseif($order->order_status == 3)
                                        выполнен
                                    @endif
                                </span>
                                <span>
                                <a href="{{ route('author.orderItems', $order->id) }}">Подробнее</a>
                                </span>
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
