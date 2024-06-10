@use('App\Models\Ecoidea')
@php
    $userEcoideasCount = Ecoidea::where('user_id', $publicUser->id)->count();
@endphp

@extends('layouts.app')

@section('head')  
    @include('blocks.head', ['title' => 'Профиль пользователя'])
@endsection

@section('page-content')
    <div class="page__wrapper profile">
        @include('blocks.nav')

        <div class="container container--lg">

            <div class="profile__intro">
                <h1 class="profile__title profile__title--public">Профиль пользователя<br><span class="info-color">{{ $publicUser->name}}</span></h1> 
            </div>

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
                            <b>О себе: </b>
                            <br>
                            {{ $publicUser->bio }}
                        </div>
                    @endif

                    <div>
                        <b>Количество созданных экоидей: </b>
                        <br>
                        {{ Ecoidea::where('user_id', $publicUser->id)->count() }}
                    </div>

                    <div>
                        <b>Экостатус: </b>
                        <br>
                        <div class="mbs-05">
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
                    </div>
                    
                </div>
            </div>

        </div>

        @include('blocks.footer')
    </div>
@endsection
