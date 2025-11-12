@extends('layouts.admin_app')
@section('title', 'Ам-ням | Админ панель')
@section('content')
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Рабочее время</h6>
        <p class="mg-b-20 mg-sm-b-30">Всего: {{ $hours->total() }}<span style="float: right">
            <a href="{{ route('hour.create') }}" class="btn btn-success"><i class="fa fa-user-plus"></i></a>
        </span></p>

        <div class="table-responsive">
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th scope="col">
                        <label class="ckbox mg-b-0">
                            <input type="checkbox"><span></span>
                        </label>
                    </th>
                    <th scope="col">ID</th>
                    <th scope="col">День недели</th>
                    <th scope="col">Начало работы</th>
                    <th scope="col">Окончание работы</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($hours as $hour)
                    <tr>
                        <td>
                            <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td>{{ $hour->id }}</td>
                        <td>{{ $hour->day_of_week }}</td>
                        <td>{{ $hour->open_time }}</td>
                        <td>{{ $hour->close_time }}</td>

                        <td>
                            <a href="{{ route('hour.edit', $hour->id) }}" class="btn btn-warning" style="display: inline-block; margin-right: .5rem">
                                <i class="fa fa-edit" style="font-size: 1.2rem;"></i>
                            </a>
                            <a href="{{ route('hour.delete', $hour->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash" style="font-size: 1.2rem; padding: 2px"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $hours->links('vendor.pagination.bootstrap-4') }}
            </div>

            <h6 class="card-body-title">Корзина</h6>
            <p class="mg-b-20 mg-sm-b-30">Удаленное время: {{ $trashed->total() }}</p>
            <table class="table table-hover table-bordered mg-b-0">
                <thead class="bg-info">
                <tr>
                    <th scope="col">
                        <label class="ckbox mg-b-0">
                            <input type="checkbox"><span></span>
                        </label>
                    </th>
                    <th scope="col">ID</th>
                    <th scope="col">День недели</th>
                    <th scope="col">Начало работы</th>
                    <th scope="col">Окончание работы</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($trashed as $trash)
                    <tr>
                        <td>
                            <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td>{{ $trash->id }}</td>
                        <td>{{ $trash->day_of_week }}</td>
                        <td>{{ $trash->open_time }}</td>
                        <td>{{ $trash->close_time }}</td>

                        <td>
                            <a href="{{ route('hour.restore', $trash->id) }}" class="btn btn-success"><i class="fa fa-unlock"></i></a>
                            <a href="{{ route('hour.destroy', $trash->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
