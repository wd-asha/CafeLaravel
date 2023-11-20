@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
        <h6 class="card-body-title">Новое блюдо</h6>

        <form action="{{ route('dish.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="form-layout">
            <div class="row mg-b-25">

                <div class="col-lg-3">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Категория: <span class="tx-danger">*</span></label>
                        <select class="form-control select2" name="category_id">
                            <option label="Выберите категорию"></option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Наименование: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="title" placeholder="Наименование блюда"><br>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="form-group">
                        <label class="form-control-label">Вес: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="number" name="weight" placeholder="Вес"><br>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="form-group">
                        <label class="form-control-label">Цена: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="number" name="price" placeholder="Цена"><br>
                    </div>
                </div>

                <div class="col-lg-10">
                    <div class="form-group">
                        <label class="form-control-label">Состав бдюда: <span class="tx-danger">*</span></label>
                        <textarea class="form-control" id="summernote1" name="compound"></textarea><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Фото: <span class="tx-danger">*</span></label><br>
                        <label class="custom-file">
                            <input class="custom-file-input" type="file" id="file" name="image" data-placeholder="Выберите фото" onchange="readURL1(this);"><br><br><br>
                            <span class="custom-file-control"></span>
                            <img src="{{ asset('media/dish/empty-image.png') }}" id="one">
                        </label>
                    </div>
                </div>

            </div><br><br><!-- row -->

            <hr>

            <div class="form-layout-footer">
                <button type="submit" class="btn btn-success mg-r-5"><i class="fa fa-floppy-o"></i></button>
                <a href="{{ route('admin.dishes') }}" class="btn btn-info">К списку блюд</a>
            </div>
        </div>
        </form>

    </div>


    {{--<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-tagsinput.min.js')}}"></script>--}}

    {{--<script>
        $(document).on("click", "[type='checkbox']", function(e) {
            if (this.checked) {
                $(this).attr("value", "true");
            } else {
                $(this).attr("value","false");}
        });
    </script>--}}

    <script type="text/javascript">
        function readURL1(input){
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
