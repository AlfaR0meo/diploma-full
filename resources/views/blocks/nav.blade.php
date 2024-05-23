<nav class="nav">
    <div class="container container--lg">
        <ul class="nav__list">

            <li class="nav__item nav__item--logo">
                <a class="nav__link nav__link--logo" href="{{ route('index') }}">Сев<span
                        class="accent-color">Эко</span></a>
            </li>
            <li class="nav__item">
                <a class="nav__link" href="{{ route('index') }}">Главная</a>
            </li>
            <li class="nav__item">
                <a class="nav__link" href="{{ route('ecomap') }}">Экокарта</a>
            </li>
            <li class="nav__item">
                <a class="nav__link" href="{{ route('index') }}">Экодоска</a>
            </li>
            <li class="nav__item">
                <a class="nav__link" href="{{ route('events') }}">Мероприятия</a>
            </li>
            <li class="nav__item">
                <a class="nav__link" href="{{ route('materials') }}">Полезные материалы</a>
            </li>

            @auth
            <li class="nav__item nav__item--account">
                <a class="nav__btn nav__btn--admin" href="{{ route('admin') }}">Админ</a>
                
                <div class="nav__user-avatar-name">
                    @if (!Auth::User()->avatar)
                    <div class="user-avatar">{{ Str::of(Auth::User()->name)->ucfirst()->charAt(0) }}</div>
                    @else
                    <div class="user-avatar">
                        <img src="/storage/{{ Auth::User()->avatar }}" alt="">
                    </div>
                    @endif

                    <div class="user-name">{{ Str::of(Auth::User()->name)->ucfirst()->limit(15) }}</div>
                </div>
                
                <div class="nav__user-account-menu">
                    <a class="profile-link" href="{{ route('user.profile') }}">Профиль</a>
                    <form class="logout-form" action="{{ route('user.logout') }}" method="POST">
                        @csrf
                        <button>Выйти</button>
                    </form>
                </div>
            </li>
            @endauth

            @guest
            <li class="nav__item nav__item--account">
                <a class="nav__btn nav__btn--admin" href="{{ route('admin') }}">Админ</a>
                <a class="nav__btn nav__btn--register" href="{{ route('user.register') }}">Регистрация</a>
                <a class="nav__btn nav__btn--login" href="{{ route('user.login') }}">Вход</a>
            </li>
            @endguest

        </ul>
    </div>
</nav>
