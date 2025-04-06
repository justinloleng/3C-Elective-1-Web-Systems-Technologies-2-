<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookController;
use App\Models\Book;

Route::get('/register' , [RegisterController::class , 'showRegister'])->name('register');
Route::post('/register' , [RegisterController::class , 'register']);

//login
Route::get('/login' , [LoginController::class , 'showLogin'])->name('login');
Route::post('/login' , [LoginController::class , 'login']);
Route::post('/logout' , [LoginController::class , 'logout'])->name('logout');


Route::middleware('auth')->get('/dashboard', function () {
    $books = Book::all();
    return view('auth.dashboard', compact('books'));
})->name('dashboard');


Route::resource('books', BookController::class);
