<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('blocks.head', ['title' => 'СевЭко Главная Диплом'])
</head>

<body>
    <div class="page-wrapper home">

        @include('blocks.nav')

        <div class="container container--lg">

            <div class="home__intro">
                <h1 class="home__title">Веб-сервис экосообщества города Севастополя</h1>
            </div>

            <img src="{{ asset('img/sevastopol-icon-2.svg') }}" alt="">

            <ul class="home__list">
                <li>Сайт экосообщества города Севастополя</li>
                <li>Форум, темы, заявки, комментарии</li>
                <li>Личный кабинет (регистрация), войти (аутентификация и авторизация)</li>
                <li>Личный кабинет, информация в личном кабинете, изменение информации аккаунта / удаление аккаунта</li>
            </ul>

        </div>

    </div>

</body>

</html>
