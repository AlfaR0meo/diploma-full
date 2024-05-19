@extends('layouts.app')

@section('head')  
    @include('blocks.head', ['title' => 'Вход в аккаунт'])
@endsection

@section('page-content')
    <div class="page__wrapper login">

        <div class="login__wrapper">
            @include('auth.blocks.link-back-to-main')
            
            <div><div class="login__title">Вход в аккаунт</div></div>

            <form class="login__form" action="{{ route('user.login') }}" method="POST">
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
@endsection
