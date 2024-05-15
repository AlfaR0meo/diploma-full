<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('blocks.head', ['title' => 'Форум'])
</head>

<body class="page">
    <div class="page__wrapper forum">
        @include('blocks.nav')

        <div class="container container--lg">

            <h1 class="forum__title">Forum test</h1>

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