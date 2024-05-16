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
                <a class="nav__link" href="{{ route('forum') }}">Форум</a>
            </li>

            @auth
            <li class="nav__item nav__item--account">
                <a class="nav__btn nav__btn--profile" href="{{ route('user.profile') }}">{{ Auth::User()->name }}</a>

                <form action="{{ route('user.logout') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="nav__btn nav__btn--logout" type="submit">Выход</button>
                </form>
            </li>
            @endauth

            @guest
            <li class="nav__item nav__item--account">
                <a class="nav__btn nav__btn--login" href="{{ route('user.login') }}">Вход</a>
                <a class="nav__btn nav__btn--register" href="{{ route('user.register') }}">Регистрация</a>
            </li>
            @endguest

        </ul>
    </div>
</nav>