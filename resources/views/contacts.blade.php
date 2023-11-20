@extends('layouts.contacts')
@section('title', 'Ам-ням | Контакты')
@section('content')

    <div class="main-wrapper">
        <div class="container-services-title">
            <h2>Ищите нас в</h2>
            <div class="social-box">
                <div class="social-item">
                    <a href="">
                        <div class="social-image">
                            <img src="{{asset('images/telephone.svg')}}">
                        </div>
                        <div class="social-text">
                            Телефон
                            <span>8(917)238-238-3</span></div>
                    </a>
                </div>
                <div class="social-item">
                    <a href="">
                        <div class="social-image">
                            <img src="{{asset('images/email.svg')}}">
                        </div>
                        <div class="social-text">
                            E-Mail
                            <span>info@amnam.ru</span>
                        </div>
                    </a>
                </div>
                <div class="social-item">
                    <a href="">
                        <div class="social-image">
                            <img src="{{asset('images/whatsapp.svg')}}">
                        </div>
                        <div class="social-text">
                            WhatsApp
                            <span>89172382383</span>
                        </div>
                    </a>
                </div>
                <div class="social-item">
                    <a href="">
                        <div class="social-image">
                            <img src="{{asset('images/viber.svg')}}">
                        </div>
                        <div class="social-text">
                            Viber
                            <span>89172382383</span>
                        </div>
                    </a>
                </div>
                <div class="social-item">
                    <a href="">
                        <div class="social-image">
                            <img src="{{asset('images/facebook.svg')}}">
                        </div>
                        <div class="social-text">
                            Facebook
                            <span>moscowcafe</span>
                        </div>
                    </a>
                </div>
                <div class="social-item">
                    <a href="">
                        <div class="social-image">
                            <img src="{{asset('images/instagram.svg')}}">
                        </div>
                        <div class="social-text">
                            Instagram
                            <span>amnamcafe</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="social-box2">
                <div class="social-item2">
                    <a href="">
                        <div class="social-image2">
                            <img src="{{asset('images/telephone.svg')}}">
                        </div>
                        <div class="social-text2">
                            Телефон
                            <span>8(917)238-238-3</span>
                        </div>
                    </a>
                </div>
                <div class="social-item2">
                    <a href="">
                        <div class="social-image2">
                            <img src="{{asset('images/email.svg')}}">
                        </div>
                        <div class="social-text2">
                            E-Mail
                            <span>info@amnam.ru</span>
                        </div>
                    </a>
                </div>
                <div class="social-item2">
                    <a href="">
                        <div class="social-image2">
                            <img src="{{asset('images/whatsapp.svg')}}">
                        </div>
                        <div class="social-text2">
                            WhatsApp
                            <span>89172382383</span>
                        </div>
                    </a>
                </div>
                <div class="social-item2">
                    <a href="">
                        <div class="social-image2">
                            <img src="{{asset('images/viber.svg')}}">
                        </div>
                        <div class="social-text2">
                            Viber
                            <span>89172382383</span>
                        </div>
                    </a>
                </div>
                <div class="social-item2">
                    <a href="">
                        <div class="social-image2">
                            <img src="{{asset('images/facebook.svg')}}">
                        </div>
                        <div class="social-text2">
                            Facebook
                            <span>moscowcafe</span>
                        </div>
                    </a>
                </div>
                <div class="social-item2">
                    <a href="">
                        <div class="social-image2">
                            <img src="{{asset('images/instagram.svg')}}">
                        </div>
                        <div class="social-text2">
                            Instagram
                            <span>amnamcafe</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="contacts-bg">
        <div class="favorites-container">
            <h3>Наши вакансии</h3>
            <form method="post">
                <div class="contacts-form">
                    <div class="contacts-item">
                        <div class="form-control">
                            <input type="text" placeholder="Ваше имя">
                            <input type="text" placeholder="Дата рождения">
                        </div>
                    </div>
                    <div class="contacts-item">
                        <div class="form-control">
                            <input type="text" placeholder="Ваш телефон">
                            <input type="text" placeholder="Ваш e-mail">
                        </div>
                    </div>
                    <div class="contacts-item">
                        <div class="form-control">
                            <textarea placeholder="Ваш опыт работы"></textarea>

                        </div>
                    </div>
                    <div class="contacts-item">
                        <div class="form-control">
                            <input type="text" placeholder="Ваше образование">
                            <button type="submit">Отправить</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="form-control-checkbox">
                <input type="checkbox" checked id="ok" name="ok">
                <label for="ok">Согласен на обработку моих персональных данных (<a href="">Политика конфиденциальности</a>) </label>
            </div>
            <div class="vacations-text">
                <p>Если Вы хотите стать частью нашей команды заполните и пришлите эту анкету соискателя.</p>
                <p>Мы предлагаем: качественное обучение профессии, возможность совмещения работы с учебой, карьерный рост, стабильный доход и социальный пакет (в соотвествии с Трудовым Кодексом РФ)</p>
            </div>
        </div>
    </div>
@endsection
