import L from 'leaflet';
import 'leaflet/dist/leaflet.css';




const SEVASTOPOL_COORDS = [44.556972, 33.526402];
const INITIAL_MAP_ZOOM = 12;
const MIN_MAP_ZOOM = 10;

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
const userLocationIcon = createLeafletCustomIcon('user-location-icon.svg');



//TODO: Вынести отдельными JS-модулями
const batteriesGeoJsonPoints = {
    "type": "FeatureCollection",
    "features": [
        {
            "type": "Feature",
            "properties": {},
            "geometry": {
                "coordinates": [
                    33.524180424436196,
                    44.5647952763899
                ],
                "type": "Point"
            }
        },
        {
            "type": "Feature",
            "properties": {},
            "geometry": {
                "coordinates": [
                    33.52698320701606,
                    44.564981035056746
                ],
                "type": "Point"
            }
        },
        {
            "type": "Feature",
            "properties": {},
            "geometry": {
                "coordinates": [
                    33.52383397897444,
                    44.568798942944255
                ],
                "type": "Point"
            }
        },
        {
            "type": "Feature",
            "properties": {},
            "geometry": {
                "coordinates": [
                    33.523379775887776,
                    44.569824203689365
                ],
                "type": "Point"
            }
        },
        {
            "type": "Feature",
            "properties": {},
            "geometry": {
                "coordinates": [
                    33.52493631455545,
                    44.56883893572365
                ],
                "type": "Point"
            }
        },
        {
            "type": "Feature",
            "properties": {},
            "geometry": {
                "coordinates": [
                    33.5256507913212,
                    44.56916978402356
                ],
                "type": "Point"
            }
        },
        {
            "type": "Feature",
            "properties": {},
            "geometry": {
                "coordinates": [
                    33.52443107741374,
                    44.56986056012124
                ],
                "type": "Point"
            }
        },
        {
            "type": "Feature",
            "properties": {},
            "geometry": {
                "coordinates": [
                    33.52090054292873,
                    44.57538172204514
                ],
                "type": "Point"
            }
        },
        {
            "type": "Feature",
            "properties": {
                "address": "Qwerty, 12A-B 8'"
            },
            "geometry": {
                "coordinates": [
                    33.52149965305412,
                    44.57390675147727
                ],
                "type": "Point"
            }
        },
        {
            "type": "Feature",
            "properties": {},
            "geometry": {
                "coordinates": [
                    33.52913042411339,
                    44.57291093800998
                ],
                "type": "Point"
            }
        }
    ]
}
const lightbulbsGeoJsonPoints = {
    "type": "FeatureCollection",
    "features": [
        {
            "type": "Feature",
            "properties": {},
            "geometry": {
                "coordinates": [
                    33.4599683449205,
                    44.57358267210466
                ],
                "type": "Point"
            }
        },
        {
            "type": "Feature",
            "properties": {},
            "geometry": {
                "coordinates": [
                    33.455064534289505,
                    44.587230342905315
                ],
                "type": "Point"
            }
        },
        {
            "type": "Feature",
            "properties": {},
            "geometry": {
                "coordinates": [
                    33.460959697822915,
                    44.588367137526234
                ],
                "type": "Point"
            }
        },
        {
            "type": "Feature",
            "properties": {},
            "geometry": {
                "coordinates": [
                    33.45573500495584,
                    44.59739738341145
                ],
                "type": "Point"
            }
        },
        {
            "type": "Feature",
            "properties": {},
            "geometry": {
                "coordinates": [
                    33.46070443520031,
                    44.60658106010274
                ],
                "type": "Point"
            }
        },
        {
            "type": "Feature",
            "properties": {},
            "geometry": {
                "coordinates": [
                    33.48283962910713,
                    44.598301176342346
                ],
                "type": "Point"
            }
        }
    ]
}

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




// Overlay layers with markers
let batteriesLayer = L.layerGroup([batteriesMarkers]);
let lightbulbsLayer = L.layerGroup([lightbulbsMarkers]);
let paperLayer = L.layerGroup([]);
let plasticLayer = L.layerGroup([]);
let glassLayer = L.layerGroup([]);
let metalLayer = L.layerGroup([]);
let technicLayer = L.layerGroup([]);
let clothesLayer = L.layerGroup([]);

// Tile layer – OSM
const OSM = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});

// Tile layer – Esri satellite
const Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
    //attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
    attribution: 'Tiles &copy; Esri'
});

// Map initialization
const map = L.map('map', {
    center: SEVASTOPOL_COORDS,
    zoom: INITIAL_MAP_ZOOM,
    minZoom: MIN_MAP_ZOOM,
    layers: [
        Esri_WorldImagery,
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
