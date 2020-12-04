<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Master\PerusahaanController;
use App\Http\Controllers\Web\Master\Perusahaan\UploadNotarisController;
use App\Http\Controllers\Web\Master\Perusahaan\UploadIjinController;
use App\Http\Controllers\Web\Master\PejabatController;
use App\Http\Controllers\Web\RestrictController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>"master"],function(){
    Route::resource('perusahaan',PerusahaanController::class);
    Route::resource('pejabat',PejabatController::class);
});
Route::group(['prefix'=>"upload"],function(){

    Route::resource('akta-notaris',UploadNotarisController::class);
    Route::resource('ijin',UploadIjinController::class);
});
Route::group(['prefix'=>"nf"],function(){
    Route::resource('restrict',RestrictController::class);
    
});