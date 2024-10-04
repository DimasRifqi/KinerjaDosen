<?php

use App\Http\Controllers\CsvImportController;
use App\Http\Controllers\OPPTController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/import-csv', [CsvImportController::class, 'import'])->name('import.csv');
Route::get('/import-csv', [CsvImportController::class, 'index'])->name('index.csv');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Super Admin
    //Periode
Route::get('/adminPeriode/create_periode', [SuperAdminController::class, 'indexPeriode'])->name('index.periode');
Route::post('/periode/create', [SuperAdminController::class, 'CreatePeriode'])->name('periode.create');
Route::get('/periode/edit/{id}', [SuperAdminController::class, 'editPeriode'])->name('periode.edit');
Route::put('/periode/update/{id}', [SuperAdminController::class, 'updatePeriode'])->name('periode.update');

    //Universitas
Route::get('/adminUniv/create_univ', [SuperAdminController::class, 'indexUniv'])->name('index.uni');
Route::post('/univ/create', [SuperAdminController::class, 'createUniv'])->name('univ.create');
Route::get('/univ/edit/{id}', [SuperAdminController::class, 'editUniv'])->name('univ.edit');
Route::put('/univ/update/{id}', [SuperAdminController::class, 'updateUniv'])->name('univ.update');


//OP PT
Route::get('/index/dosen', [OPPTController::class, 'allDosen'])->name('oppt.index.dosen');


