{{-- меню аккаунта пользователя --}}
<div class="account-links">
    {{-- в личный кабинет --}}
    <a href="{{ route('author.index') }}" class="account-link
        @if($accountLink == 'account') account-link-active @endif">Аккаунт</a>
    {{-- на изменение данных пользователя --}}
    <a href="{{ route('author.change') }}" class="account-link
        @if($accountLink == 'change') account-link-active @endif">Изменить</a>
    {{-- к списку заказов столиков --}}
    <a href="{{ route('author.place') }}" class="account-link
        @if($accountLink == 'place') account-link-active @endif">Заказы мест</a>
    {{-- к списку заказов блюд --}}
    <a href="{{ route('author.order') }}" class="account-link
        @if($accountLink == 'order') account-link-active @endif">Заказы блюд</a>
    {{-- в панель администратора, если пользователь - администратор --}}
    @if(auth()->user()->is_admin)
        <a href="{{ route('admin.index') }}" class="account-link">Панель управления</a>
    @endif
    {{-- на выход --}}
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <a href="#" class="account-link"
       onclick="event.preventDefault();document.getElementById('logout-form').submit();">Выход
    </a>
</div>
