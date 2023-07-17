<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', [FormController::class, 'index'])->name('forms.index');
Route::post('/form', [FormController::class, 'store'])->name('forms.store');