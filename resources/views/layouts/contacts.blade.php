<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/popup.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/about.css')}}" rel="stylesheet">
    <link href="{{asset('css/contacts.css')}}" rel="stylesheet">
</head>

<body>
<div class="header-wrapper">
    <div class="header-contacts">
        <div class="header-logo-menu-bg">
            <div class="header-logo-menu">
                <div class="logo">
                    <a href="{{ URL('/') }}" class="main-screen">
                        <span class="big-logo">Ам-ням</span><br>
                        <span class="small-logo">07:00 до 21:00, Москва, Брестская, 64</span>
                        <span class="mobile-logo">07:00 — 21:00, Москва, Брестская, 64</span>
                    </a>
                    <a href="{{ URL('/') }}" class="small-screen">
                        <span class="big-logo">Ам-ням</span><br>
                        <span class="small-logo">07:00 до 21:00</span>
                        <span class="small-logo">ул.Брестская, д.64</span>
                        <span class="small-logo">238-238-3</span>
                    </a>
                </div>
                <div class="nav">
                    <ul class="menu">
                        <li class="menu-item"><a href="{{ URL('/') }}">Главная</a></li>
                        <li class="menu-item"><a href="{{ route('menu') }}">Меню</a></li>
                        <li class="menu-item"><a href="{{ route('soup') }}">Супы</a></li>
                        <li class="menu-item"><a href="{{ route('delivery') }}">Доставка</a></li>
                        <li class="menu-item"><a href="{{ route('about') }}">О нас</a></li>
                        <li class="menu-item"><a href="{{ route('contacts') }}" class="active">Контакты</a></li>
                    </ul>
                </div>
                <div class="nav-mobile">
                    <li class="nav-mobile-item"><a href="{{ URL('/') }}">Главная</a></li>
                    <li class="nav-mobile-item"><a href="{{ route('menu') }}">Меню</a></li>
                    <li class="nav-mobile-item"><a href="{{ route('soup') }}">Супы</a></li>
                    <li class="nav-mobile-item"><a href="{{ route('delivery') }}">Доставка</a></li>
                    <li class="nav-mobile-item"><a href="{{ route('about') }}">О нас</a></li>
                    <li class="nav-mobile-item"><a href="{{ route('contacts') }}" class="active">Контакты</a></li>
                </div>
                <div id="burger">
                    <div class="burger-inner">
                        <span></span>
                        <span class="central-span"></span>
                        <span></span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@yield('content')

<footer>
    <a href="https://wd-asha.ru">
        <p>&copy; wd-asha</p>
    </a>
</footer>

<div class="fix-box" id="fix-box"></div>

<div class="popup" id="popup">
    <a href="#fix-box" class="popup_area"></a>
    <div class="popup_body">
        <div class="popup_content">
            <a href="#fix-box" class="popup_close">
                <i class="fa fa-times"></i>
            </a>
            <div class="popup_title">
                Заказ места
            </div>
            <div class="popup_text">
                <form class="login-form" action="" method="post">
                    <input class="login-input" type="text" placeholder="Ваше имя *">
                    <input class="login-input" type="text" placeholder="Ваш телефон *">
                    <input class="login-input" type="text" placeholder="Дата *">
                    <input class="login-input" type="text" placeholder="Время *">
                    <input class="login-input" type="text" placeholder="Количество мест *">
                    <a href="#fix-box" class="login-submit">Отправить</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script>
    $('#burger').click(function () {
        let
            burgerSpan = $('#burger .burger-inner span'),
            burgerSpanCentral = $('#burger .burger-inner span.central-span'),
            burgerSpanBefore = $('#burger .burger-inner span:first-child'),
            burgerSpanAfter = $('#burger .burger-inner span:last-child'),
            mobileMenu = $('.nav-mobile'),
            mobileMenuLink = $('.nav-mobile li a');

        mobileMenu.toggleClass('open-menu');
        if (mobileMenu.hasClass('open-menu')) {
            burgerSpan.css("left", "50%");
            burgerSpan.css("top", "50%");
            burgerSpan.css("width", "6px");
            mobileMenuLink.css({"opacity": 1, "transition": "2s"});
            setTimeout(function() {
                burgerSpanBefore.css("transform", "translate(-50%, -50%) rotate(45deg)");
                burgerSpanAfter.css("transform", "translate(-50%, -50%) rotate(-45deg)");
            }, 400);
            setTimeout(function() {
                burgerSpanBefore.css("width", "80%");
                burgerSpanAfter.css("width", "80%")
            }, 600);
        }else{
            burgerSpan.css("width", "6px");
            mobileMenuLink.css({"opacity": 0, "transition": ".5s"});
            setTimeout(function() {
                burgerSpanBefore.css("transform", "translate(-50%, -50%) rotate(0)");
                burgerSpanAfter.css("transform", "translate(-50%, -50%) rotate(0)");
            }, 200);
            setTimeout(function() {
                burgerSpanBefore.css("top", "25%");
                burgerSpanAfter.css("top", "75%");
                burgerSpan.css("width", "80%")
            }, 700);
        }
    });
</script>
</body>
</html>
