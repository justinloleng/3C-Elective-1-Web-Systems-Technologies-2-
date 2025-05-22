<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokedexController;
use App\Http\Controllers\WeatherController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/weather/{city3?}', [WeatherController::class, 'showWeather']);
Route::get('/pokedex', [PokedexController::class, 'index'])->name('pokedex.index');
Route::get('/pokedex/search', [PokedexController::class, 'search'])->name('pokedex.search');

