<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('insert', [StudentController::class, 'insertForm']);
Route::post('create', [StudentController::class, 'insert']);


Route::get('edit-records', [StudentController::class, 'index']);
Route::get('edit/{id}', [StudentController::class, 'show']);
Route::post('edit/{id}', [StudentController::class, 'edit']);


Route::get('stud_view', [StudentController::class, 'index'])->name('stud_view');
Route::get('delete-records', [StudentController::class, 'index']);
Route::delete('delete/{id}', [StudentController::class, 'destroy'])->name('delete');
