@extends('layouts.app')

@section('head')  
    @include('blocks.head', ['title' => 'Профиль'])
@endsection

@section('page-content')
    <div class="page__wrapper profile">
        @include('blocks.nav')

        <div class="container container--lg">

            <h1 class="profile__title profile__title--public">Профиль пользователя<br><span class="info-color">{{ $publicUser->name}}</span></h1> 

            <div class="profile__group profile__group--public">
                @if ($publicUser->avatar)
                    <div class="avatar avatar--public">
                        <img src="/storage/{{ $publicUser->avatar }}" alt="">
                    </div>
                @endif
    
                <div class="info">
                    <div>
                        <b>Дата регистрации: </b>
                        <br>
                        {{ $publicUser->created_at->diffForHumans() }}
                    </div>
                    @if ($publicUser->bio)
                        <div>
                            <b>О себе: <br></b>
                            {{ $publicUser->bio }}
                        </div>
                    @endif
                </div>
            </div>

        </div>

        @include('blocks.footer')
    </div>
@endsection
