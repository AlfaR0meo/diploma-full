@use('App\Models\Ecoidea')
@php
    $userEcoideasCount = Ecoidea::where('user_id', Auth::user()->id)->count();
@endphp

@extends('layouts.app')

@section('head')  
    @include('blocks.head', ['title' => 'Профиль'])
    @vite(['resources/js/profile.js'])
@endsection

@section('page-content')
    <div class="page__wrapper profile">
        @include('blocks.nav')

        <div class="container container--lg">

            <div class="profile__intro">        
                <h1 class="profile__title">Личный кабинет</h1> 
            </div>

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

                {{-- Удалить аккаунт --}}
                <div class="profile__group">
                    <h2>Удалить аккаунт</h2>

                    <form class="delete-account-form" action="{{ route('user.profile.delete') }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="delete-account-btn delete" type="submit">Удалить аккаунт</button>
                    </form>
                </div>

                {{-- Экостатус аккаунта --}}
                <div class="profile__group">
                    <h2>
                        Экостатус аккаунта (уровень

                        @if ($userEcoideasCount === 0)
                            1
                        @elseif ($userEcoideasCount > 0 && $userEcoideasCount < 5)
                            2
                        @elseif ($userEcoideasCount >= 5 && $userEcoideasCount < 10)
                            3
                        @elseif ($userEcoideasCount >= 10 && $userEcoideasCount < 20)
                            4
                        @elseif ($userEcoideasCount >= 20)
                            5
                        @endif

                        из 5)
                    </h2>

                    <div>Количество созданных экоидей: <b>{{ $userEcoideasCount }}</b></div>

                    <div class="mbs-1">
                        @if ($userEcoideasCount === 0)
                            <div class="user-ecostatus-name user-ecostatus-name--1">ЭкоПользователь</div>
                        @elseif ($userEcoideasCount > 0 && $userEcoideasCount < 5)
                            <div class="user-ecostatus-name user-ecostatus-name--2">ЭкоНовичок</div>
                        @elseif ($userEcoideasCount >= 5 && $userEcoideasCount < 10)
                            <div class="user-ecostatus-name user-ecostatus-name--3">ЭкоАктивист</div>
                        @elseif ($userEcoideasCount >= 10 && $userEcoideasCount < 20)
                            <div class="user-ecostatus-name user-ecostatus-name--4">ЭкоЛидер</div>
                        @elseif ($userEcoideasCount >= 20)
                            <div class="user-ecostatus-name user-ecostatus-name--5">ЭкоМастер</div>
                        @endif
                    </div>

                    <div style="margin-top: 10em" none>
                        <div style="margin-bottom: 1em">Все экостатусы (demo):</div>
                        <div class="mbe-1 user-ecostatus-name user-ecostatus-name--1">ЭкоПользователь</div>
                        <div class="mbe-1 user-ecostatus-name user-ecostatus-name--2">ЭкоНовичок</div>
                        <div class="mbe-1 user-ecostatus-name user-ecostatus-name--3">ЭкоАктивист</div>
                        <div class="mbe-1 user-ecostatus-name user-ecostatus-name--4">ЭкоЛидер</div>
                        <div class="user-ecostatus-name user-ecostatus-name--5">ЭкоМастер</div>
                    </div>
                </div>
            </div>

        </div>

        @include('blocks.footer')
    </div>
@endsection
