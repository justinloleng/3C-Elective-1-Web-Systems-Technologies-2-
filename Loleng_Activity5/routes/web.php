<?php

use App\Http\Controllers\MathController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/{operation1}/{num1}/{num2}/{operation2}/{num3}/{num4}', [MathController::class, 'calculate']);//Get route kukunin niya ang mga route parameters(operation1,num1,num2,operation2,num3,num4), tapos tatawagin niya ang calculate method sa MathController nanasa controllers tas papasa niya ang mga route parameters.
