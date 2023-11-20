@extends('layouts.admin_app')
@section('content')
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Блюда</h6>
        <p class="mg-b-20 mg-sm-b-30">Всего: {{ $dishes->total() }}
            <span style="float: right">
                <a href="{{ route('dish.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i></a>
            </span>
        </p>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th>ID</th>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Категория</th>
                    <th>Вес, гр.</th>
                    <th>Цена, <i class="fa fa-ruble"></i></th>
                    <th>Статус</th>
                    <th>Дата создания</th>
                    <th>Дествия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dishes as $dish)
                    <tr>
                        <td>{{ $dish->id }}</td>
                        <td><img src="../../../../{{ $dish->image}}" alt="" style="width: 100px;"></td>
                        <td>{{ $dish->title }}</td>
                        <td>{{ $dish->category->title }}</td>
                        <td>{{ $dish->weight }}</td>
                        <td>{{ $dish->price }}</td>
                        <td>
                            <div class="togglebutton">
                                <label>
                                    @if($dish->status)
                                        <a href="{{route('dish.status0', $dish->id)}}">
                                            <input type="checkbox" checked="">
                                            <span class="toggle"></span>
                                        </a>
                                    @endif
                                    @if(!$dish->status)
                                        <a href="{{route('dish.status1', $dish->id)}}">
                                            <input type="checkbox">
                                            <span class="toggle"></span>
                                        </a>
                                    @endif
                                </label>
                            </div>
                        </td>
                        <td>{{ $dish->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('dish.show', $dish->id) }}" class="btn btn-info" style="display: inline-block; margin-right: .5rem;">
                                <i class="fa fa-eye" style="font-size: 1.2rem;"></i>
                            </a>
                            <a href="{{ route('dish.edit', $dish->id) }}" class="btn btn-warning" style="display: inline-block; margin-right: .5rem">
                                <i class="fa fa-edit" style="font-size: 1.2rem;"></i>
                            </a>
                            <a href="{{ route('dish.delete', $dish->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash" style="font-size: 1.2rem; padding: 2px"></i></a>
                        </td>
                    </tr>
                @endforeach
                @if($dishes->total() == 0)
                    <tr>
                        <td><p style="text-align: center; width: 100%">нет данных</p></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $dishes->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>

        <div style="padding: 20px;"></div>
        {{--Trashed Dishes--}}
        <h6 class="card-body-title">Корзина</h6>
        <p class="mg-b-10 mg-sm-b-10">Удаленные блюда: {{ $trashed->total() }}</p>
        <div class="table-responsive">
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th>ID</th>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Категория</th>
                    <th>Вес, гр.</th>
                    <th>Цена, <i class="fa fa-ruble"></i></th>
                    <th>Дата удаления</th>
                    <th>Дествия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($trashed as $trash)
                    <tr>
                        <td>{{ $tash->id }}</td>
                        <td><img src="../../../../{{ $trash->image}}" alt="" style="width: 100px;"></td>
                        <td>{{ $trash->title }}</td>
                        <td>{{ $trash->category->title }}</td>
                        <td>{{ $trash->weight }}</td>
                        <td>{{ $trash->price }}</td>
                        <td>{{ $trash->deleted_at->diffForHumans() }}</td>
                        <td>
                        <td>
                            <a href="{{ route('dish.restore', $trash->id) }}" class="btn btn-success"><i class="fa fa-repeat"></i></a>
                            <a href="{{ route('dish.destroy', $trash->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
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
