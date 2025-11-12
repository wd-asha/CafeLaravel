@extends('layouts.admin_app')
@section('title', 'Ам-ням | Админ панель')
@section('content')
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Столики</h6>
        <p class="mg-b-20 mg-sm-b-30">Всего столиков: {{ $tables->total() }}<span style="float: right">
            <a href="{{ route('table.create') }}" class="btn btn-success"><i class="fa fa-user-plus"></i></a>
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
                    <th scope="col">Имя</th>
                    <th scope="col">Дата регистрации</th>
                    <th scope="col">Дата восстановления</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tables as $table)
                    <tr>
                        <td>
                            <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td>{{ $table->id }}</td>
                        <td>{{ $table->name }}</td>
                        <td>{{ $table->created_at->diffForHumans() }}</td>
                        <td>
                            @if($table->updated_at)
                                {{ $table->updated_at->diffForHumans() }}
                            @else Нет данных
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('table.edit', $table->id) }}" class="btn btn-warning" style="display: inline-block; margin-right: .5rem">
                                <i class="fa fa-edit" style="font-size: 1.2rem;"></i>
                            </a>
                            <a href="{{ route('table.delete', $table->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash" style="font-size: 1.2rem; padding: 2px"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $tables->links('vendor.pagination.bootstrap-4') }}
            </div>

            <h6 class="card-body-title">Корзина</h6>
            <p class="mg-b-20 mg-sm-b-30">Удаленные столики: {{ $trashed->total() }}</p>
            <table class="table table-hover table-bordered mg-b-0">
                <thead class="bg-info">
                <tr>
                    <th scope="col">
                        <label class="ckbox mg-b-0">
                            <input type="checkbox"><span></span>
                        </label>
                    </th>
                    <th scope="col">ID</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Дата регистрации</th>
                    <th scope="col">Дата блокировки</th>
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
                        <td>{{ $trash->name }}</td>
                        <td>
                            @if($trash->created_at)
                                {{ $trash->created_at->diffForHumans() }}
                            @else Нет данных
                            @endif
                        </td>
                        <td>
                            @if($trash->deleted_at)
                                {{ $trash->deleted_at->diffForHumans() }}
                            @else Нет данных
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('table.restore', $trash->id) }}" class="btn btn-success"><i class="fa fa-unlock"></i></a>
                            <a href="{{ route('table.destroy', $trash->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
