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

            <ul class="test mb-1">
                @foreach ($users as $user)
                <li>{{ $user->email }}</li>
                @endforeach
            </ul>

            <div class="mb-1">
                <div>{{ fake()->address() }}</div>
                <div>{{ fake()->name() }}</div>
                <div>{{ fake()->country() }}</div>
            </div>

        </div>
    </div>
@endsection
