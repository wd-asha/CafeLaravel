@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
        <h6 class="card-body-title">Редактирование времени (ID {{ $hour->id }})</h6>

        <form action="{{ route('hour.update', $hour->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                <div class="row mg-b-25">

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">День недели: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="day_of_week" placeholder="День недели" value="{{$hour->day_of_week}}"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Начало работы: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="time" name="open_time" placeholder="Начало работы" value="{{$hour->open_time}}"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Окончание работы: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="time" name="close_time" placeholder="Окончание работы" value="{{$hour->close_time}}"><br>
                        </div>
                    </div>

                </div>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-success mg-r-5"><i class="fa fa-floppy-o"></i></button>
                    <a href="{{ route('admin.hours') }}" class="btn btn-info">К списку</a>
                </div>
            </div>
        </form>
    </div>


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-tagsinput.min.js') }}"></script>

    <script>
        $(document).on("click", "[type='checkbox']", function(e) {
            if (this.checked) {
                $(this).attr("value", "true");
            } else {
                $(this).attr("value","false");}
        });
    </script>

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
