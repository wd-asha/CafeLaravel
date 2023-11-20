@extends('layouts.soup')
@section('title', 'Ам-ням | Супы')
@section('content')

    <div class="main-wrapper">
        <div class="container-services-title">
            <h2>Супы</h2>
            <p>Каждый человек  хоть раз задавался вопросом: где поесть вкусный суп в Москве? Если вы предпочитаете вкусную еду, и легкую дружескую атмосферу, то вам непременно стоит посетить наше заведение. Широкий ассортимент различных супов позволит выбрать наиболее подходящее блюдо и вкусно поесть по приемлемой цене.</p>
            <p>Кроме того, у нас вы сможете попробовать ассорти из нескольких видов супов, которые выберете сами. Так же предусмотрена возможность заказа большой супницы, которая порадует большую компанию вкусным, горячим блюдом.</p>
        </div>
        <div class="container-services">

            @foreach($dishes as $dish)
                @if($dish->category_id === 1)
                    <div class="services-item">
                        <img src="{{asset($dish->image)}}" alt="">
                        <h4>{{ $dish->title }}<br>{{ $dish->weight }} гр.</h4>
                        <h5>{{ $dish->price }} р.</h5>
                        <div class="overlay">
                            <div class="text-box">
                                <p>Состав:</p>
                                <p>{!! $dish->compound !!}</p>
                            </div>
                            <form action="{{route('dish.addCart', $dish->id)}}" method="POST">
                                @csrf
                                <button type="submit" name="submit">Выбрать</button>
                            </form>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
        <a href="" class="all-menu">Все меню</a>

    </div>

<div class="favorites-bg">
    <div class="favorites-container">
        <h3>Популярное</h3>
        <div class="favorites">
            <div class="favorites-item">
                <img src="{{asset('images/fav-item1-min.jpg')}}" alt="">
                <a>Блинчики</a>
                <p>Ваши любимые блинчики с мясным фаршем</p>
            </div>
            <div class="favorites-item">
                <img src="{{asset('images/fav-item2-min.jpg')}}" alt="">
                <a>Окрошка</a>
                <p>Освежающий, диетический, полезный суп</p>
            </div>
            <div class="favorites-item">
                <img src="{{asset('images/fav-item3-min.jpg')}}" alt="">
                <a>Яйца</a>
                <p>Фаршированные со свеклой и сельдью</p>
            </div>
            <div class="favorites-item">
                <img src="{{asset('images/fav-item4-min.jpg')}}" alt="">
                <a>Паста</a>
                <p>Макароны в сливочном соусе с бейконом</p>
            </div>
            <div class="favorites-item">
                <img src="{{asset('images/fav-item5-min.jpg')}}" alt="">
                <a>Запеканка</a>
                <p>Вкусное, полноценное и сытное блюдо</p>
            </div>
            <div class="favorites-item">
                <img src="{{asset('images/fav-item6-min.jpg')}}" alt="">
                <a>Коктели</a>
                <p>Холодный банановый лате к завтраку</p>
            </div>
        </div>
    </div>
</div>
@endsection
