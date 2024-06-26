<nav class="nav">
    <div class="container container--lg">
        <ul class="nav__list">

            <li class="nav__item nav__item--logo">
                <a class="nav__link nav__link--logo" href="{{ route('home') }}">Сев<span class="accent-color">Эко</span></a>
            </li>
            
            <li class="nav__item">
                <a class="nav__link" href="{{ route('home') }}">Главная</a>
            </li>
            <li class="nav__item">
                <a class="nav__link" href="{{ route('ecomap') }}">Экокарта</a>
            </li>
            <li class="nav__item">
                <a class="nav__link" href="{{ route('ecoideas') }}">Экоидеи</a>
            </li>

            @auth
            <li class="nav__item nav__item--account">

                <div class="nav__user-avatar-name">
                    @if (!Auth::user()->avatar)
                    <div class="user-avatar">{{ Str::of(Auth::user()->name)->ucfirst()->charAt(0) }}</div>
                    @else
                    <div class="user-avatar">
                        <img src="/storage/{{ Auth::user()->avatar }}" alt="">
                    </div>
                    @endif

                    <div class="user-name">{{ Str::of(Auth::user()->name)->ucfirst()->limit(15) }}</div>
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
                <a class="nav__btn nav__btn--register" href="{{ route('user.register') }}">Присоединиться</a>
                <a class="nav__btn nav__btn--login" href="{{ route('user.login') }}">Вход</a>
            </li>
            @endguest

        </ul>
    </div>
</nav>
