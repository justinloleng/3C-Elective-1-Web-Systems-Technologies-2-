<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokedexController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $limit = 12;
        $offset = ($page - 1) * $limit;

        $response = Http::get("https://pokeapi.co/api/v2/pokemon?limit=$limit&offset=$offset");

        $results = $response['results'] ?? [];
        $pokemons = [];

        foreach ($results as $pokemon) {
            $details = Http::get($pokemon['url'])->json();
            $pokemons[] = [
                'name' => $pokemon['name'],
                'image' => $details['sprites']['front_default'] ?? '',
            ];
        }

        return view('pokedex.index', [
            'pokemons' => $pokemons,
            'currentPage' => $page,
        ]);
    }

    public function search(Request $request)
    {
        $query = strtolower($request->input('pokemon'));

        $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$query}");

        if ($response->failed()) {
            return redirect()->route('pokedex.index')->with('error', 'Pokémon not found.');
        }

        $pokemon = $response->json();

        return view('pokedex.search', [
            'pokemon' => [
                'name' => $pokemon['name'],
                'image' => $pokemon['sprites']['front_default'],
                'height' => $pokemon['height'],
                'weight' => $pokemon['weight'],
            ]
        ]);
    }
}
