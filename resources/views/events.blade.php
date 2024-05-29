@extends('layouts.app')

@section('head')  
    @include('blocks.head', ['title' => 'Мероприятия'])
@endsection

@section('page-content')
    <div class="page__wrapper events">
        @include('blocks.nav')

        <div class="container container--lg">

            <h1>Анонсы <span class="accent-color">эко</span>мероприятий</h1>

        </div>

        @include('blocks.footer')
    </div>
@endsection
