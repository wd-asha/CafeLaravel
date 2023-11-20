@extends('layouts.wishlist')
@section('title', 'Ам-ням | Заказ')
@section('content')

    <div class="main-wrapper">
        <div class="container-services-title">
            <h2>Ваш выбор</h2>
        </div>
        <div class="container-services">

            @foreach($cartItems as $cartItem)
                <div class="services-item">
                    <img src="{{asset($cartItem->options->image)}}" alt="">
                    <h4>{{ $cartItem->name }}<br>{{ $cartItem->weight }} гр.</h4>
                    <h5>{{ $cartItem->price }} р.</h5>
                    <div class="overlay">
                        <div class="text-box">
                            <p>Состав:</p>
                            <p>{!! $cartItem->options->compound !!}</p>
                        </div>
                        <a href="{{route('wishlist.delete', $cartItem->rowId)}}">Удалить</a>
                    </div>
                </div>
            @endforeach

        </div>
<br><br>
    </div>

    <div class="contacts-bg">
        <div class="favorites-container">
            <h3>Доставка</h3>
            <form method="post" action="{{ route('check') }}">
                @csrf
                <div class="contacts-form">
                    <div class="contacts-item">
                        <div class="form-control">
                            <input type="text" name="name" placeholder="Имя">
                            @error('name')
                            <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.5rem);">
                                <p style="text-align: center; width: 100%;">{{ $message }}</p>
                            </div>
                            @enderror
                            <input type="text" name="phone" placeholder="Телефон">
                            @error('phone')
                            <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.5rem);">
                                <p style="text-align: center; width: 100%;">{{ $message }}</p>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="contacts-item">
                        <div class="form-control">
                            <input type="date" name="date" placeholder="Дата">
                            @error('date')
                            <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.5rem);">
                                <p style="text-align: center; width: 100%;">{{ $message }}</p>
                            </div>
                            @enderror
                            <input type="time" name="time" placeholder="Время">
                            @error('time')
                            <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.5rem);">
                                <p style="text-align: center; width: 100%;">{{ $message }}</p>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="contacts-item">
                        <div class="form-control">
                            <textarea placeholder="Сообщение к заказу"></textarea>
                        </div>
                    </div>
                    <div class="contacts-item">
                        <div class="form-control">
                            <input type="text" name="delivery" placeholder="Адрес">
                            @error('delivery')
                            <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.5rem);">
                                <p style="text-align: center; width: 100%;">{{ $message }}</p>
                            </div>
                            @enderror
                            <button type="submit" name="submit">Доставить</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="form-control-checkbox">
                <input type="checkbox" checked id="ok" name="ok">
                <label for="ok">Согласен на обработку моих персональных данных (<a href="">Политика конфиденциальности</a>) </label>
            </div>
        </div>
    </div>
@endsection
