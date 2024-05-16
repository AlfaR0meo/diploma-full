<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('blocks.head', ['title' => 'Войти'])
</head>

<body class="page">
    <div class="page__wrapper login">

        <div class="login__wrapper">
            <div class="login__title">Войти</div>

            <form class="login__form" action="{{ route('user.login') }}" method="POST" novalidate>
                @csrf
                <fieldset>
                    <label for="input-email">Email</label>
                    <input type="email" name="email" id="input-email" value="{{ old('email') }}" autofocus>
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
                <button type="submit">Войти</button>
                @error('smth')
                    <div class="error">{{ $message }}</div>
                @enderror
            </form>

            <div class="login__have-account">Нет аккаунта? <a href="{{ route('user.register') }}">Присоединиться</a></div>
        </div>

    </div>
</body>

</html>