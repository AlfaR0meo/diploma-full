@extends('layouts.app')

@section('head')  
    @include('blocks.head', ['title' => 'Профиль'])
@endsection

@section('page-content')
    <div class="page__wrapper profile">
        @include('blocks.nav')

        <div class="container container--lg">

            <h1 class="profile__title">Профиль</h1> 

            <div class="profile__info">
                <div><b>Имя: </b>{{ Auth::User()->name }}</div>
                <div><b>Email: </b>{{ Auth::User()->email }}</div>
                <div><b>Дата регистрации: </b>{{ Auth::User()->created_at->format('d.m.Y') }}</div>
            </div>

            <form action="{{ route('user.profile.delete') }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="profile__btn-delete-user" type="submit">Удалить аккаунт</button>
            </form>

        </div>
    </div>
@endsection
