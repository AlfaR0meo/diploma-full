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

//const userLocationIcon = createLeafletCustomIcon('user-location-icon.svg');



//TODO: geojson marker clusters



const batteriesMarkers = L.geoJSON(batteriesGeoJsonPoints, {
    pointToLayer: function (geoJsonPoint, latlng) {
        return L.marker(latlng, { icon: batteriesIcon }).bindPopup(geoJsonPoint.geometry.type)
    },
    onEachFeature: function (feature, geoJsonPoint) {
        geoJsonPoint.on('click', function () {
            console.log(feature.geometry.coordinates);
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

// Tile layer – OSM
const OSM = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
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
        OSM,
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
    attributionControl: false,
    // scrollWheelZoom: false,
    // preferCanvas: true,
});

// Layer control adding
const baseMaps = {
    "Спутник ESRI": EsriWorldImagery,
    "OpenStreetMap": OSM,
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
const layerControl = L.control.layers(baseMaps, overlayLayers, {
    collapsed: true,
    hideSingleBase: true,
    position: 'topright'
}).addTo(map);

