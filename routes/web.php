<?php

use App\Http\Controllers\CsvImportController;
use App\Http\Controllers\OPPTController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::post('/import-csv', [CsvImportController::class, 'import'])->name('import.csv');
Route::get('/import-csv', [CsvImportController::class, 'index'])->name('index.csv');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//OP PT
Route::get('/index/dosen', [OPPTController::class, 'allDosen'])->name('oppt.index.dosen');

Route::get('/template', function () {
    return view('template.templatehome');
});

//admin
Route::get('/admin', [SuperAdminController::class, 'index'])->name('admin.index');
Route::get('/admin/create', [SuperAdminController::class, 'create'])->name('admin.create');
Route::post('/admin', [SuperAdminController::class, 'store'])->name('admin.store');