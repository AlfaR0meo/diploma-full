@extends('layouts.app')

@section('head')  
    @include('blocks.head', ['title' => 'СевЭко'])
@endsection

@section('page-content')
    <div class="page__wrapper home">
        @include('blocks.nav')

        <div class="container container--lg">

            <div class="home__intro">
                <h1 class="home__title">Веб-сервис <span class="accent-color">эко</span>сообщества города Севастополя</h1>
            </div>

        </div>
    </div>
@endsection
