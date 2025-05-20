<!DOCTYPE html>
<html>
<head>
    <title>Weather Dashboard</title>
    <style>
        .weather-container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }
        .weather-card {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 15px;
            width: 30%;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Weather of 3 Cities</h1>
    <div class="weather-container">
        @foreach($weatherData as $weather)
            <div class="weather-card">
                @if(isset($weather['error']))
                    <p><strong>{{ $weather['city'] }}</strong></p>
                    <p>{{ $weather['error'] }}</p>
                @else
                    <p><strong>{{ $weather['city'] }}</strong></p>
                    <p>Temperature: {{ $weather['temperature'] }} °C</p>
                    <p>Description: {{ $weather['description'] }}</p>
                    <p>Humidity: {{ $weather['humidity'] }}%</p>
                @endif
            </div>
        @endforeach
    </div>
</body>
</html>
