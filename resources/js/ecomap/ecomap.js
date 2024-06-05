'use strict';

import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import batteriesGeoJsonPoints from './geojson-points/batteries-points.js';
import lightbulbsGeoJsonPoints from './geojson-points/lightbulbs-points.js';
import paperGeoJsonPoints from './geojson-points/paper-points.js';
import plasticGeoJsonPoints from './geojson-points/plastic-points.js';
import glassGeoJsonPoints from './geojson-points/glass-points.js';
import metalGeoJsonPoints from './geojson-points/metal-points.js';
import technicGeoJsonPoints from './geojson-points/technic-points.js';
import clothesGeoJsonPoints from './geojson-points/clothes-points.js';




function createLeafletCustomIcon(iconFileName) {
    const iconWidth = 40; // in px
    const iconHeight = iconWidth;
    const iconFolderPath = './../../img/icons/ecomap/location-markers/';

    return (
        L.icon({
            iconUrl: `${iconFolderPath}${iconFileName}`,
            iconSize: [iconWidth, iconHeight],
            iconAnchor: [iconWidth / 2, iconWidth],
            popupAnchor: [0, -iconWidth / 2]
        })
    )
}
const batteriesIcon = createLeafletCustomIcon('batteries-location-icon.svg');
const lightbulbsIcon = createLeafletCustomIcon('lightbulbs-location-icon.svg');
const paperIcon = createLeafletCustomIcon('paper-location-icon.svg');
const plasticIcon = createLeafletCustomIcon('plastic-location-icon.svg');
const glassIcon = createLeafletCustomIcon('glass-location-icon.svg');
const metalIcon = createLeafletCustomIcon('metal-location-icon.svg');
const technicIcon = createLeafletCustomIcon('technic-location-icon.svg');
const clothesIcon = createLeafletCustomIcon('clothes-location-icon.svg');




const batteriesMarkers = L.geoJSON(batteriesGeoJsonPoints, {
    pointToLayer: function (geoJsonPoint, latlng) {
        return L.marker(latlng, { icon: batteriesIcon, title: geoJsonPoint.properties.name })
    },
    onEachFeature: function (feature, geoJsonPoint) {
        geoJsonPoint.on('click', function () {
            displayInfoAboutPoint(feature.properties.name, feature.properties.address, feature.properties.description)
        })
        geoJsonPoint.on('mouseover', function (e) {
            this.openPopup();
        })
    }
});
const lightbulbsMarkers = L.geoJSON(lightbulbsGeoJsonPoints, {
    pointToLayer: function (geoJsonPoint, latlng) {
        return L.marker(latlng, { icon: lightbulbsIcon }).bindPopup(geoJsonPoint.geometry.type)
    },
    onEachFeature: function (feature, geoJsonPoint) {
        geoJsonPoint.on('click', function () {
            console.log(feature.geometry.coordinates);
        })
    }
});
const paperMarkers = L.geoJSON(paperGeoJsonPoints, {
    pointToLayer: function (geoJsonPoint, latlng) {
        return L.marker(latlng, { icon: paperIcon }).bindPopup(geoJsonPoint.geometry.type)
    },
    onEachFeature: function (feature, geoJsonPoint) {
        geoJsonPoint.on('click', function () {
            console.log(feature.geometry.coordinates);
        })
    }
});
const plasticMarkers = L.geoJSON(plasticGeoJsonPoints, {
    pointToLayer: function (geoJsonPoint, latlng) {
        return L.marker(latlng, { icon: plasticIcon }).bindPopup(geoJsonPoint.geometry.type)
    },
    onEachFeature: function (feature, geoJsonPoint) {
        geoJsonPoint.on('click', function () {
            console.log(feature.geometry.coordinates);
        })
    }
});
const glassMarkers = L.geoJSON(glassGeoJsonPoints, {
    pointToLayer: function (geoJsonPoint, latlng) {
        return L.marker(latlng, { icon: glassIcon }).bindPopup(geoJsonPoint.geometry.type)
    },
    onEachFeature: function (feature, geoJsonPoint) {
        geoJsonPoint.on('click', function () {
            console.log(feature.geometry.coordinates);
        })
    }
});
const metalMarkers = L.geoJSON(metalGeoJsonPoints, {
    pointToLayer: function (geoJsonPoint, latlng) {
        return L.marker(latlng, { icon: metalIcon }).bindPopup(geoJsonPoint.geometry.type)
    },
    onEachFeature: function (feature, geoJsonPoint) {
        geoJsonPoint.on('click', function () {
            console.log(feature.geometry.coordinates);
        })
    }
});
const technicMarkers = L.geoJSON(technicGeoJsonPoints, {
    pointToLayer: function (geoJsonPoint, latlng) {
        return L.marker(latlng, { icon: technicIcon }).bindPopup(geoJsonPoint.geometry.type)
    },
    onEachFeature: function (feature, geoJsonPoint) {
        geoJsonPoint.on('click', function () {
            console.log(feature.geometry.coordinates);
        })
    }
});
const clothesMarkers = L.geoJSON(clothesGeoJsonPoints, {
    pointToLayer: function (geoJsonPoint, latlng) {
        return L.marker(latlng, { icon: clothesIcon }).bindPopup(geoJsonPoint.geometry.type)
    },
    onEachFeature: function (feature, geoJsonPoint) {
        geoJsonPoint.on('click', function () {
            console.log(feature.geometry.coordinates);
        })
    }
});




