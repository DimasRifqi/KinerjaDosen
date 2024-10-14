<?php

use App\Http\Controllers\AuthApiController;
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
});

Route::group(['prefix' => 'dosen'], function () {
});

Route::get('/allData', [AuthApiController::class, 'allData']);
Route::post('/search/dosen', [AuthApiController::class, 'searchDosen']);