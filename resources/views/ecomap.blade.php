@extends('layouts.app')

@section('head')  
    @include('blocks.head', ['title' => 'Экокарта'])

    @vite(['resources/js/ecomap/ecomap.js'])

    <style>
        .leaflet-touch .leaflet-control-layers,
        .leaflet-touch .leaflet-bar {
            border: none !important;
        }

        .leaflet-control-layers-expanded {
            font-size: var(--fs-300) !important;
            padding: 0.5em 0.7em 0.5em 0.5em !important;
        }

        .leaflet-control-layers-base>label {
            padding: 0.3em 0.5em;
            font-weight: 600;
            color: var(--clr-text);
            cursor: pointer;
        }

        .leaflet-control-layers-base>label>span {
            display: flex;
            align-items: center;
            gap: 0.5em;
        }

        .leaflet-control-layers-base>label>span>input[type=radio] {
            accent-color: forestgreen;
            cursor: pointer;
        }

        .leaflet-control-layers-separator {
            display: none !important;
        }

        .leaflet-control-layers-overlays {
            display: none !important;
        }

        .leaflet-control-attribution {
            margin: 10px !important;
            padding: .35em !important;
            font-family: var(--ff-logo) !important;
            font-size: var(--fs-300);
            line-height: 1 !important;
            border-radius: .3em;
        }

        .leaflet-tooltip {
            width: max-content !important;
            padding: 1em !important;
            background-color: white !important;
            border: none !important;
            border-radius: .25em !important;
            font-size: var(--fs-300) !important;
            color: var(--clr-text) !important;
            white-space: normal !important;
            box-shadow: 0 0 1em hsl(0 0% 30% / .1) !important;
        }

        .leaflet-popup-content {
            font-size: var(--fs-400) !important;
        }

        .leaflet-popup-close-button {
            font-size: var(--fs-500) !important;
        }

        #map > div.leaflet-control-container > div.leaflet-bottom.leaflet-right > div > a:nth-child(1) > svg {
            display: none !important;
        }

        /* .leaflet-marker-icon.active {
            outline: 5px solid red;
            outline-offset: 5px;
        } */
    </style>
@endsection

@section('page-content')
    <div class="page__wrapper ecomap">
        @include('blocks.nav')

        <div class="container container--lg">
            <div class="ecomap__intro">
                <h1 class="ecomap__title"><span class="accent-color">Эко</span>карта<br>Севастополя</h1>
                <p class="ecomap__description">
                    Экокарта города Севастополя представляет собой инновационный инструмент,
                    предназначенный для удобного доступа к информации о точках раздельного приема отходов и вторсырья в Севастополе.
                    Помочь городу можно простым действием! Не выбрасывать мусор, а отдать его на переработку.
                    А куда — подскажет интерактивная карта.
                </p>
                <img class="ecomap__illustration" src="{{ Vite::asset('resources/img/ecomap-intro-illustration.svg') }}" alt="">
            </div>
        </div>
        
        <div class="ecomap__map-wrap">

            <div class="ecomap__information">

                <div class="filter-layers">
                    <div class="filter-layers__header">
                        <div class="filter-layers__title">Что вы хотите сдать?</div>
                        <button class="filter-layers__clear-button" type="button">Сбросить (<span></span>)</button>
                    </div>
                    
                    <div class="filter-layers__checkbox-buttons">
        
                        <label class="filter-layers__custom-checkbox filter-layers__custom-checkbox--batteries" for="batteries-custom-checkbox" data-category="batteries">
                            <input class="visually-hidden" type="checkbox" id="batteries-custom-checkbox">
                            <svg class="filter-icon">
                                <use href="{{ asset('img/icons/sprite.svg#batteries-filter-icon') }}"></use>
                            </svg>
                            <span title="Батарейки">Батарейки</span>
                        </label>
        
                        <label class="filter-layers__custom-checkbox filter-layers__custom-checkbox--lightbulbs" for="lightbulbs-custom-checkbox" data-category="lightbulbs">
                            <input class="visually-hidden" type="checkbox" id="lightbulbs-custom-checkbox">
                            <svg class="filter-icon">
                                <use href="{{ asset('img/icons/sprite.svg#lightbulbs-filter-icon') }}"></use>
                            </svg>
                            <span>Лампочки</span>
                        </label>
        
                        <label class="filter-layers__custom-checkbox filter-layers__custom-checkbox--paper" for="paper-custom-checkbox" data-category="paper">
                            <input class="visually-hidden" type="checkbox" id="paper-custom-checkbox">
                            <svg class="filter-icon">
                                <use href="{{ asset('img/icons/sprite.svg#paper-filter-icon') }}"></use>
                            </svg>
                            <span>Бумага</span>
                        </label>
        
                        <label class="filter-layers__custom-checkbox filter-layers__custom-checkbox--plastic" for="plastic-custom-checkbox" data-category="plastic">
                            <input class="visually-hidden" type="checkbox" id="plastic-custom-checkbox">
                            <svg class="filter-icon">
                                <use href="{{ asset('img/icons/sprite.svg#plastic-filter-icon') }}"></use>
                            </svg>
                            <span>Пластик</span>
                        </label>
        
                        <label class="filter-layers__custom-checkbox filter-layers__custom-checkbox--glass" for="glass-custom-checkbox" data-category="glass">
                            <input class="visually-hidden" type="checkbox" id="glass-custom-checkbox">
                            <svg class="filter-icon">
                                <use href="{{ asset('img/icons/sprite.svg#glass-filter-icon') }}"></use>
                            </svg>
                            <span>Стекло</span>
                        </label>
        
                        <label class="filter-layers__custom-checkbox filter-layers__custom-checkbox--metal" for="metal-custom-checkbox" data-category="metal">
                            <input class="visually-hidden" type="checkbox" id="metal-custom-checkbox">
                            <svg class="filter-icon">
                                <use href="{{ asset('img/icons/sprite.svg#metal-filter-icon') }}"></use>
                            </svg>
                            <span>Металл</span>
                        </label>
        
                        <label class="filter-layers__custom-checkbox filter-layers__custom-checkbox--technic" for="technic-custom-checkbox" data-category="technic">
                            <input class="visually-hidden" type="checkbox" id="technic-custom-checkbox">
                            <svg class="filter-icon">
                                <use href="{{ asset('img/icons/sprite.svg#technic-filter-icon') }}"></use>
                            </svg>
                            <span>Техника</span>
                        </label>
        
                        <label class="filter-layers__custom-checkbox filter-layers__custom-checkbox--clothes" for="clothes-custom-checkbox" data-category="clothes">
                            <input class="visually-hidden" type="checkbox" id="clothes-custom-checkbox">
                            <svg class="filter-icon">
                                <use href="{{ asset('img/icons/sprite.svg#clothes-filter-icon') }}"></use>
                            </svg>
                            <span>Одежда</span>
                        </label>
        
                    </div>
                </div>

                <div class="points-info">
                    <div class="points-info__title">Найденные пункты</div>

                    <div class="points-info__empty">
                        <img src="{{ Vite::asset('/resources/img/icons/ecomap/points-list-empty.png') }}" alt="">
                        <span>Нет результатов.</span>
                    </div>

                    <div class="points-info__list">
                        {{-- <div class="points-info__item"></div> --}}
                    </div>
                </div>

            </div>

            <div id="map">
                <div class="custom-map-watermark"><span class="accent-color">Эко</span>карта Севастополя</div>
            </div>

        </div>
    
        @include('blocks.footer')
    </div>
@endsection
