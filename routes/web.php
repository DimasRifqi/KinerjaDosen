<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OPPTController;
use App\Http\Controllers\GelarController;
use App\Http\Controllers\CsvImportController;
use App\Http\Controllers\GelarDepanController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\GelarBelakangController;
use App\Http\Controllers\KotaController;

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
//admin create
Route::get('/admin/create', [SuperAdminController::class, 'create'])->name('admin.create');
Route::post('/admin', [SuperAdminController::class, 'store'])->name('admin.store');
//admin edit
Route::get('admin/{id}/edit', [SuperAdminController::class, 'edit'])->name('admin.edit');
Route::put('admin/{id}', [SuperAdminController::class, 'update'])->name('admin.update');



// Routes untuk Gelar Depan
Route::get('/gelar', [GelarController::class, 'index'])->name('gelar.index');

// Routes untuk Gelar Depan
Route::get('gelar-depan/create', [GelarController::class, 'createDepan'])->name('gelar-depan.create');
Route::post('gelar-depan/store', [GelarController::class, 'storeDepan'])->name('gelar-depan.store');
Route::get('gelar-depan/{id}/edit', [GelarController::class, 'editDepan'])->name('gelar-depan.edit');
Route::put('gelar-depan/{id}', [GelarController::class, 'updateDepan'])->name('gelar-depan.update');

// Routes untuk Gelar Belakang
Route::get('gelar-belakang/create', [GelarController::class, 'createBelakang'])->name('gelar-belakang.create');
Route::post('gelar-belakang/store', [GelarController::class, 'storeBelakang'])->name('gelar-belakang.store');
Route::get('gelar-belakang/{id}/edit', [GelarController::class, 'editBelakang'])->name('gelar-belakang.edit');
Route::put('gelar-belakang/{id}', [GelarController::class, 'updateBelakang'])->name('gelar-belakang.update');

//kota
Route::resource('kota', KotaController::class);