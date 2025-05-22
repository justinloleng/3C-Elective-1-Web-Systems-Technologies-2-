<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ ucfirst($pokemon['name']) }} - Pokédex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4 text-center">
    <h1>{{ ucfirst($pokemon['name']) }}</h1>
    <img src="{{ $pokemon['image'] }}" alt="{{ $pokemon['name'] }}" class="img-fluid my-3" style="max-width: 200px;">
    <p><strong>Height:</strong> {{ $pokemon['height'] }}</p>
    <p><strong>Weight:</strong> {{ $pokemon['weight'] }}</p>
    <a href="{{ route('pokedex.index') }}" class="btn btn-secondary mt-3">Back to Pokédex</a>
</div>
</body>
</html>