// Overlay layers with markers
const batteriesLayer = L.layerGroup([batteriesMarkers]);
const lightbulbsLayer = L.layerGroup([lightbulbsMarkers]);
const paperLayer = L.layerGroup([paperMarkers]);
const plasticLayer = L.layerGroup([plasticMarkers]);
const glassLayer = L.layerGroup([glassMarkers]);
const metalLayer = L.layerGroup([metalMarkers]);
const technicLayer = L.layerGroup([technicMarkers]);
const clothesLayer = L.layerGroup([clothesMarkers]);

const SEVASTOPOL_COORDS = [44.556972, 33.526402];
const INITIAL_MAP_ZOOM = 12;
const MIN_MAP_ZOOM = 10;

// Tile layer – 2ГИС
const TwoGIS = L.tileLayer('http://tile2.maps.2gis.com/tiles?x={x}&y={y}&z={z}', {
    attribution: '&copy; <a href="https://dev.2gis.ru/">2ГИС</a>'
});

// Tile layer – Esri satellite
const EsriWorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
    //attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
    attribution: 'Tiles &copy; Esri'
});

// Map initialization
const map = L.map('map', {
    center: SEVASTOPOL_COORDS,
    zoom: INITIAL_MAP_ZOOM,
    minZoom: MIN_MAP_ZOOM,

    layers: [
        EsriWorldImagery,
        TwoGIS,

        batteriesLayer,
        lightbulbsLayer,
        paperLayer,
        plasticLayer,
        glassLayer,
        metalLayer,
        technicLayer,
        clothesLayer
    ],
    zoomControl: true,

    attributionControl: true, // TODO:

    scrollWheelZoom: false, //TODO: For dev
});

// Layer control adding
const baseMaps = {
    "Спутник ESRI": EsriWorldImagery,
    "Вектор 2ГИС": TwoGIS,
};
const overlayLayers = {
    "Батарейки": batteriesLayer,
    "Лампочки": lightbulbsLayer,
    "Бумага": paperLayer,
    "Пластик": plasticLayer,
    "Стекло": glassLayer,
    "Металл": metalLayer,
    "Техника": technicLayer,
    "Одежда": clothesLayer,
};
L.control.layers(baseMaps, overlayLayers, {
    collapsed: true,
    hideSingleBase: true,
    position: 'topright'
}).addTo(map);




// Custom layers checkboxes
const customLayersCheckboxes = document.querySelectorAll('.filter-layers__custom-checkbox input[type=checkbox]');
let checkedCustomCheckboxesCounter = 0;
const clearFiltersBtn = document.querySelector('.filter-layers__clear-button');
const clearFiltersBtnSpan = clearFiltersBtn.querySelector('span');
clearFiltersBtnSpan.textContent = checkedCustomCheckboxesCounter || '';




// Кнопка очистки фильтров
clearFiltersBtn.addEventListener('click', () => {
    customLayersCheckboxes.forEach(customCheckbox => {
        customCheckbox.checked = false;
    });
    checkedCustomCheckboxesCounter = 0;
    clearFiltersBtnSpan.textContent = checkedCustomCheckboxesCounter || '';

    resetLeafletControls();
    pointsList.querySelectorAll(POINTS_ITEM_SELECTOR).forEach(item => item.remove());
    pointsEmpty.classList.remove('none');
});




// Leaflet layers checkboxes
const leafletLayersCheckboxes = document.querySelectorAll('.leaflet-control-layers-overlays .leaflet-control-layers-selector');
const leafletMarkersPane = document.querySelector('.leaflet-pane .leaflet-marker-pane');

function resetLeafletControls() {
    resetLeafletLayersCheckboxes();
    clearAllLeafletMarkers();
}
function resetLeafletLayersCheckboxes() {
    leafletLayersCheckboxes.forEach(layerCheckbox => {
        layerCheckbox.checked = false;
    });
}
function clearAllLeafletMarkers() {
    leafletMarkersPane.innerHTML = '';
}
resetLeafletControls();




