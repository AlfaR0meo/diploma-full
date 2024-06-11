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




const LEAFLET_MARKER_CLASS = 'leaflet-marker-icon';
const LEAFLET_MARKER_SELECTOR = `.${LEAFLET_MARKER_CLASS}`;
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

    let pointsItemHTML = '';

    if (!pointDescription) {
        pointsItemHTML = `
            <div class="${POINTS_ITEM_CLASS} ${POINTS_ITEM_CLASS}--${classModificator}">
                <div class="${POINTS_ITEM_CLASS}-title">
                    ${pointName}
                </div>
                <div class="${POINTS_ITEM_CLASS}-address">
                    ${pointAddress}
                </div>
            </div>
        `;
    } else {
        pointsItemHTML = `
            <div class="${POINTS_ITEM_CLASS} ${POINTS_ITEM_CLASS}--${classModificator}">
                <div class="${POINTS_ITEM_CLASS}-title">
                    ${pointName}
                </div>
                <div class="${POINTS_ITEM_CLASS}-address">
                    ${pointAddress}
                </div>
                <div class="${POINTS_ITEM_CLASS}-description">
                    ${pointDescription}
                </div>
            </div>
        `;
    }

    pointsList.insertAdjacentHTML('afterbegin', pointsItemHTML)
}
function clickOnMarker(classModificator, feature) {
    const neededElements = document.querySelectorAll(`${POINTS_ITEM_SELECTOR}--${classModificator}`);
    const allElements = document.querySelectorAll(POINTS_ITEM_SELECTOR);

    allElements.forEach(elem => {
        elem.classList.remove('marker-click-active');
    });

    neededElements.forEach(elem => {
        const titleDiv = elem.querySelector(`${POINTS_ITEM_SELECTOR}-title`);
        const addressDiv = elem.querySelector(`${POINTS_ITEM_SELECTOR}-address`);

        if (titleDiv.textContent.includes(feature.properties.title) && addressDiv.textContent.includes(feature.properties.address)) {
            elem.classList.add('marker-click-active');

            elem.scrollIntoView({
                behavior: 'instant', // "smooth" bag in chromium
                block: 'center'
            });
        }
    });
}
function clickOnPointItem() {
    let leafletMarkers = document.querySelectorAll(LEAFLET_MARKER_SELECTOR);
    let pointsItems = document.querySelectorAll(POINTS_ITEM_SELECTOR);

    pointsItems.forEach(item => {
        item.addEventListener('click', () => {
            leafletMarkers.forEach(marker => {
                marker.classList.remove('active');
                const pointTitle = item.querySelector(`${POINTS_ITEM_SELECTOR}-title`);

                if (pointTitle.textContent.includes(marker.title)) {
                    marker.classList.add('active');
                    marker.click();
                }
            });
        });
    });
}




