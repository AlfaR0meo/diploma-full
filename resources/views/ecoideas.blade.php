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
                @forelse ($ecoIdeas as $idea)
                    <div class="block wfc">{{ $idea }}</div>
                @empty
                    <div class="block block--empty">
                        Экоидей пока нет.
                    </div>
                @endforelse
            @endif

            <h2>Создать свою экоидею</h2>

            @auth
                <form class="ecoideas__form-create" action="{{ route('ecoideas') }}" method="POST">
                    @csrf

                    <fieldset>
                        <label>Выберите пункт:</label>
                        <select name="test" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>

                        @if (Session::has('smth'))
                            <script>
                                console.log('{{Session::get('smth')}}');
                            </script>

                            <div class="block block--info m-0">
                                {{ Session::get('smth') }}
                            </div>
                        @endif
    
                        {{-- @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror --}}
                    </fieldset>

                    <button type="submit">Создать экоидею</button>
                </form>
            @endauth

            @guest
                <div class="block block--info wfc">
                    Создавать экоидеи могут только зарегистрированные пользователи! 
                    <a class="register-ecoidea" href="{{ route('user.register') }}">Присоединиться</a>
                </div>
            @endguest

        </div>

        @include('blocks.footer')
    </div>
@endsection