const POINTS_INFO_CLASS = 'points-info';
const POINTS_INFO_SELECTOR = `.${POINTS_INFO_CLASS}`;
const POINTS_EMPTY_CLASS = `${POINTS_INFO_CLASS}__empty`;
const POINTS_EMPTY_SELECTOR = `.${POINTS_EMPTY_CLASS}`;
const POINTS_LIST_CLASS = `${POINTS_INFO_CLASS}__list`;
const POINTS_LIST_SELECTOR = `.${POINTS_LIST_CLASS}`;
const POINTS_ITEM_CLASS = `${POINTS_INFO_CLASS}__item`;
const POINTS_ITEM_SELECTOR = `.${POINTS_ITEM_CLASS}`;

const pointsEmpty = document.querySelector(POINTS_EMPTY_SELECTOR);
const pointsList = document.querySelector(POINTS_LIST_SELECTOR);

function createNewPointItem(pointName, pointAddress, pointDescription, classModificator) {
    const pointsListItemHTML = `
        <div class="${POINTS_ITEM_CLASS} ${POINTS_ITEM_CLASS}--${classModificator}">
            <div>
                <b>Название:</b>
                ${pointName}
            </div>
            <div>
                <b>Адрес:</b>
                ${pointAddress}
            </div>
            <div>
                <b>Описание:</b>
                ${pointDescription}
            </div>
        </div>
    `;

    pointsList.insertAdjacentHTML('afterbegin', pointsListItemHTML)
}

// Filters custom checkboxes 'change' eventlistener
if (customLayersCheckboxes.length === leafletLayersCheckboxes.length) {
    customLayersCheckboxes.forEach((customCheckbox, index) => {
        customCheckbox.addEventListener('change', function () {
            this.checked ? checkedCustomCheckboxesCounter++ : checkedCustomCheckboxesCounter--;

            if (checkedCustomCheckboxesCounter !== 0) {
                pointsEmpty.classList.add('none');
            } else {
                pointsEmpty.classList.remove('none');
            }

            clearFiltersBtnSpan.textContent = checkedCustomCheckboxesCounter || '';




            const leafletLayersCheckbox = leafletLayersCheckboxes[index];

            if (!leafletLayersCheckbox.checked) {
                leafletLayersCheckbox.checked = true;
                leafletLayersCheckbox.click();
                leafletLayersCheckbox.click();
            } else {
                leafletLayersCheckbox.checked = false;
                leafletLayersCheckbox.click();
                leafletLayersCheckbox.click();
            }




            const checkboxLabel = this.closest('label');
            const checkboxLabelClass = checkboxLabel.classList.value.toLowerCase();
            const checkboxCategory = checkboxLabel.dataset.category;

            if (this.checked) {
                if (checkboxLabelClass.includes(checkboxCategory)) {

                    let categoryGeoJsonPoints = [];

                    switch (checkboxCategory) {
                        case 'batteries':
                            categoryGeoJsonPoints = batteriesGeoJsonPoints;
                            break;

                        case 'lightbulbs':
                            categoryGeoJsonPoints = lightbulbsGeoJsonPoints;
                            break;

                        case 'paper':
                            categoryGeoJsonPoints = paperGeoJsonPoints;
                            break;

                        case 'plastic':
                            categoryGeoJsonPoints = plasticGeoJsonPoints;
                            break;

                        case 'glass':
                            categoryGeoJsonPoints = glassGeoJsonPoints;
                            break;

                        case 'metal':
                            categoryGeoJsonPoints = metalGeoJsonPoints;
                            break;

                        case 'technic':
                            categoryGeoJsonPoints = technicGeoJsonPoints;
                            break;

                        case 'clothes':
                            categoryGeoJsonPoints = clothesGeoJsonPoints;
                            break;

                        default:
                            console.error('Проверь data-category у label (custom-checkbox). Там ошибка!');
                            break;
                    }

                    categoryGeoJsonPoints.features.forEach(point => {
                        console.log(point);
                        createNewPointItem(point.properties.name, point.properties.address, point.properties.description, checkboxCategory);
                    });
                };
            } else {
                pointsList.querySelectorAll(`${POINTS_ITEM_SELECTOR}--${checkboxCategory}`).forEach(item => item.remove());
            }

        });
    });
} else {
    console.error('Кол-во кастомных и leaflet чекбоксов не совпадает!');
}






























// Location btn
// const locationBtn = document.querySelector('.filter-layers__location-btn');
// if (locationBtn) {
//     locationBtn.addEventListener('click', () => {
//         navigator.geolocation.getCurrentPosition(successLocation, errorLocation, {
//             enableHighAccuracy: true
//         });
//     });
// }
// function successLocation(userPosition) {
//     console.log(userPosition);

//     const lat = userPosition.coords.latitude;
//     const lng = userPosition.coords.longitude;

//     //FIXME:
//     L.marker([lat, lng], { icon: userLocationIcon, alt: 'Ваше местоположение' }).bindPopup('Ваше местоположение').addTo(map);
// }
// function errorLocation(error) {
//     console.log(error);
// }

