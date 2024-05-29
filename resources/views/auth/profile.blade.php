@extends('layouts.app')

@section('head')  
    @include('blocks.head', ['title' => 'Профиль'])
@endsection

@section('page-content')
    <div class="page__wrapper profile">
        @include('blocks.nav')

        <div class="container container--lg">

            <h1 class="profile__title">Профиль</h1> 

            <div class="profile__group">
                <h2>Информация об аккаунте</h2>

                <div class="profile__info">

                    @if (Auth::user()->avatar)
                    <div class="profile__avatar">
                        <img src="/storage/{{ Auth::user()->avatar }}" alt="">
                    </div>

                    <form action="{{ route('user.profile.avatar.delete') }}" method="POST">
                        @csrf
                        <button type="submit">Удалить аватар</button>
                    </form>
                    @endif

                    {{-- TODO: table view --}}
                    <div class="info">
                        <div><b class="accent-color">Имя: </b>{{ Auth::user()->name }}</div>
                        <div><b class="accent-color">Email: </b>{{ Auth::user()->email }}</div>
                        <div><b class="accent-color">Дата регистрации: </b>{{ Auth::user()->created_at->format('d.m.Y') }}</div>
                        
                        @if (Auth::user()->bio)
                        <div><b class="accent-color">О себе: </b>{{ Auth::user()->bio }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="profile__group">
                <h2>Аватар</h2>

                <form action="{{ route('user.profile.avatar.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <input type="file" name="avatar" id="avatar" accept="image/*">
                    @error('avatar')
                    <div class="block block--error">{{ $message }}</div>
                    @enderror

                    <button type="submit">Загрузить</button>
                </form>
            </div>

            <div class="profile__group">
                <h2>О себе</h2>

                <form action="{{ route('user.profile.bio.add') }}" method="POST">
                    @csrf

                    <textarea name="bio" maxlength="200" required>{{ Auth::user()->bio ?? old('bio') }}</textarea>
                    @error('bio')
                    <div class="block block--error">{{ $message }}</div>
                    @enderror

                    <button type="submit">Сохранить</button>
                </form>

                <form action="{{ route('user.profile.bio.delete') }}" method="POST">
                    @csrf
                    <button class="mbs-1" type="submit">Удалить о себе</button>
                </form>
            </div>

            <div class="profile__group">
                <h2>Удалить аккаунт</h2>

                <form action="{{ route('user.profile.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="delete-account" type="submit">Удалить аккаунт</button>
                </form>
            </div>

        </div>
    </div>
@endsection
