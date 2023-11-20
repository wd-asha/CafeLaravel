@extends('layouts.admin_app')
@section('content')
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Заказ в работе</h6>
        <p class="mg-b-20 mg-sm-b-30">Всего заказов в работе: {{ $orders->total() }}<span style="float: right">
            {{--<a href="{{ route('admin.product.create') }}" class="btn btn-info">New Product</a>--}}
        </span></p>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th class="wd-5p">ID</th>
                    <th class="wd-5p">Пользователь</th>
                    <th class="wd-10p">EMail</th>
                    <th class="wd-5p">Адрес доставки</th>
                    <th class="wd-8p">Телефон</th>
                    <th class="wd-8p">Стоимость</th>
                    <th class="wd-12p">Дата создания</th>
                    <th class="wd-12p">Дата обновления</th>
                    <th class="wd-5p">Статус</th>
                    <th class="wd-10p">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user_name }}</td>
                        <td>{{ $order->order_email }}</td>
                        <td>{{ $order->order_delivery }}</td>
                        <td>{{ $order->order_phone }}</td>
                        <td>{{ $order->order_total }} ₽</td>
                        <td>{{ $order->created_at->diffForHumans() }}</td>
                        <td>{{ $order->updated_at->diffForHumans() }}</td>
                        <td>
                            @if($order->order_status == 0)
                                <span style="color: red;">Новый</span>
                            @elseif($order->order_status == 1)
                                <span style="color: blue;">В обработке</span>
                            @elseif($order->order_status == 2)
                                <span style="color: green;">На доставке</span>
                            @else
                                <span>Завершен</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.order.show', $order->id) }}" class="btn btn-outline-info" style="display: inline-block; margin-bottom: 10px;"><i class="fa fa-eye" style="font-size: 1.2rem;"></i></a>
                        </td>
                    </tr>
                @endforeach
                @if($orders->total() == 0)
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $orders->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    </div>

@endsection
