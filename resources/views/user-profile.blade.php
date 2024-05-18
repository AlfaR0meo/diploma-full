<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('blocks.head', ['title' => 'Профиль'])
</head>

<body class="page">
    <div class="page__wrapper forum">
        @include('blocks.nav')

        <div class="container container--lg">

            <h1 class="forum__title">Профиль</h1>

            @auth
                <div>Имя: <b>{{ Auth::User()->name }}</b></div>
                <div>Email: <b>{{ Auth::User()->email }}</b></div>
                <div>Дата регистрации: <b>{{ Auth::User()->created_at }}</b></div>
                <div>Пароль (хешированный): <b>{{ Auth::User()->password }}</b></div>
            @endauth

            @guest
                The user is not authenticated...
            @endguest

        </div>
    </div>
</body>

</html>