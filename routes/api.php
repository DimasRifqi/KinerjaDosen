<?php

use App\Http\Controllers\ApiMobile;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\InformasiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);
Route::get('/index', [AuthApiController::class, 'index']);

Route::group([
    "middleware" => "auth:sanctum"], function(){
    Route::get('/userProfile', [AuthApiController::class, 'userProfile']);
    Route::get('/logout', [AuthApiController::class, 'logout']);
    Route::get('/pengajuan', [AuthApiController::class, 'pengajuan']);
    Route::get('pengajuan/terbaru', [ApiMobile::class, 'pengajuanTerbaruUser']); //get data pengajuan terbaru user
    Route::get('pengajuan/index', [ApiMobile::class, 'pengajuanIndexUser']); //get data pengajuan semua dari user
    Route::get('pengajuan/show/{id}', [ApiMobile::class, 'pengajuanIndexShow']); //get data pengajuan detail
    Route::get('riwayat/pengajuan', [ApiMobile::class, 'riwayatTunjangan']); //get data riwayat dosen pengajaun
    Route::post('ganti-password', [ApiMobile::class, 'gantiPassword']); //get data riwayat dosen pengajaun
});

Route::group(['prefix' => 'dosen'], function () {
});

    Route::get('/allData', [AuthApiController::class, 'allData']); // get all data kota, univ, prodi, dosen
    Route::post('/search/dosen', [AuthApiController::class, 'searchDosen']); // search dosen


    Route::get('informasi/index', [ApiMobile::class, 'indexInformasi']); //get data informasi
    Route::get('faq/index', [ApiMobile::class, 'faqIndex']); // get data
    Route::get('kota/index', [ApiMobile::class, 'allKota']);
    Route::get('univ/index', [ApiMobile::class, 'allUniv']);
    Route::get('prodi/index', [ApiMobile::class, 'allProdi']);
    Route::get('dosen/index', [ApiMobile::class, 'allDosen']);
    Route::get('dosen/ajuan', [ApiMobile::class, 'ajuanTunjanganDosen']);
    Route::get('dosen/ajuan/show/{id}', [ApiMobile::class, 'ajuanTunjanganDosenShow']);

