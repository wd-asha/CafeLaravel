@extends('layouts.menu')
@section('title', 'Ам-ням | Меню')
@section('content')

    <div class="main-wrapper">
        <div class="container-services-title">
            <h2>Основное меню</h2>
            <p>Как любое уважающее себя кафе, «АМ-НЯМ» предлагает самые разные блюда на любой вкус — хоть для вегетарианцев, хоть для мясоедов, хоть для сладкоежек, хоть для любителей острого.</p>
            <p>У нас можно позавтракать с 7 утра до 12 по будням и с 8 утра до 14 на выходных. На завтрак шеф-повар приготовит вам каши, сырники, омлеты и блинчики.</p>
            <p>Не стоит замалчивать и факт совершенно доступных бизнес-ланчей по будням с 12 до 16 часов.</p>
        </div>
        <div class="container-services">

            @foreach($dishes as $dish)
                @if($dish->category_id !== 1)
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
