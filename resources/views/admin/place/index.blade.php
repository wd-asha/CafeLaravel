@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Поступившее заказы (на места)</h6>
        <p class="mg-b-20 mg-sm-b-30">Всего новых заказов: {{ $places->total() }}<span style="float: right"></span></p>

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
                    <th class="wd-10p">Имя</th>
                    <th class="wd-10p">Телефон</th>
                    <th class="wd-10p">Дата</th>
                    <th class="wd-10p">Время</th>
                    <th class="wd-10p">Места</th>
                    <th class="wd-10p">Создано</th>
                    <th class="wd-10p">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($places as $place)
                    <tr>
                        <td>{{ $place->id }}</td>
                        <td>{{ $place->name }}</td>
                        <td>{{ $place->phone }}</td>
                        <td>{{ $place->date }}</td>
                        <td>{{ $place->time }}</td>
                        <td>{{ $place->places }}</td>
                        <td>{{ $place->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('admin.place.delete', $place->id) }}" class="btn btn-outline-info" style="display: inline-block; margin-bottom: 10px;"><i class="fa fa-trash" style="font-size: 1.2rem;"></i></a>
                        </td>
                    </tr>
                @endforeach
                @if($places->total() == 0)
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $places->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>

        <div style="padding: 20px;"></div>
        {{--Trashed Places--}}
        <h6 class="card-body-title">Корзина</h6>
        <p class="mg-b-10 mg-sm-b-10">Удаленные заказы (на места): {{ $trashed->total() }}</p>
        <div class="table-responsive">
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th class="wd-5p">ID</th>
                    <th class="wd-10p">Имя</th>
                    <th class="wd-10p">Телефон</th>
                    <th class="wd-10p">Дата</th>
                    <th class="wd-10p">Время</th>
                    <th class="wd-10p">Места</th>
                    <th class="wd-10p">Удалено</th>
                    <th class="wd-10p">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($trashed as $trash)
                    <tr>
                        <td>{{ $trash->id }}</td>
                        <td>{{ $trash->name }}</td>
                        <td>{{ $trash->phone }}</td>
                        <td>{{ $trash->date }}</td>
                        <td>{{ $trash->time }}</td>
                        <td>{{ $trash->places }}</td>
                        <td>{{ $trash->deleted_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('admin.place.restore', $trash->id) }}" class="btn btn-success"><i class="fa fa-repeat"></i></a>
                            <a href="{{ route('admin.place.destroy', $trash->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                @if($trashed->total() == 0)
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $trashed->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>

    </div>

@endsection
