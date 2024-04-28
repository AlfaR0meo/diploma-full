import L, { popup } from 'leaflet';
import 'leaflet/dist/leaflet.css';

const SEVASTOPOL_COORDS = [44.556972, 33.526402];
const INITIAL_MAP_ZOOM = 12;
const MIN_MAP_ZOOM = 10;

function createLeafletCustomIcon(iconFileName) {
    const iconWidth = 40; // in px
    const iconHeight = iconWidth;
    const iconFolderPath = './img/icons/ecomap/location-markers/';

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

const userLocationIcon = createLeafletCustomIcon('user-location-icon.svg');




// const batteriesPoints = [
//     // 1
//     {
//         geoPosition: {
//             latitude: 44.573424,
//             longitude: 33.508811
//         },
//         category: ['batteries', 'lightbulbs'],
//         address: '',
//         name: 'Sunny Point',
//         description: 'Lorem ipsum ahmet',
//         // lastChange: '22.04.2024'
//     },
//     //2
//     {

//     }
// ];


const batteriesPoints = [
    {
        geoPosition: [44.59328565361207, 33.47680099676464],
        popup: "Batteries point 1",
        info: "HOW DISPLAY THIS ON MARKER CLICK???"
    },
    {
        geoPosition: [44.597392066280236, 33.455738569768044],
        popup: "Batteries point 2",
        info: "HOW DISPLAY THIS ON MARKER CLICK???"
    },
];
const lightbulbsPoints = [
    {
        geoPosition: [44.59170586256076, 33.467602978470666],
        popup: "Lightbulbs point 1",
        info: "HOW DISPLAY THIS ON MARKER CLICK???"
    },
    {
        geoPosition: [44.591880044021906, 33.4723066776493],
        popup: "Lightbulbs point 2",
        info: "HOW DISPLAY THIS ON MARKER CLICK???"
    },
];
const paperPoints = [
    {
        geoPosition: [44.58821406409447, 33.5362347386247],
        popup: "Paper point 1",
        info: "HOW DISPLAY THIS ON MARKER CLICK???"
    },
];


const batteriesMarkers = batteriesPoints.map(point => {
    return (
        L.marker(point.geoPosition, { icon: batteriesIcon }).bindPopup(function (layer) {
            return layer.options.pane
        })
    );
})
const lightbulbsMarkers = lightbulbsPoints.map(point => {
    return (
        L.marker(point.geoPosition, { icon: lightbulbsIcon }).bindPopup(point.popup)
    );
})
const paperMarkers = paperPoints.map(point => {
    return (
        L.marker(point.geoPosition, { icon: paperIcon }).bindPopup(point.popup)
    );
})




// Overlay layers Leaflet
let batteriesLayer = L.layerGroup(batteriesMarkers);
let lightbulbsLayer = L.layerGroup(lightbulbsMarkers);
let paperLayer = L.layerGroup(paperMarkers);
let plasticLayer = L.layerGroup([]);
let glassLayer = L.layerGroup([]);
let metalLayer = L.layerGroup([]);
let technicLayer = L.layerGroup([]);
let clothesLayer = L.layerGroup([]);

// Tile layer - OSM
const OSM = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});

//
const Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
    attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
});

// Map
const map = L.map('map', {
    center: SEVASTOPOL_COORDS,
    zoom: INITIAL_MAP_ZOOM,
    minZoom: MIN_MAP_ZOOM,
    layers: [
        OSM,
        Esri_WorldImagery,

        batteriesLayer,
        lightbulbsLayer
    ]
});

const baseMaps = {
    "Спутник ESRI": Esri_WorldImagery,
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

const leafletControlLayersOverlays = document.querySelector('.leaflet-control-layers-overlays');
leafletControlLayersOverlays.style.display = 'none';
