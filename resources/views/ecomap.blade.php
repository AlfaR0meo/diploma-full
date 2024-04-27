<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('blocks.head', ['title' => 'Экокарта'])

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <style>
        .leaflet-touch .leaflet-control-layers, 
        .leaflet-touch .leaflet-bar {
            border: none !important;
        }
    </style>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script src="{{ asset('js/map/map.js') }}" type="module"></script>

</head>

<body>
    <div class="page-wrapper ecomap">
        @include('blocks.nav')

        <div class="container container--lg">

            <div class="ecomap__intro">
                <h1 class="ecomap__title"><span class="accent-color">Эко</span>карта<br>Севастополя</h1>
                <p class="ecomap__description">Экокарта города Севастополя представляет собой инновационный    инструмент, предназначенный для удобного доступа к информации о точках приема отходов и вторсырья в городе.<br>
                Помочь городу можно простым действием!
                Не выбрасывать мусор, а отдать его на переработку.
                А куда — подскажет интерактивная карта.
                </p>
                <img class="ecomap__illustration" src="{{ asset('img/ecomap-intro-illustration.svg') }}" alt="">
            </div>

            <div class="ecomap__map">

                <div class="filter-layers">
                    <div class="filter-layers__header">
                        <div class="filter-layers__title">Что вы хотите сдать?</div>
                        <button class="filter-layers__clear-button" type="button">Сбросить (<span></span>)</button>
                    </div>

                    <div class="filter-layers__checkbox-buttons">

                        <label class="filter-layers__custom-checkbox filter-layers__custom-checkbox--batteries" for="batteries-custom-checkbox" >
                            <input class="visually-hidden" type="checkbox" id="batteries-custom-checkbox">
                            <svg class="filter-icon">
                                <use href="{{ asset('img/icons/sprite.svg#batteries-filter-icon') }}"></use>
                            </svg>
                            <span>Батарейки</span>
                        </label>

                        <label class="filter-layers__custom-checkbox filter-layers__custom-checkbox--lightbulbs" for="lightbulbs-custom-checkbox" >
                            <input class="visually-hidden" type="checkbox" id="lightbulbs-custom-checkbox">
                            <svg class="filter-icon">
                                <use href="{{ asset('img/icons/sprite.svg#lightbulbs-filter-icon') }}"></use>
                            </svg>
                            <span>Лампочки</span>
                        </label>

                        <label class="filter-layers__custom-checkbox filter-layers__custom-checkbox--paper" for="paper-custom-checkbox">
                            <input class="visually-hidden" type="checkbox" id="paper-custom-checkbox">
                            <svg class="filter-icon">
                                <use href="{{ asset('img/icons/sprite.svg#paper-filter-icon') }}"></use>
                            </svg>
                            <span>Бумага</span>
                        </label>

                        <label class="filter-layers__custom-checkbox filter-layers__custom-checkbox--plastic" for="plastic-custom-checkbox">
                            <input class="visually-hidden" type="checkbox" id="plastic-custom-checkbox">
                            <svg class="filter-icon">
                                <use href="{{ asset('img/icons/sprite.svg#plastic-filter-icon') }}"></use>
                            </svg>
                            <span>Пластик</span>
                        </label>

                        <label class="filter-layers__custom-checkbox filter-layers__custom-checkbox--glass" for="glass-custom-checkbox">
                            <input class="visually-hidden" type="checkbox" id="glass-custom-checkbox">
                            <svg class="filter-icon">
                                <use href="{{ asset('img/icons/sprite.svg#glass-filter-icon') }}"></use>
                            </svg>
                            <span>Стекло</span>
                        </label>

                        <label class="filter-layers__custom-checkbox filter-layers__custom-checkbox--metal" for="metal-custom-checkbox">
                            <input class="visually-hidden" type="checkbox" id="metal-custom-checkbox">
                            <svg class="filter-icon">
                                <use href="{{ asset('img/icons/sprite.svg#metal-filter-icon') }}"></use>
                            </svg>
                            <span>Металл</span>
                        </label>

                        <label class="filter-layers__custom-checkbox filter-layers__custom-checkbox--technic" for="technic-custom-checkbox">
                            <input class="visually-hidden" type="checkbox" id="technic-custom-checkbox">
                            <svg class="filter-icon">
                                <use href="{{ asset('img/icons/sprite.svg#technic-filter-icon') }}"></use>
                            </svg>
                            <span>Техника</span>
                        </label>

                        <label class="filter-layers__custom-checkbox filter-layers__custom-checkbox--clothes" for="clothes-custom-checkbox">
                            <input class="visually-hidden" type="checkbox" id="clothes-custom-checkbox">
                            <svg class="filter-icon">
                                <use href="{{ asset('img/icons/sprite.svg#clothes-filter-icon') }}"></use>
                            </svg>
                            <span>Одежда</span>
                        </label>

                    </div>

                    <div class="filter-layers__found-points">
                        Найдено <span>0</span> пунктов
                    </div>

                    <!-- <button class="filter-layers__location-btn" type="button">Показать моё местоположение</button> -->
                </div>
                
                <div id="map">
                    <div class="custom-watermark"><span class="accent-color">Эко</span>карта Севастополя</div>
                </div>

            </div>

        </div>
    </div>
</body>

</html>
