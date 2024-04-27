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
                <a class="nav__link" href="{{ route('index') }}">Форум</a>
            </li>
            {{-- <li class="nav__item">
                <a class="nav__link" href="{{ route('index') }}">Полезные ресурсы</a>
            </li> --}}

            <li class="nav__item nav__item--account">
                <a class="nav__btn nav__btn--login" href="/login">Войти</a>
                <a class="nav__btn nav__btn--register" href="/register">Присоединиться</a>
            </li>

        </ul>
    </div>
</nav>