// Icons creating and configuring
function createLeafletCustomIcon(iconFileName) {
    const iconWidth = 40;
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

// Markers arrays
const batteriesMarkers = L.geoJSON(batteriesGeoJsonPoints, {
    pointToLayer: function (geoJsonPoint, latlng) {
        return L.marker(latlng, {
            icon: batteriesIcon,
            title: geoJsonPoint.properties.title
        }).bindPopup(geoJsonPoint.properties.title);
    },
    onEachFeature: function (feature, geoJsonPoint) {
        geoJsonPoint.on('click', function () {
            clickOnMarker('batteries', feature);
        });
    }
});
const lightbulbsMarkers = L.geoJSON(lightbulbsGeoJsonPoints, {
    pointToLayer: function (geoJsonPoint, latlng) {
        return L.marker(latlng, {
            icon: lightbulbsIcon,
            title: geoJsonPoint.properties.title
        }).bindPopup(geoJsonPoint.properties.title);
    },
    onEachFeature: function (feature, geoJsonPoint) {
        geoJsonPoint.on('click', function () {
            clickOnMarker('lightbulbs', feature);
        });
    }
});
const paperMarkers = L.geoJSON(paperGeoJsonPoints, {
    pointToLayer: function (geoJsonPoint, latlng) {
        return L.marker(latlng, {
            icon: paperIcon,
            title: geoJsonPoint.properties.title
        }).bindPopup(geoJsonPoint.properties.title)
    },
    onEachFeature: function (feature, geoJsonPoint) {
        geoJsonPoint.on('click', function () {
            clickOnMarker('paper', feature);
        });
    }
});
const plasticMarkers = L.geoJSON(plasticGeoJsonPoints, {
    pointToLayer: function (geoJsonPoint, latlng) {
        return L.marker(latlng, {
            icon: plasticIcon,
            title: geoJsonPoint.properties.title
        }).bindPopup(geoJsonPoint.properties.title)
    },
    onEachFeature: function (feature, geoJsonPoint) {
        geoJsonPoint.on('click', function () {
            clickOnMarker('plastic', feature);
        });
    }
});
const glassMarkers = L.geoJSON(glassGeoJsonPoints, {
    pointToLayer: function (geoJsonPoint, latlng) {
        return L.marker(latlng, {
            icon: glassIcon,
            title: geoJsonPoint.properties.title
        }).bindPopup(geoJsonPoint.properties.title)
    },
    onEachFeature: function (feature, geoJsonPoint) {
        geoJsonPoint.on('click', function () {
            clickOnMarker('glass', feature);
        });
    }
});
const metalMarkers = L.geoJSON(metalGeoJsonPoints, {
    pointToLayer: function (geoJsonPoint, latlng) {
        return L.marker(latlng, {
            icon: metalIcon,
            title: geoJsonPoint.properties.title
        }).bindPopup(geoJsonPoint.properties.title)
    },
    onEachFeature: function (feature, geoJsonPoint) {
        geoJsonPoint.on('click', function () {
            clickOnMarker('metal', feature);
        });
    }
});
const technicMarkers = L.geoJSON(technicGeoJsonPoints, {
    pointToLayer: function (geoJsonPoint, latlng) {
        return L.marker(latlng, {
            icon: technicIcon,
            title: geoJsonPoint.properties.title
        }).bindPopup(geoJsonPoint.properties.title)
    },
    onEachFeature: function (feature, geoJsonPoint) {
        geoJsonPoint.on('click', function () {
            clickOnMarker('technic', feature);
        });
    }
});
const clothesMarkers = L.geoJSON(clothesGeoJsonPoints, {
    pointToLayer: function (geoJsonPoint, latlng) {
        return L.marker(latlng, {
            icon: clothesIcon,
            title: geoJsonPoint.properties.title
        }).bindPopup(geoJsonPoint.properties.title)
    },
    onEachFeature: function (feature, geoJsonPoint) {
        geoJsonPoint.on('click', function () {
            clickOnMarker('clothes', feature);
        });
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
    attributionControl: true,
    scrollWheelZoom: true,
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
// Leaflet layers checkboxes
const leafletLayersCheckboxes = document.querySelectorAll('.leaflet-control-layers-overlays .leaflet-control-layers-selector');
const leafletMarkersPane = document.querySelector('.leaflet-pane .leaflet-marker-pane');
const leafletPopupsPane = document.querySelector('.leaflet-pane .leaflet-popup-pane');




// Кнопка очистки фильтров
clearFiltersBtn.addEventListener('click', () => {
    checkedCustomCheckboxesCounter = 0;
    clearFiltersBtnSpan.textContent = checkedCustomCheckboxesCounter || '';

    resetEcomapControls();

    pointsList.querySelectorAll(POINTS_ITEM_SELECTOR).forEach(item => item.remove());
    pointsEmpty.classList.remove('none');
});
function resetEcomapControls() {
    resetCustomCheckboxes();

    resetLeafletLayersCheckboxes();
    clearLeafletMarkers();
    clearLeafletPopups();
}
function resetLeafletLayersCheckboxes() {
    leafletLayersCheckboxes.forEach(layerCheckbox => {
        layerCheckbox.checked = false;
    });
}
function resetCustomCheckboxes() {
    customLayersCheckboxes.forEach(customCheckbox => {
        customCheckbox.checked = false;
    });
}
function clearLeafletMarkers() {
    leafletMarkersPane.innerHTML = '';
}
function clearLeafletPopups() {
    leafletPopupsPane.innerHTML = '';
}
resetEcomapControls();




// Filters custom checkboxes 'change' eventlistener
if (customLayersCheckboxes.length === leafletLayersCheckboxes.length) {
    customLayersCheckboxes.forEach((customCheckbox, index) => {
        customCheckbox.addEventListener('change', function () {

            this.checked ? checkedCustomCheckboxesCounter++ : checkedCustomCheckboxesCounter--;
            clearFiltersBtnSpan.textContent = checkedCustomCheckboxesCounter || '';
            checkedCustomCheckboxesCounter ? pointsEmpty.classList.add('none') : pointsEmpty.classList.remove('none');

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
                        createNewPointItem(point.properties.title, point.properties.address, point.properties.description, checkboxCategory);
                    });
                };
                clickOnPointItem();
            } else {
                pointsList.querySelectorAll(`${POINTS_ITEM_SELECTOR}--${checkboxCategory}`).forEach(item => item.remove());
            }

        });
    });
} else {
    console.error('Кол-во кастомных и leaflet чекбоксов не совпадает!');
}
