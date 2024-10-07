<?php

use App\Http\Controllers\CsvImportController;
use App\Http\Controllers\OPPTController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/import-csv', [CsvImportController::class, 'import'])->name('import.csv');
Route::get('/import-csv', [CsvImportController::class, 'index'])->name('index.csv');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//OP PT
Route::get('/index/dosen', [OPPTController::class, 'allDosen'])->name('oppt.index.dosen');
Route::put('/status/dosen/{id}', [OPPTController::class, 'updateStatusDosen'])->name('oppt.updateStatus.dosen');
Route::get('/edit/dosen/{id}', [OPPTController::class, 'editDosen'])->name('oppt.edit.dosen');
Route::put('/update/dosen/{id}', [OPPTController::class, 'updateDosen'])->name('oppt.update.dosen');
Route::get('/periode', [OPPTController::class, 'indexPeriode'])->name('periode.index');

Route::get('/pengajuan/create', [OPPTController::class, 'addPengajuan'])->name('oppt.pengajuan.dosen');
Route::post('/pengajuan/store', [OPPTController::class, 'ajukanDosen'])->name('oppt.ajukan.dosen');
Route::get('/pengajuan/index', [OPPTController::class, 'indexPengajuan'])->name('oppt.pengajuanIndex.dosen');
Route::get('/pengajuan/show/{id}', [OPPTController::class, 'showPengajuan'])->name('oppt.pengajuanShow.dosen');
Route::post('/pengajuan/dokumen/store/{id}', [OPPTController::class, 'ajukanDokumen'])->name('oppt.pengajuanDokumenStore.dosen');
Route::put('/draft/pengajuan{id}', [OPPTController::class, 'draftPengajuan'])->name('oppt.draftPengajuan.dosen');

Route::put('/pengajuan/update/{id}', [OPPTController::class, 'updatePengajuan'])->name('oppt.updatePengajuan.dosen');
Route::get('/pengajuan/edit/{id}', [OPPTController::class, 'editPengajuan'])->name('oppt.editPengajuan.dosen');

Route::get('/pengajuan/semester/show/{id}', [OPPTController::class, 'showPengajuanSemester'])->name('oppt.pengajuanSemesterShow.dosen');
