<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\PetugasController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\GaleryController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\FotoController;
use App\Http\Controllers\Api\InformasiController;

//Route::get('/user', function (Request $request) {return $request->user();})->middleware('auth:sanctum');

Route::post('login', [LoginController::class, 'login']);

//Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [LoginController::class, 'logout']);
    
    Route::get('informasi', [InformasiController::class, 'Informasi']);
    Route::apiResource('kategori', KategoriController::class);
    Route::apiResource('petugas', PetugasController::class);
    Route::apiResource('posts', PostController::class);
    Route::apiResource('galery', GaleryController::class);
    Route::apiResource('profile', ProfileController::class);
    Route::apiResource('foto', FotoController::class);
//});