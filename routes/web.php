<?php

use App\Http\Controllers\CsvImportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::post('/import-csv', [CsvImportController::class, 'import'])->name('import.csv');
Route::get('/import-csv', [CsvImportController::class, 'index'])->name('index.csv');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
