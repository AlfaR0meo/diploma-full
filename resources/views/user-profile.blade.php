@extends('layouts.app')

@section('head')  
    @include('blocks.head', ['title' => 'Профиль'])
@endsection

@section('page-content')
    <div class="page__wrapper profile">
        @include('blocks.nav')

        <div class="container container--lg">

            <h1 class="profile__title">Профиль</h1> 

            <div><b>Имя: </b>{{ Auth::User()->name }}</div>
            <div><b>Email: </b>{{ Auth::User()->email }}</div>
            <div><b>Дата регистрации: </b>{{ Auth::User()->created_at }}</div>
            <div><b>Пароль (хешированный): </b>{{ Auth::User()->password }}</div>

        </div>
    </div>
@endsection
