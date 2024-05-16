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
                The user <b>{{ Auth::User()->name }}</b> <b>{{ Auth::User()->email }}</b> is <span class="accent-color">authenticated</span>
            @endauth

            @guest
                The user is not authenticated...
            @endguest

        </div>
    </div>
</body>

</html>