<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('blocks.head', ['title' => 'Войти'])
</head>

<body class="page">
    <div class="page__wrapper login">

        <div class="login__wrapper">
            <div class="login__title">Войти</div>

            @if (Session::has('login-error'))
                <div class="info info--error">{{ Session::get('login-error') }}</div>
            @endif

            <form class="login__form" action="{{ route('login') }}" method="post">
                @csrf
                <fieldset>
                    <label for="input-email">Email</label>
                    <input type="email" name="email" id="input-email" required>
                </fieldset>
                <fieldset>
                    <label for="input-password">Пароль</label>
                    <input type="password" name="password" id="input-password" required>
                </fieldset>
                <button type="submit">Войти</button>
            </form>
        </div>

    </div>
</body>

</html>