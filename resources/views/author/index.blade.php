@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="login2">
            <div class="col-12">
                <h1>AUTHOR DASHBOARD</h1>
                <h2>Hello, {{ Auth::user()->name }}</h2>
                <div>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                        <i class="icon ion-power"></i>Выход
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
