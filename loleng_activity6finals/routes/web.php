<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokedexController;



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

Route::get('/pokedex', [PokedexController::class, 'index'])->name('pokedex.index');
Route::get('/pokedex/search', [PokedexController::class, 'search'])->name('pokedex.search');
