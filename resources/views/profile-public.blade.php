@extends('layouts.app')

@section('head')  
    @include('blocks.head', ['title' => 'Профиль'])
@endsection

@section('page-content')
    <div class="page__wrapper profile">
        @include('blocks.nav')

        <div class="container container--lg">

            <h1 class="profile__title">Профиль пользователя<br><span class="info-color">{{ $publicUser->name}}</span></h1> 

            <div class="profile__info">
                @if ($publicUser->avatar)
                    <div class="profile__avatar">
                        <img src="/storage/{{ $publicUser->avatar }}" alt="">
                    </div>
                @endif

                <div class="info">
                    <div class="mbe-1"><b class="info-color">Имя:<br></b>{{ $publicUser->name }}</div>
                    <div class="mbe-1"><b class="info-color">Дата регистрации:<br></b>{{ $publicUser->created_at->diffForHumans() }}</div>
                    @if ($publicUser->bio)
                    <div class="mbe-1"><b class="info-color">О себе:<br></b>{{ $publicUser->bio }}</div>
                    @endif
                </div>
            </div>

        </div>

        @include('blocks.footer')
    </div>
@endsection
