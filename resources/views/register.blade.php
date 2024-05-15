<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('blocks.head', ['title' => 'Присоединиться'])
</head>

<body class="page">
    <div class="page__wrapper register">

        <div class="register__wrapper">
            <div class="register__title">Присоединиться</div>
            <form class="register__form" action="{{ route('register') }}" method="post">
                @csrf
                <fieldset>
                    <label for="input-name">Имя</label>
                    <input type="text" name="name" id="input-name" required>
                </fieldset>
                <fieldset>
                    <label for="input-email">Email</label>
                    <input type="email" name="email" id="input-email" required>
                </fieldset>
                <fieldset>
                    <label for="input-password">Пароль</label>
                    <input type="password" name="password" id="input-password" required>
                </fieldset>
                <fieldset>
                    <label for="input-password-confirmation">Подтвердите пароль</label>
                    <input type="password" name="password_confirmation" id="input-password-confirmation" required>
                </fieldset>
                <button type="submit">Зарегистрироваться</button>
            </form>
        </div>

    </div>
</body>

</html>