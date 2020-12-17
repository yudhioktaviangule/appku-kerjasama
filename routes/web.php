<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Master\PerusahaanController;
use App\Http\Controllers\Web\Master\Perusahaan\UploadNotarisController;
use App\Http\Controllers\Web\Master\Perusahaan\UploadIjinController;
use App\Http\Controllers\Web\Master\PejabatController;
use App\Http\Controllers\Web\RestrictController;
use App\Http\Controllers\Web\Kerjasama\DokumenController;
use App\Http\Controllers\Web\Operator\Dokumen\DashboardController as OperatorDashboard;
use App\Http\Controllers\Web\Client\HdankController as ClientHdank;
use App\Http\Controllers\Web\Kasubag\HdankController as KsbHdank;
use App\Http\Controllers\Web\Kasubag\AgendaRapatController as KsbAgendaRapat;
use App\Http\Controllers\Web\Kasubag\SiapDitandatanganiController as KsbTTD;
use App\Http\Controllers\Web\Kasubag\DokumenSelesaiController as KsbSelesai;

use App\Http\Controllers\Web\BagHukum\DokumenController as BagHukumDokumen;


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
    Route::resource('clhdank',ClientHdank::class);

    Route::resource('ksbhdankweb',KsbHdank::class);
    Route::resource('agenda',KsbAgendaRapat::class);
    Route::resource('ttd',KsbTTD::class);
    Route::resource('selesai',KsbSelesai::class);
    
    Route::resource('hkmdocweb',BagHukumDokumen::class);
    
});

Route::group(['prefix'=>"operator"],function(){
    Route::resource('opdashboard',OperatorDashboard::class);
    
});

Route::group(['prefix'=>"upload"],function(){
    Route::resource('akta-notaris',UploadNotarisController::class);
    Route::resource('ijin',UploadIjinController::class);
});

Route::group(['prefix'=>"nf"],function(){
    Route::resource('restrict',RestrictController::class); 
});
