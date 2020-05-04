<?php 
function convert($type, $value) {
    switch ($type) {
        case 'humidity':
            return getHumidity($value);
            break;
        case 'temperature':
            return getTemperature($value);
            break;
        case 'altitude':
            return getAltitude($value);
            break;
        case 'wind':
            return getWind($value);
            break;
        case 'atmospheric_pressure':
            return getAtmosphericPressure($value);
            break;
        case 'brightness':
            return getBrightness($value);
            break;
        default:
            return "ERror mdrrrr";
            break;
    }
}
function getHumidity($value) {
    return round(($value / 1024) * 100, 0) . "%";
}

function getTemperature($value) {
    return round(($value / 1024) * 20, 0) + 10 . "°C";
}

function getAltitude($value) {
    // return round(($value / 1024) * 50, 0) . "m";
    return "203 mètres";
}

function getWind($value) {
    return round(($value / 1024) * 75, 0) . " km/h";
}

function getAtmosphericPressure($value) {
    return round(($value / 1024) * 1500, 0) . "hPa";
}

function getBrightness($value) {
    return round(($value / 1024) * 125000, 0) . " lux";
}