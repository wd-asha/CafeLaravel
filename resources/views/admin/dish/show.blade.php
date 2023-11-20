@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
        <h6 class="card-body-title" style="margin-bottom: 2rem">Отель (ID: {{ $hotel->id }})</h6>
        <div class="form-layout">
            <div class="row mg-b-10">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Страна: </label>
                        <span style="text-transform: uppercase;">{{ $hotel->country->country_title }}</span>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Город: </label>
                        <span style="text-transform: uppercase;">{{ $hotel->hotel_town }}</span>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Отель: </label>
                        <span style="text-transform: uppercase;">{{ $hotel->hotel_title }}</span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Звезды: </label>
                        <span style="text-transform: uppercase;">{{ $hotel->hotel_stars }}</span>
                    </div>
                </div>
            </div>
            <div class="row mg-b-10">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Количество номеров: </label>
                        <span style="text-transform: uppercase;">{{ $hotel->hotel_rooms }}</span>
                    </div>
                </div>
            </div>
            <div class="row mg-b-10">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Место: </label>
                        <span>{!! $hotel->hotel_place !!}</span>
                    </div>
                </div>
            </div>
            <div class="row mg-b-10">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Туры: </label>
                        <span>{!! $hotel->hotel_tours !!}</span>
                    </div>
                </div>
            </div>
            <div class="row mg-b-10">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Отель: </label>
                        <span>{!! $hotel->hotel_about !!}</span>
                    </div>
                </div>
            </div>

            <div class="row mg-b-10">
                <img src="/{{ $hotel->hotel_image1 }}" alt="" style="width: 22%; margin-left: 1rem">
                <img src="/{{ $hotel->hotel_image2 }}" alt="" style="width: 22%; margin-left: 1rem">
                <img src="/{{ $hotel->hotel_image3 }}" alt="" style="width: 22%; margin-left: 1rem">
                <img src="/{{ $hotel->hotel_image4 }}" alt="" style="width: 22%; margin-left: 1rem">
            </div>

            <div class="form-layout-footer">
                <a href="{{ route('admin.hotels') }}" class="btn btn-info">К списку отелей</a>
            </div>
        </div>
    </div>
@endsection
