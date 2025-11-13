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
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/toastr.css')}}" rel="stylesheet">
</head>

<body>
<div class="header-wrapper">
    <div class="header">
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
                        <li class="menu-item"><a href="{{ URL('/') }}" class="active">Главная</a></li>
                        <li class="menu-item"><a href="{{ route('menu') }}">Меню</a></li>
                        <li class="menu-item"><a href="{{ route('soup') }}">Супы</a></li>
                        <li class="menu-item"><a href="{{ route('delivery') }}">Доставка</a></li>
                        <li class="menu-item"><a href="{{ route('about') }}">О нас</a></li>
                        <li class="menu-item"><a href="{{ route('contacts') }}">Контакты</a></li>
                    </ul>
                </div>
                <div class="nav-mobile">
                    <li class="nav-mobile-item"><a href="{{ URL('/') }}" class="active">Главная</a></li>
                    <li class="nav-mobile-item"><a href="{{ route('menu') }}">Меню</a></li>
                    <li class="nav-mobile-item"><a href="{{ route('soup') }}">Супы</a></li>
                    <li class="nav-mobile-item"><a href="{{ route('delivery') }}">Доставка</a></li>
                    <li class="nav-mobile-item"><a href="{{ route('about') }}">О нас</a></li>
                    <li class="nav-mobile-item"><a href="{{ route('contacts') }}">Контакты</a></li>
                </div>
                <div id="burger">
                    <div class="burger-inner">
                        <span></span>
                        <span class="central-span"></span>
                        <span></span>
                    </div>
                </div>
            </div>

            <div class="orders">
                <div class="orders-text">
                    <p>Прием заказов</p>
                    <p class="phone">238-238-3</p>
                </div>
                @if(session('order_yes'))
                    <div style="
                            font-size: 1.2rem;
                            line-height: 1.2rem;
                            color: white;
                            text-align: center;
                            padding: 1rem;
                            border: 1px solid white;
                            margin-top: .5rem;
                            background-color: darkgreen;">
                        {{ session('order_yes') }}
                    </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
                <div class="orders-links">
                    <a href="#popup">Заказать место</a>
                    <a href="{{ route('menu') }}">Заказать блюдо</a>
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
        <div class="popup_image">
            <img src="{{asset('images/hall.jpg')}}" alt="План кафе">
        </div>
        <div class="popup_content">
            <a href="#fix-box" class="popup_close">
                <i class="fa fa-times"></i>
            </a>
            <h3 class="popup_title">Заказ места</h3>
            <div class="popup_text">
                <form class="login-form" action="{{ route('place') }}" method="post">
                    @csrf
                    <input class="login-input" type="text" name="name" placeholder="Имя *">
                    @error('name')
                    <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.5rem);">
                        <p style="text-align: center; width: 100%;">{{ $message }}</p>
                    </div>
                    @enderror
                    <input class="login-input" type="text" name="phone" placeholder="Телефон *">
                    @error('phone')
                    <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.5rem);">
                        <p style="text-align: center; width: 100%;">{{ $message }}</p>
                    </div>
                    @enderror
                    <label for="date_place">Дата</label>
                    <input class="login-input" type="date" name="date" id="date_place" placeholder="Дата *">
                    @error('date')
                    <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.5rem);">
                        <p style="text-align: center; width: 100%;">{{ $message }}</p>
                    </div>
                    @enderror
                    <label for="time_place">Время</label>
                    <input class="login-input" type="time" name="time" id="time_place" placeholder="Время *">
                    @error('time')
                    <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.5rem);">
                        <p style="text-align: center; width: 100%;">{{ $message }}</p>
                    </div>
                    @enderror

                    <select class="login-input" name="places" id="places">
                        <option value="">Выберите столик *</option>
                        @foreach($tables as $table)
                            <option value="{{ $table->name }}">{{ $table->name }}</option>
                        @endforeach
                    </select>
                    @error('places')
                    <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.5rem);">
                        <p style="text-align: center; width: 100%;">{{ $message }}</p>
                    </div>
                    @enderror

                    <button type="submit" href="#fix-box" class="login-submit">Заказать</button>
                </form>

            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('js/sweetalert.min.js')}}"></script>
<script src="{{ asset('js/toastr.min.js')}}"></script>

<script>
    @if(Session::has('message'))
    let type="{{Session::get('alert-type','info')}}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dateInput = document.querySelector('input[name="date"]');
        const timeInput = document.querySelector('input[name="time"]');
        const placesInput = document.querySelector('select[name="places"]');
        const submitButton = document.querySelector('.login-submit');

        // создаём место под сообщение
        const messageBox = document.createElement('div');
        messageBox.style.marginTop = '10px';
        messageBox.style.textAlign = 'center';
        messageBox.style.fontWeight = '500';
        document.querySelector('.login-form').appendChild(messageBox);

        // функция для проверки
        async function checkAvailability() {
            const date = dateInput.value;
            const time = timeInput.value;
            const places = placesInput.value;

            // если не выбрано всё — просто очищаем
            if (!date || !time || !places) {
                messageBox.textContent = '';
                submitButton.disabled = true;
                submitButton.style.opacity = '0';
                submitButton.style.display = 'none';
                return;
            }

            try {
                const response = await fetch('{{ route('checkPlace') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ date, time, places })
                });
                const data = await response.json();

                messageBox.textContent = data.message;
                if (data.status === 'ok') {
                    messageBox.style.color = 'green';
                    submitButton.disabled = false;
                    submitButton.style.opacity = '1';
                    submitButton.style.cursor = 'pointer';
                    submitButton.style.display = 'block';
                } else {
                    messageBox.style.color = 'red';
                    submitButton.disabled = true;
                    submitButton.style.opacity = '0';
                    submitButton.style.display = 'none';
                }
            } catch (error) {
                console.error(error);
                messageBox.textContent = 'Ошибка при проверке.';
                messageBox.style.color = 'red';
                submitButton.disabled = true;
                submitButton.style.opacity = '0';
                submitButton.style.display = 'none';
            }
        }

        // слушаем изменения
        dateInput.addEventListener('change', checkAvailability);
        timeInput.addEventListener('change', checkAvailability);
        placesInput.addEventListener('change', checkAvailability);

        // блокируем кнопку при загрузке страницы
        submitButton.disabled = true;
        submitButton.style.opacity = '0';
        submitButton.style.display = 'none';
    });
</script>

</body>
</html>
