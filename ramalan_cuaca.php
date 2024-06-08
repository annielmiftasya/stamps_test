<?php

function timestamp_to_date_str($timestamp)
{
    return date('D, d M Y', $timestamp);
}

function format_weather_forecast($result)
{
    $formatted_forecast = "Weather Forecast for Jakarta:\n";

    $daily_temperatures = [];

    foreach ($result as $forecast) {
        $timestamp = $forecast['dt'];
        $date_str = timestamp_to_date_str($timestamp);

        $temp_celsius = $forecast['main']['temp'];

        $daily_temperatures[$date_str][] = $temp_celsius;
    }

    foreach ($daily_temperatures as $date => $temps) {
        $average_temp = array_sum($temps) / count($temps);
        $formatted_forecast .= "$date: " . round($average_temp, 2) . " °C\n";
    }

    return $formatted_forecast;
}


function get_weather_forecast($city, $api_key)
{
    $url = "https://api.openweathermap.org/data/2.5/forecast?q=$city&appid=$api_key&units=metric";
    $response = file_get_contents($url);
    return json_decode($response, true)['list'];
}


$city = 'Jakarta';
$api_key = '5aaf3cbbbe30b12c2c7ac6e51f94da22';

$result = get_weather_forecast($city, $api_key);

$formatted_forecast = format_weather_forecast($result);
echo $formatted_forecast;
