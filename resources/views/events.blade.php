@extends('layouts.app')

@section('head')  
    @include('blocks.head', ['title' => 'Мероприятия'])
@endsection

@section('page-content')
    <div class="page__wrapper events">
        @include('blocks.nav')

        <div class="container container--lg">

            <h1 class="events__title">Анонсы мероприятий</h1>

        </div>
    </div>
@endsection