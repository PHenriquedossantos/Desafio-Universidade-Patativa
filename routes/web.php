<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::get('/forms', [FormController::class, 'index'])->name('forms.index');
    Route::post('/form', [FormController::class, 'store'])->name('forms.store');
    Route::get('/dashboard', function () {
        return view('forms.create');
    })->name('dashboard');
});