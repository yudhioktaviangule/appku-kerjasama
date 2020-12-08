<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Master\PerusahaanController;
use App\Http\Controllers\Web\Master\Perusahaan\UploadNotarisController;
use App\Http\Controllers\Web\Master\Perusahaan\UploadIjinController;
use App\Http\Controllers\Web\Master\PejabatController;
use App\Http\Controllers\Web\RestrictController;
use App\Http\Controllers\Web\Kerjasama\DokumenController;
use App\Http\Controllers\Web\Kerjasama\OpDokumenController;
use App\Http\Controllers\Web\Kerjasama\KasubagDokumenController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>"master"],function(){
    Route::resource('perusahaan',PerusahaanController::class);
    Route::resource('pejabat',PejabatController::class);
});

Route::group(['prefix'=>"kerjasama"],function(){
    Route::resource('dokumen',DokumenController::class);
    Route::resource('pejabat',PejabatController::class);
    Route::resource('op_dokumen',OpDokumenController::class);
    Route::resource('kasubag_doc',KasubagDokumenController::class);
});

Route::group(['prefix'=>"upload"],function(){
    Route::resource('akta-notaris',UploadNotarisController::class);
    Route::resource('ijin',UploadIjinController::class);
});

Route::group(['prefix'=>"nf"],function(){
    Route::resource('restrict',RestrictController::class); 
});
