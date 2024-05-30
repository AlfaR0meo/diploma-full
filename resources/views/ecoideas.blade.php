@extends('layouts.app')

@section('head')  
    @include('blocks.head', ['title' => 'Мероприятия'])
@endsection

@section('page-content')
    <div class="page__wrapper ecoideas">
        @include('blocks.nav')

        <div class="container container--lg">

            <h1><span class="accent-color">Эко</span>идеи</h1>

            {{-- Здесь выводится список экоидей для всех пользователей --}}
            @if (isset($ecoIdeas))
                @if (!count($ecoIdeas))
                    <div class="block block--empty">
                        Экоидей пока нет.
                    </div>
                @else
                    <div class="ecoideas__wrap">
                        @foreach ($ecoIdeas as $idea)
                            <div class="ecoideas__ecoidea ecoidea">
                                <div class="ecoidea__title">{{ $idea->title }}</div>
                                <div class="ecoidea__content">{{ $idea->content }}</div>

                                <div class="flex fww gap-1">
                                    <a class="ecoidea__author" href="/profile/{{ $idea->user_id }}">Автор: {{ $idea->user_id }}</a>
                                    <time class="ecoidea__published-at" datetime="{{ $idea->published_at->format('Y-m-d') }}">Опубликовано {{ $idea->published_at->diffForHumans() }}</time>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endif

            <h2>Создать свою <span class="accent-color">эко</span>идею</h2>

            @auth
                <form class="ecoideas__form-create" action="{{ route('ecoideas') }}" method="POST">
                    @csrf

                    <fieldset>
                        <label for="ecoidea-title">Название экоидеи</label>
                        <input name="title" type="text" id="ecoidea-title" required maxlength="50">
                    </fieldset>

                    <fieldset>
                        <label for="ecoidea-content">Описание</label>
                        <textarea name="content"id="ecoidea-content" required maxlength="255">{{ fake()->text() }}</textarea>
                    </fieldset>

                    @if (Session::has('ecoidea_success'))
                        <div class="block block--success m-0">
                            {{ Session::get('ecoidea_success') }}
                        </div>
                    @endif

                    <button type="submit">Опубликовать</button>
                </form>
            @endauth

            @guest
                <div class="ecoideas__need-auth">
                    Создавать свои экоидеи могут только зарегистрированные пользователи!
                    <div class="flex flex-equal justify-center gap-1 fww mbs-1">
                        <a class="ecoideas__auth-btn" href="{{ route('user.register') }}">Присоединиться</a>
                        <a class="ecoideas__auth-btn" href="{{ route('user.login') }}">Войти</a>
                    </div>
                </div>
            @endguest

        </div>

        @include('blocks.footer')
    </div>
@endsection
