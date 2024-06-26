@use('App\Models\User')

@extends('layouts.app')

@section('head')  
    @include('blocks.head', ['title' => 'Экоидея от пользователя'])
@endsection

@section('page-content')
    <div class="page__wrapper">
        @include('blocks.nav')

        <div class="container container--lg">

            <div class="profile__intro">
                <h1 class="profile__title profile__title--public">
                    <span class="accent-color">Эко</span>идея<br> 
                    от пользователя
                    <a class="profile__title-username" href="{{ route('user.profile-public.show', ['user_id' => $ecoidea->user_id]) }}">{{ User::find($ecoidea->user_id)->name }}</a>
                </h1> 
            </div>

            <div class="profile__group profile__group--public">
                <div class="info">
                    <div>
                        <b>Название: </b><br>
                        {{ $ecoidea->title }}
                    </div>
                    <div>
                        <b>Описание: </b><br>
                        {{ $ecoidea->content }}
                    </div>
                </div>
            </div>

        </div>

        @include('blocks.footer')
    </div>
@endsection
