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

Route::get('/anggota/datadosen', function () {
    return view('home.anggota.data_dosen');
})->name('datadosen');

Route::get('/anggota/pendaftarandosen', function () {
    return view('home.anggota.pendaftaran_dosen');
})->name('pendaftarandosen');

Route::get('/pengajuan/datapengajuan', function () {
    return view('home.pengajuan.data_pengajuan');
})->name('datapengajuan');

//admin
Route::get('/admin', [SuperAdminController::class, 'index'])->name('admin.index');

//create
Route::get('/admin/create', [SuperAdminController::class, 'create'])->name('admin.create');
Route::post('/admin', [SuperAdminController::class, 'store'])->name('admin.store');

//edit
Route::get('admin/{id}/edit', [SuperAdminController::class, 'edit'])->name('admin.edit');
Route::put('admin/{id}', [SuperAdminController::class, 'update'])->name('admin.update');
