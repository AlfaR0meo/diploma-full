<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('blocks.head', ['title' => 'СевЭко Главная Диплом'])
</head>

<body class="page">
    <div class="page__wrapper home">

        @include('blocks.nav')

        <div class="container container--lg">

            <div class="home__intro">
                <h1 class="home__title">Веб-сервис экосообщества города Севастополя</h1>
            </div>

            @auth
                The user is authenticated...
            @endauth

            @guest
                The user is not authenticated...
            @endguest
            
        </div>

    </div>

</body>

</html>