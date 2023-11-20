@extends('layouts.delivery')
@section('title', 'Ам-ням | Доставка')
@section('content')

    <div class="main-wrapper">
        <div class="container-services-title">
            <h2>Доставка и самовывоз</h2>
            <p>Посещение кафе возможно исключительно гостями, имеющими QR-код, подтверждающий пройденную вакцинацию от COVID-19, перенесенное заболевание или отрицательный ПЦР-тест, во исполнение Указа Мэра Москвы от 24.06.2021 «О внесении изменений в указ Мэра Москвы от 8 июня 2020 г. № 68-УМ» в связи с угрозой распространения в городе Москве новой коронавируснойинфекции (2019-nCo V)</p>
            <p>При отсутствии указанного QR-кода вы можете оформить заказ с собой или заказать доставку.</p>
            <p>Прием заказов на доставку блюд из кафе по телефону <span>238-238-3</span>, а также через сайт в период с <span>08:00 до 20:00</span> ежедневно, без выходных.</p>
            <p>Доставка в пределах МКАД бесплатна, при заказе от <span>2000</span> рублей.</p>
            <p>Стоимость доставки <span>300</span> рублей при сумме заказа менее <span>2000</span> рублей.</p>
            <p>Оплата курьеру наличными или банковской картой.</p>
            <p>Действует скидка 10% на все меню при самовывозе.</p>
        </div>
    </div>

    <div class="favorites-bg">
        <div class="favorites-container">
            <h3>Наши курьеры</h3>
            <div class="favorites">
                <div class="about-item">
                    <img src="{{asset('images/curier01-370-min.jpg')}}" alt="">
                    <h4>Александр</h4>
                </div>
                <div class="about-item">
                    <img src="{{asset('images/curier03-370-min.jpg')}}" alt="">
                    <h4>Михаил</h4>
                </div>
                <div class="about-item">
                    <img src="{{asset('images/curier02-370-min.jpg')}}" alt="">
                    <h4>Антон</h4>
                </div>
                <div class="about-item">
                    <img src="{{asset('images/curier04-370-min.jpg')}}" alt="">
                    <h4>Виталий</h4>
                </div>

            </div>
        </div>
    </div>
@endsection
