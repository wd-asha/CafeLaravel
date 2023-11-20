@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>AUTHOR DASHBOARD</h1>
                <h2>Hello, {{ Auth::user()->name }}</h2>
            </div>
        </div>
    </div>
@endsection
