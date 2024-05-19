@extends('layouts.app')

@section('head')  
    @include('blocks.head', ['title' => 'Полезные материалы'])
@endsection

@section('page-content')
    <div class="page__wrapper">
        @include('blocks.nav')

        <div class="container container--lg">

            <h1>Полезные материалы, статьи</h1>

        </div>
    </div>
@endsection
