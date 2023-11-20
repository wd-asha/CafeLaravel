@extends('layouts.admin_app')
@section('content')
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Категории</h6>
        <p class="mg-b-20 mg-sm-b-30">Всего категорий: {{ $categories->total() }}<span style="float: right">
            <a href="" class="btn btn-success" data-toggle="modal" data-target="#modaldemo3"><i class="fa fa-plus"></i></a>
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
                    <th scope="col">
                        <label class="ckbox mg-b-0">
                            <input type="checkbox"><span></span>
                        </label>
                    </th>
                    <th>ID</th>
                    <th>Наименование</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->title }}</td>
                        <td>
                            <a href="{{ route('admin.category.delete', $category->id) }}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                @if($categories->total() == 0)
                    <tr>
                        <td></td>
                        <td></td>
                        <td><p style="text-align: center">нет категорий</p></td>
                        <td></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $categories->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    </div>

    <!-- LARGE MODAL -->
    <div id="modaldemo3" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Новая категория</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('admin.category.store') }}">
                    @csrf
                    <div class="modal-body pd-20">

                        <div class="form-group @error('category_name') is-invalid @enderror">
                            <input type="text" name="title" class="form-control" placeholder="Наименование">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info btn-block">Создать</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
