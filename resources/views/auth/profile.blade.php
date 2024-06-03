@extends('layouts.app')

@section('head')  
    @include('blocks.head', ['title' => 'Профиль'])
    @vite(['resources/js/profile.js'])
@endsection

@section('page-content')
    <div class="page__wrapper profile">
        @include('blocks.nav')

        <div class="container container--lg">

            <h1 class="profile__title">Личный кабинет</h1> 

            <div class="grid">
                {{-- Информация об аккаунте --}}
                <div class="profile__group">
                    <h2>Информация об аккаунте</h2>

                    @if (Auth::user()->avatar)
                        <div class="avatar">
                            <img src="/storage/{{ Auth::user()->avatar }}" alt="">
                        </div>
                    @endif

                    <div class="info">
                        <div><b>Имя: </b>{{ Auth::user()->name }}</div>
                        <div><b>Email: </b>{{ Auth::user()->email }}</div>
                        <div><b>Дата регистрации: </b>{{ Auth::user()->created_at->format('d.m.Y') }}</div>

                        @if (Auth::user()->bio)
                            <div><b>О себе: </b>{{ Auth::user()->bio }}</div>
                        @endif
                    </div>
                </div>

                {{-- Аватарка --}}
                <div class="profile__group">
                    <h2>Фото профиля</h2>

                    <form action="{{ route('user.profile.avatar.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <input type="file" name="avatar" id="avatar" accept="image/*" required>
                        @error('avatar')
                        <div class="block block--error m-0">{{ $message }}</div>
                        @enderror
                    </form>

                    @if (Auth::user()->avatar)
                        <form action="{{ route('user.profile.avatar.delete') }}" method="POST">
                            @csrf
                            <button class="delete mbs-05" type="submit">Удалить аватарку</button>
                        </form>
                    @endif
                </div>

                {{-- О себе --}}
                <div class="profile__group">
                    <h2>О себе</h2>

                    <form class="add-bio-form" action="{{ route('user.profile.bio.add') }}" method="POST">
                        @csrf

                        <textarea name="bio" maxlength="200" required placeholder="Расскажите другим немного о себе">{{ Auth::user()->bio ?? old('bio') }}</textarea>
                        @error('bio')
                        <div class="block block--error m-0">{{ $message }}</div>
                        @enderror
                    </form>

                    @if (Auth::user()->bio)
                        <form class="delete-bio-form" action="{{ route('user.profile.bio.delete') }}" method="POST">
                            @csrf
                        </form>
                    @endif

                    <div class="forms-btns flex fww gap-05 mbs-05">
                        <button class="add-bio-btn" type="button">Сохранить</button>

                        @if (Auth::user()->bio)
                            <button class="delete-bio-btn delete" type="button">Удалить о себе</button>
                        @endif
                    </div>
                </div>

                {{-- Удалить аккаунт --}}
                <div class="profile__group">
                    <h2>Удалить аккаунт</h2>

                    <form action="{{ route('user.profile.delete') }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="delete" type="submit">Удалить аккаунт</button>
                    </form>
                </div>
            </div>

        </div>

        @include('blocks.footer')
    </div>
@endsection
