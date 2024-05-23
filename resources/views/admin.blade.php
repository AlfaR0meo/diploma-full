@extends('layouts.app')

@section('head')  
    @include('blocks.head', ['title' => 'Админ Тест'])
@endsection

@section('page-content')
    <div class="page__wrapper">
        @include('blocks.nav')

        <div class="container container--lg">

            <h1>Админ</h1>

            <div class="block block--info">Тестовый вывод БД пользователей сайта</div>
            @if (!$users->count())
                <div class="block block--empty wfc">Список пользователей пуст.</div>
            @else
                <ul class="list mbs-1">
                    <li>{{ Str::of('id')->padRight(4) }} | {{ Str::of('email')->padRight(35) }} | {{ Str::of('name')->padRight(30) }} | {{ Str::of('avatar')->padRight(40) }} | {{ Str::of('bio') }}</li>
                    @foreach ($users as $user)
                        <li>{{ $user->id }} | {{ Str::of($user->email)->padRight(35) }} | {{ Str::of($user->name)->padRight(30) }} | {{ Str::of($user->avatar)->padRight(40) }} | {{ $user->bio }}</li>
                    @endforeach
                </ul>
            @endif

        </div>
    </div>
@endsection
