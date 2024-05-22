@extends('layouts.app')

@section('head')  
    @include('blocks.head', ['title' => 'СевЭко'])
@endsection

@section('page-content')
    <div class="page__wrapper home">
        @include('blocks.nav')

        <div class="container container--lg">

            <div class="home__intro">
                <h1 class="home__title">Веб-сервис экосообщества города Севастополя</h1>
            </div>
            
            @if (!$users->count())
                <div class="block block--empty">Список пользователей пуст.</div>
            @else
                <ul class="list mbs-1">
                    @foreach ($users as $user)
                        <li>{{ $user->id }} | {{ $user->email }} | {{ $user->name }} | {{ $user->avatar }}</li>
                    @endforeach
                </ul>
            @endif

        </div>
    </div>
@endsection
