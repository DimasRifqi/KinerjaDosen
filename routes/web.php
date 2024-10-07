<?php

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

Route::get('/anggota/datadosen', function () {
    return view('home.anggota.data_dosen');
})->name('datadosen');

Route::get('/anggota/pendaftarandosen', function () {
    return view('home.anggota.pendaftaran_dosen');
})->name('pendaftarandosen');

Route::get('/pengajuan/datapengajuan', function () {
    return view('home.pengajuan.data_pengajuan');
})->name('datapengajuan');





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

Route::put('/status/dosen/{id}', [OPPTController::class, 'updateStatusDosen'])->name('oppt.updateStatus.dosen');
Route::get('/edit/dosen/{id}', [OPPTController::class, 'editDosen'])->name('oppt.edit.dosen');
Route::put('/update/dosen/{id}', [OPPTController::class, 'updateDosen'])->name('oppt.update.dosen');
Route::get('/periode', [OPPTController::class, 'indexPeriode'])->name('periode.index');

Route::get('/pengajuan/create', [OPPTController::class, 'addPengajuan'])->name('oppt.pengajuan.dosen');
Route::post('/pengajuan/store', [OPPTController::class, 'ajukanDosen'])->name('oppt.ajukan.dosen');
Route::get('/pengajuan/index', [OPPTController::class, 'indexPengajuan'])->name('oppt.pengajuanIndex.dosen');
Route::get('/pengajuan/show/{id}', [OPPTController::class, 'showPengajuan'])->name('oppt.pengajuanShow.dosen');
Route::post('/pengajuan/dokumen/store/{id}', [OPPTController::class, 'ajukanDokumen'])->name('oppt.pengajuanDokumenStore.dosen');
Route::put('/pengajuan/dokumen/update/{id}', [OPPTController::class, 'updateDokumen'])->name('oppt.updateDokumen.dosen');
Route::put('/draft/pengajuan{id}', [OPPTController::class, 'draftPengajuan'])->name('oppt.draftPengajuan.dosen');

Route::put('/pengajuan/update/{id}', [OPPTController::class, 'updatePengajuan'])->name('oppt.updatePengajuan.dosen');
Route::get('/pengajuan/edit/{id}', [OPPTController::class, 'editPengajuan'])->name('oppt.editPengajuan.dosen');
Route::delete('/pengajuan/delete/{id}', [OPPTController::class, 'deletePengajuan'])->name('oppt.deletePengajuan.dosen');

Route::get('/pengajuan/dosen/{id}', [OPPTController::class, 'statusPengajuanDosen'])->name('oppt.statusPengajuan.dosen');

Route::get('/pengajuan/semester/show/{id}', [OPPTController::class, 'showPengajuanSemester'])->name('oppt.pengajuanSemesterShow.dosen');