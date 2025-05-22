<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;

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

Route::delete('/photos/{id}', [PhotoController::class, 'destroy'])->name('photos.destroy');

Route::get('/upload', [PhotoController::class, 'create'])->name('photos.create');

Route::post('/upload-single', [PhotoController::class, 'storeSingle'])->name('photos.store.single');

Route::post('/upload-multiple', [PhotoController::class, 'storeMultiple'])->name('photos.store.multiple');

Route::delete('/photos/{id}', [PhotoController::class, 'destroy'])->name('photos.destroy');
