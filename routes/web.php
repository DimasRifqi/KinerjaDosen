<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OPPTController;
use App\Http\Controllers\GelarController;
use App\Http\Controllers\CsvImportController;
use App\Http\Controllers\GelarDepanController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\GelarBelakangController;
use App\Http\Controllers\JabatanFungsionalController;
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





// Route untuk Admin
Route::prefix('admin')->group(function () {
    Route::get('/', [SuperAdminController::class, 'index'])->name('admin.index');
    Route::get('/create', [SuperAdminController::class, 'create'])->name('admin.create');
    Route::post('/', [SuperAdminController::class, 'store'])->name('admin.store');
    Route::get('/{id}/edit', [SuperAdminController::class, 'edit'])->name('admin.edit');
    Route::put('/{id}', [SuperAdminController::class, 'update'])->name('admin.update');
});

Route::prefix('gelar')->group(function () {
    // Routes untuk Gelar Depan
    Route::get('/', [GelarController::class, 'index'])->name('gelar.index');

    Route::prefix('depan')->group(function () {
        Route::get('/create', [GelarController::class, 'createDepan'])->name('gelar-depan.create');
        Route::post('/store', [GelarController::class, 'storeDepan'])->name('gelar-depan.store');
        Route::get('/{id}/edit', [GelarController::class, 'editDepan'])->name('gelar-depan.edit');
        Route::put('/{id}', [GelarController::class, 'updateDepan'])->name('gelar-depan.update');
    });

    // Routes untuk Gelar Belakang
    Route::prefix('belakang')->group(function () {
        Route::get('/create', [GelarController::class, 'createBelakang'])->name('gelar-belakang.create');
        Route::post('/store', [GelarController::class, 'storeBelakang'])->name('gelar-belakang.store');
        Route::get('/{id}/edit', [GelarController::class, 'editBelakang'])->name('gelar-belakang.edit');
        Route::put('/{id}', [GelarController::class, 'updateBelakang'])->name('gelar-belakang.update');
    });
});

Route::group(['prefix' => 'kota'], function () {
    Route::get('/', [KotaController::class, 'index'])->name('kota.index');
    Route::get('/create', [KotaController::class, 'create'])->name('kota.create');
    Route::post('/', [KotaController::class, 'store'])->name('kota.store');
    Route::get('/{kota}/edit', [KotaController::class, 'edit'])->name('kota.edit');
    Route::put('/{kota}', [KotaController::class, 'update'])->name('kota.update');
});

Route::group(['prefix' => 'jabatan-fungsional'], function () {
    Route::get('/', [JabatanFungsionalController::class, 'index'])->name('jabatan-fungsional.index');
    Route::get('/create', [JabatanFungsionalController::class, 'create'])->name('jabatan-fungsional.create');
    Route::post('/', [JabatanFungsionalController::class, 'store'])->name('jabatan-fungsional.store');
    Route::get('/{jabatanFungsional}/edit', [JabatanFungsionalController::class, 'edit'])->name('jabatan-fungsional.edit');
    Route::put('/{jabatanFungsional}', [JabatanFungsionalController::class, 'update'])->name('jabatan-fungsional.update');
});