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
Route::get('/admin/create_periode', [SuperAdminController::class, 'indexPeriode'])->name('index.periode');
Route::post('/periode/create', [SuperAdminController::class, 'CreatePeriode'])->name('periode.create');
Route::get('/periode/edit/{id}', [SuperAdminController::class, 'editPeriode'])->name('periode.edit');
Route::put('/periode/update/{id}', [SuperAdminController::class, 'updatePeriode'])->name('periode.update');

    //Universitas
Route::get('/admin/createUniv', [SuperAdminController::class, 'indexUniv'])->name('index.uni');
Route::post('/univ/create', [SuperAdminController::class, 'createUniv'])->name('univ.create');
Route::get('/univ/edit/{id}', [SuperAdminController::class, 'editUniv'])->name('univ.edit');
Route::put('/univ/update/{id}', [SuperAdminController::class, 'updateUniv'])->name('univ.update');

    //Prodi
Route::get('/admin/createProdi', [SuperAdminController::class, 'indexProdi'])->name('index.prodi');
Route::post('/prodi/create', [SuperAdminController::class, 'createProdi'])->name('prodi.create');
Route::get('/prodi/edit/{id}', [SuperAdminController::class, 'editProdi'])->name('prodi.edit');
Route::put('/prodi/update/{id}', [SuperAdminController::class, 'updateProdi'])->name('prodi.update');

    //Pangkat
Route::get('/admin/createPangkat', [SuperAdminController::class, 'indexPangkatDosen'])->name('index.pangkat');
Route::post('/pangkat/create', [SuperAdminController::class, 'createPangkat'])->name('pangkat.create');
Route::get('/pangkat/edit/{id}', [SuperAdminController::class, 'editPangkat'])->name('pangkat.edit');
Route::put('/pangkat/update/{id}', [SuperAdminController::class, 'updatePangkat'])->name('pangkat.update');



//OP PT
Route::get('/index/dosen', [OPPTController::class, 'allDosen'])->name('oppt.index.dosen');


