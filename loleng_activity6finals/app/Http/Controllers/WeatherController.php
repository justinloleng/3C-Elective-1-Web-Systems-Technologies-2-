<?php
// app/Http/Controllers/WeatherController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function showWeather($city3 = 'London')
    {
        $apiKey = env('OPENWEATHER_API_KEY');

        $cities = ['Singapore', 'Dubai', $city3];

        $weatherData = [];

        foreach ($cities as $city) {
            $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                'q' => $city,
                'appid' => $apiKey,
                'units' => 'metric'
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $weatherData[] = [
                    'city' => $city,
                    'temperature' => $data['main']['temp'],
                    'description' => $data['weather'][0]['description'],
                    'humidity' => $data['main']['humidity']
                ];
            } else {
                $weatherData[] = [
                    'city' => $city,
                    'error' => 'Weather not found'
                ];
            }
        }

        return view('weather.index', compact('weatherData'));
    }
}
