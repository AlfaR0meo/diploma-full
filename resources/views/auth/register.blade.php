<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('blocks.head', ['title' => 'Регистрация аккаунта'])
</head>

<body class="page">
    <div class="page__wrapper register">


        <div class="register__wrapper">
            @include('auth.blocks.link-back-to-main')
            <div><div class="register__title">Регистрация аккаунта</div></div>

            <form class="register__form" action="{{ route('user.register') }}" method="POST" novalidate>
                @csrf

                <fieldset>
                    <label for="input-name">Имя</label>
                    <input type="text" name="name" id="input-name" value="{{ old('name') }}" autofocus>
                </fieldset>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror

                <fieldset>
                    <label for="input-email">Email</label>
                    <input type="email" name="email" id="input-email" value="{{ old('email') }}">
                </fieldset>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror

                <fieldset>
                    <label for="input-password">Пароль</label>
                    <input type="password" name="password" id="input-password">
                </fieldset>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror

                <fieldset>
                    <label for="input-password-confirmation">Подтвердите пароль</label>
                    <input type="password" name="password_confirmation" id="input-password-confirmation">
                </fieldset>
                @error('password_confirmation')
                    <div class="error">{{ $message }}</div>
                @enderror
                
                <button type="submit">Зарегистрироваться</button>
            </form>

            <div class="login__have-account">Есть аккаунт? <a href="{{ route('user.login') }}">Войти</a></div>
        </div>

    </div>
</body>

</html>