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

                    @if (Auth::user()->avatar !== null)
                    <div class="profile__avatar">
                        <img src="/storage/{{ Auth::user()->avatar }}" alt="">
                    </div>

                    <form class="profile__delete-avatar-form" action="{{ route('user.profile.avatar.delete') }}" method="POST">
                        @csrf
                        <button class="profile__btn-delete-avatar" type="submit">Удалить аватар</button>
                    </form>
                    @endif

                    <div><b class="action-color">Имя: </b>{{ Auth::user()->name }}</div>
                    <div><b class="action-color">Email: </b>{{ Auth::user()->email }}</div>
                    <div><b class="action-color">Дата регистрации: </b>{{ Auth::user()->created_at->format('d.m.Y') }} </div>
                </div>
            </div>

            <div class="profile__group">
                <h2>Аватар</h2>

                <form class="profile__upload-avatar-form" action="{{ route('user.profile.avatar.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <input type="file" name="avatar" id="avatar" accept="image/*">
                    @error('avatar')
                    <div class="error">{{ $message }}</div>
                    @enderror

                    <button class="profile__btn-upload-avatar" type="submit">Загрузить</button>
                </form>
            </div>

            <div class="profile__group">
                <h2>Удалить аккаунт</h2>

                <form class="profile__delete-profile-form" action="{{ route('user.profile.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="profile__btn-delete-profile" type="submit">Удалить аккаунт</button>
                </form>
            </div>

        </div>
    </div>
@endsection
