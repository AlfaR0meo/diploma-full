<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('blocks.head', ['title' => 'Форум'])
</head>

<body>
    <div class="page-wrapper">
        @include('blocks.nav')

        <div class="container container--lg">

            <h1>Forum test</h1>

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