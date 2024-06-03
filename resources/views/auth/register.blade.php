@extends('layouts.app')

@section('head')  
    @include('blocks.head', ['title' => 'Регистрация аккаунта'])
    @vite(['resources/js/auth.js'])
@endsection

@section('page-content')
    <div class="page__wrapper register">

        <div class="register__wrapper">
            @include('auth.blocks.link-back-to-main')
            
            <div><div class="register__title">Регистрация аккаунта</div></div>

            <form class="register__form" action="{{ route('user.register') }}" method="POST" novalidate>
                @csrf

                <fieldset>
                    <label for="input-name">Имя</label>
                    <input name="name" type="text" id="input-name" value="{{ old('name') }}" autofocus required>

                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </fieldset>

                <fieldset>
                    <label for="input-email">Email</label>
                    <input name="email" type="email" id="input-email" value="{{ old('email') }}" required>

                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </fieldset>

                <fieldset>
                    <label for="input-password">Пароль</label>
                    <input name="password" type="password" id="input-password" required>

                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </fieldset>

                <fieldset>
                    <label for="input-password-confirmation">Подтвердите пароль</label>
                    <input name="password_confirmation" type="password" id="input-password-confirmation" required>

                    @error('password_confirmation')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </fieldset>
                
                <button type="submit">Зарегистрироваться</button>
            </form>

            <div class="login__have-account">Уже есть аккаунт? <a href="{{ route('user.login') }}">Войти</a></div>
        </div>
        
    </div>
@endsection
