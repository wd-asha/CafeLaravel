@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
        <h6 class="card-body-title">Новый столик</h6>

        <form action="{{ route('table.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="form-layout">
            <div class="row mg-b-25">

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Наименование: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="name" placeholder="Наименование столика"><br>
                    </div>
                </div>

            </div><br><br><!-- row -->

            <hr>

            <div class="form-layout-footer">
                <button type="submit" class="btn btn-success mg-r-5"><i class="fa fa-floppy-o"></i></button>
                <a href="{{ route('admin.tables') }}" class="btn btn-info">К списку столиков</a>
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
