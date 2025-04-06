<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


Route::get('/register' , [RegisterController::class , 'showRegister'])->name('register');
Route::post('/register' , [RegisterController::class , 'register']);

//login
Route::get('/login' , [LoginController::class , 'showLogin'])->name('login');
Route::post('/login' , [LoginController::class , 'login']);
Route::post('/logout' , [LoginController::class , 'logout'])->name('logout');


Route::middleware('auth')->get('/dashboard', function () {
    return view('auth.dashboard');
})->name('dashboard');

