<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::middleware('auth')->group(function(){
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('kelas', KelasController::class);
Route::resource('spp', SppController::class);
Route::resource('siswa', SiswaController::class);
Route::resource('pembayaran', PembayaranController::class);
Route::resource('petugas', PetugasController::class);
});