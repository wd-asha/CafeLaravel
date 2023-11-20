@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Подробности заказа (ID: {{ $order->id }} )</h6>
        <div class="row">
            <div class="col-md-5">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="wd-10p">Пользователь:</th>
                        <th class="wd-10p">{{ $order->user_name }}</th>
                    </tr>
                    <tr>
                        <th class="wd-10p">Email:</th>
                        <th class="wd-10p">{{ $order->order_email }}</th>
                    </tr>
                    <tr>
                        <th class="wd-10p">Телефон:</th>
                        <th class="wd-10p">{{ $order->order_phone }}</th>
                    </tr>
                    <tr>
                        <th class="wd-10p">Адрес доставки:</th>
                        <th class="wd-10p">{{ $order->order_delivery }}</th>
                    </tr>
                    </thead>
                </table>
            </div>

            <div class="col-md-5">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>

                        <tr>
                            <th class="wd-10p">Статус:</th>
                            <th class="wd-10p">
                                @if($order->order_status == 0)
                                    <span style="color: red;">Новый</span>
                                @elseif($order->order_status == 1)
                                    <span style="color: blue;">В работе</span>
                                @elseif($order->order_status == 2)
                                    <span style="color: green;">На доставке</span>
                                @else
                                    <span>Завершен</span>
                                @endif
                            </th>
                        </tr>
                        <tr>
                            <th class="wd-10p">Дата создания:</th>
                            <th class="wd-10p">{{ $order->created_at->diffForHumans() }}</th>
                        </tr>
                        <tr>
                            <th class="wd-10p">Дата обновления:</th>
                            <th class="wd-10p">{{ $order->updated_at->diffForHumans() }}</th>
                        </tr>
                        <tr>
                            <th class="wd-10p">Стоимость:</th>
                            <th class="wd-10p" style="font-size: 1rem; color: green;">{{ $order->order_total }} ₽</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div class="col-md-2">
                @if($order->order_status == 0)
                    <a href="{{ route('admin.neworders') }}" class="btn btn-danger" style="display: block; width: 100%; margin-bottom: 1rem; text-transform: none">К списку</a>
                    @else
                    <a href="{{route('admin.order.pending', $order->id) }}" class="btn btn-danger" style="display: block; width: 100%; margin-bottom: 1rem; text-transform: none">Новый</a>
                @endif
                @if($order->order_status == 1)
                    <a href="{{ route('admin.orders.process') }}" class="btn btn-warning" style="display: block; width: 100%; margin-bottom: 1rem; text-transform: none">К списку</a>
                    @else
                    <a href="{{ route('admin.order.process', $order->id) }}" class="btn btn-warning" style="display: block; width: 100%; margin-bottom: 1rem; text-transform: none">В работе</a>
                @endif
                @if($order->order_status == 2)
                    <a href="{{ route('admin.orders.delivered') }}" class="btn btn-success" style="display: block; width: 100%; margin-bottom: 1rem; text-transform: none">К списку</a>
                    @else
                    <a href="{{ route('admin.order.delivered', $order->id) }}" class="btn btn-success" style="display: block; width: 100%; margin-bottom: 1rem; text-transform: none">На доставке</a>
                    @endif
                @if($order->order_status == 3)
                    <a href="{{ route('admin.orders.canceled') }}" class="btn btn-info" style="display: block; width: 100%; margin-bottom: 1rem; text-transform: none">К списку</a>
                    @else
                    <a href="{{ route('admin.order.canceled', $order->id ) }}" class="btn btn-info" style="display: block; width: 100%; margin-bottom: 1rem; text-transform: none">Завершен</a>
                    @endif
            </div>
        </div>

        <div class="table-responsive col-md-10">
            <h5 class="card-body-title">Состав заказа</h5>
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th class="wd-16p">ID</th>
                    <th class="wd-16p">Блюдо</th>
                    <th class="wd-16p">Вес</th>
                    <th class="wd-16p">Цена, ₽</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orderItems as $item)
                    <tr>
                        <td>{{ $item->dish_id }}</td>
                        <td>{{ $item->dish_title }}</td>
                        <td>{{ $item->dish_weight }}</td>
                        <td>{{ $item->dish_price }}</td>
                    </tr>
                @endforeach
                {{--@if($orderItems->total() == 0)
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                @endif--}}
                </tbody>
            </table>

        </div>

    </div>

@endsection
