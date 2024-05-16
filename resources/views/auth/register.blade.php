<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('blocks.head', ['title' => 'Присоединиться'])
</head>

<body class="page">
    <div class="page__wrapper register">

        <div class="register__wrapper">
            <div class="register__title">Присоединиться</div>

            {{-- <div class="info info--success">
                <ul>
                    @foreach ( as )
                        
                    @endforeach
                </ul>
            </div> --}}

            <form class="register__form" action="{{ route('user.register') }}" method="POST" novalidate>
                @csrf
                <fieldset>
                    <label for="input-name">Имя</label>
                    <input type="text" name="name" id="input-name" required>
                </fieldset>
                <fieldset>
                    <label for="input-email">Email</label>
                    <input type="email" name="email" id="input-email">
                </fieldset>
                <fieldset>
                    <label for="input-password">Пароль</label>
                    <input type="password" name="password" id="input-password">
                </fieldset>
                <fieldset>
                    <label for="input-password-confirmation">Подтвердите пароль</label>
                    <input type="password" name="password_confirmation" id="input-password-confirmation">
                </fieldset>
                <button type="submit">Зарегистрироваться</button>
            </form>

            <div class="login__have-account">Есть аккаунт? <a href="{{ route('user.login') }}">Войти</a></div>
        </div>

    </div>
</body>

</html>