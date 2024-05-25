@extends('layouts.app')

@section('head')  
    @include('blocks.head', ['title' => 'Вход в аккаунт'])
    @vite(['resources/js/auth.js'])
@endsection

@section('page-content')
    <div class="page__wrapper login">
        <div class="login__wrapper">
            @include('auth.blocks.link-back-to-main')
            
            <div><div class="login__title">Вход в аккаунт</div></div>

            <form class="login__form" action="{{ route('user.login') }}" method="POST" novalidate>
                @csrf

                <fieldset>
                    <label for="input-email">Email</label>
                    <input name="email" type="email" id="input-email" value="{{ old('email') }}" autofocus required>

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
                
                <button type="submit">Войти</button>
                @error('login-error')
                    <div class="error mb-0">{{ $message }}</div>
                @enderror
            </form>

            <div class="login__have-account">Нет аккаунта? <a href="{{ route('user.register') }}">Присоединиться</a></div>
        </div>
    </div>
@endsection
