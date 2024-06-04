@use('App\Models\User')

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
            @if (isset($ecoideas))
                @if (!count($ecoideas))
                    <div class="block block--empty">
                        Экоидей пока нет.
                    </div>
                @else
                    <div class="ecoideas__wrap">
                        @foreach ($ecoideas as $ecoidea)
                            <div class="ecoidea">
                                <a class="ecoidea__title" href="{{ route('ecoideas.ecoidea-show', ['ecoidea_id' => $ecoidea->id]) }}">{{ $ecoidea->title }}</a>
                                <div class="ecoidea__content">{{ $ecoidea->content }}</div>

                                <div class="ecoidea__footer">
                                    <a class="ecoidea__author" href="{{ route('user.profile-public.show', ['user_id' => $ecoidea->user_id]) }}">
                                        @if (!User::find($ecoidea->user_id)->avatar)
                                            <div class="ecoidea__author-avatar">
                                                {{ Str::of(User::find($ecoidea->user_id)->name)->ucfirst()->charAt(0) }}
                                            </div>
                                        @else
                                            <div class="ecoidea__author-avatar">
                                                <img src="/storage/{{ User::find($ecoidea->user_id)->avatar }}" alt="">
                                            </div>
                                        @endif
                                        
                                        <span class="ecoidea__author-name">{{ User::find($ecoidea->user_id)->name }}</span>
                                    </a>
                                    {{-- <time class="ecoidea__published-at" datetime="{{ $ecoidea->published_at->format('Y-m-d') }}">{{ $ecoidea->published_at->translatedFormat('d F, Y') }}</time> --}}
                                    <time class="ecoidea__published-at" datetime="{{ $ecoidea->published_at->format('Y-m-d') }}" title="{{ $ecoidea->published_at->translatedFormat('d F, Y') }}">{{ $ecoidea->published_at->diffForHumans() }}</time>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endif

            <h2>Создать свою <span class="accent-color">эко</span>идею</h2>

            @auth
                <form class="ecoideas__form-create" action="{{ route('ecoideas') }}" method="POST" novalidate>
                    @csrf

                    <fieldset>
                        <label for="ecoidea-title">Название экоидеи</label>
                        <input name="title" type="text" id="ecoidea-title" required maxlength="100" value="{{ fake()->text(100) }}">
                        
                        @error('title')
                            <div class="block block--error m-0">{{ $message }}</div>
                        @enderror
                    </fieldset>

                    <fieldset>
                        <label for="ecoidea-content">Описание</label>
                        <textarea name="content" id="ecoidea-content" required maxlength="500">{{ fake()->text(500) }}</textarea>
                        
                        @error('content')
                            <div class="block block--error m-0">{{ $message }}</div>
                        @enderror
                    </fieldset>

                    <button type="submit">Опубликовать</button>
                </form>
            @endauth

            @guest
                <div class="ecoideas__need-auth">
                    Создавать свои экоидеи могут только зарегистрированные пользователи!
                    <div class="flex flex-equal jcc gap-1 fww mbs-1">
                        <a class="ecoideas__auth-btn" href="{{ route('user.register') }}">Присоединиться</a>
                        <a class="ecoideas__auth-btn" href="{{ route('user.login') }}">Войти</a>
                    </div>
                </div>
            @endguest

        </div>

        @include('blocks.footer')
    </div>
@endsection
