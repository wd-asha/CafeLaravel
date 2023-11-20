@extends('layouts.admin_app')
@section('title', 'Ам-ням | Админ панель')
@section('content')
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Пользователи</h6>
        <p class="mg-b-20 mg-sm-b-30">Всего пользователей: {{ $users->total() }}<span style="float: right">
            <a href="{{ route('register') }}" class="btn btn-success"><i class="fa fa-user-plus"></i></a>
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
                    <th scope="col">EMail</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Дата регистрации</th>
                    <th scope="col">Дата восстановления</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->role_id == 0) Гость
                            @elseif($user->role_id == 1) Администратор
                            @elseif($user->role_id == 2) Менеджер
                            @endif
                        </td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>
                            @if($user->updated_at)
                                {{ $user->updated_at->diffForHumans() }}
                            @else Нет данных
                            @endif
                        </td>
                        <td>
                            @if(!$user->role_id == 0)
                                <a href="{{ route('delete.user', $user->id) }}" class="btn btn-warning"><i class="fa fa-lock"></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $users->links('vendor.pagination.bootstrap-4') }}
            </div>

            <h6 class="card-body-title">Корзина</h6>
            <p class="mg-b-20 mg-sm-b-30">Заблокированные пользователи: {{ $trashed->total() }}</p>
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
                    <th scope="col">EMail</th>
                    <th scope="col">Статус</th>
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
                        <td>{{ $trash->email }}</td>
                        <td>
                            @if($trash->role_id == 0) Гость
                            @elseif($trash->role_id == 1) Администратор
                            @elseif($trash->role_id == 2) Менеджер
                            @endif
                        </td>
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
                            <a href="{{ route('restore.user', $trash->id) }}" class="btn btn-success"><i class="fa fa-unlock"></i></a>
                            <a href="{{ route('destroy.user', $trash->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
