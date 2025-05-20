<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pokédex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Pokédex</h1>

    <form class="d-flex my-4" action="{{ route('pokedex.search') }}" method="GET">
        <input type="text" class="form-control me-2" name="pokemon" placeholder="Search Pokémon (e.g. pikachu)">
        <button class="btn btn-primary" type="submit">Search</button>
    </form>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        @foreach ($pokemons as $pokemon)
            <div class="col-md-3 mb-4">
                <div class="card text-center shadow">
                    <img src="{{ $pokemon['image'] }}" class="card-img-top p-3" alt="{{ $pokemon['name'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ ucfirst($pokemon['name']) }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <nav class="d-flex justify-content-center">
        <ul class="pagination">
            @if($currentPage > 1)
                <li class="page-item"><a class="page-link" href="{{ route('pokedex.index', ['page' => $currentPage - 1]) }}">Previous</a></li>
            @endif
            <li class="page-item"><a class="page-link" href="{{ route('pokedex.index', ['page' => $currentPage + 1]) }}">Next</a></li>
        </ul>
    </nav>
</div>
</body>
</html>
