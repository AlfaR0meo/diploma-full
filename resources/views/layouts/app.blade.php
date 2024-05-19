<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('head')
</head>

<body class="page">
    @yield('page-content')
</body>

</html>