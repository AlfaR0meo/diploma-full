<!-- Кодировка страницы -->
<meta charset="UTF-8">
<!-- Заголовок страницы в браузере -->
<title>{{ $title }}</title>
<!-- Адаптив -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<!-- Иконка сайта во вкладке браузера -->
<link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
<!-- Подключение стилей -->
@vite(['resources/scss/index.scss'])
<!-- Подключение скриптов -->
@vite(['resources/js/index.js'])
<!-- Цвет окружающего UI в некоторых моб. браузерах -->
<meta name="theme-color" content="#1ec31d">
<meta name="google" content="notranslate">