<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WebApi\Perusahaan\PerusahaanApi;
use App\Http\Controllers\Api\WebApi\Perusahaan\PenanggungJawabApi;
use App\Http\Controllers\Api\WebApi\Perusahaan\PenanggungJawabUploadSkApi;
use App\Http\Controllers\Api\WebApi\Web\Master\PejabatApi;
use App\Http\Controllers\Api\WebApi\Kerjasama\DokumenApi;
use App\Http\Controllers\Api\WebApi\OperatorApi\DokumenApi as OperatorDocApi;
use App\Http\Controllers\Api\WebApi\OperatorApi\Kerjasama\ArsipApi;
use App\Http\Controllers\Api\WebApi\OperatorApi\Kerjasama\KehendakApi;
use App\Http\Controllers\Api\WebApi\MailingApi;
use App\Http\Controllers\Api\WebApi\OperatorApi\Kerjasama\SelectTwoPejabatApi;
use App\Http\Controllers\Api\WebApi\Client\Kerjasama\RoleApi;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'client'],function(){
    
    Route::resource("client-api-perusahaan",PerusahaanApi::class);
    Route::resource("client-api-penanggungjawabku",penanggungJawabApi::class);
    
    Route::get("client-api-perusahaan/{xType?}/{id?}",[PerusahaanApi::class,'uploadN'])->name('api.perusahaan.upload_doc');
    Route::get("client-api-perusahaan/open/tj/{pid?}/{uid?}",[PerusahaanApi::class,'openPenanggungJawab'])->name('api.penanggungjawab.view.modal');
    Route::get("client-api-perusahaan-c/{id}",[PerusahaanApi::class,'countss'])->name('api-perusahaan-c');
    
    Route::post("client-api-penanggungjawabku/upload/{id?}",[PenanggungJawabUploadSkApi::class,'upload'])->name('upload.sk.jabatan');
    
    Route::get("select2-walikota-api/{slug}",[PejabatApi::class,'pejabat'])->name('api.walikota.select2');
    Route::resource("doc-api",DokumenApi::class);
    Route::resource("role_user",RoleApi::class);
    
});

Route::group(['prefix'=>"operator"],function(){
    Route::resource("op_doc_api",OperatorDocApi::class);
    Route::resource("arsipapi",ArsipApi::class);
    Route::resource("selectpejabat",SelectTwoPejabatApi::class);
    Route::get("kehendak/resource/{document_id}",[KehendakApi::class,'getResource'])->name('kehendak.get.resource');
});

Route::group(['prefix'=>'mail'],function(){
    Route::get("berkas-dibuat-mail-api/{document_id?}",[MailingApi::class,'berkasDibuat'])->name("berkas.buat.mail");
    Route::get("berkas-dikirim-kasubag/{document_id?}/{op_id?}",[MailingApi::class,'kirimKasubag'])->name("berkas.kirim.kasubag.mail");
    Route::get("berkas-dikirim-hukum/{document_id?}/{kasubag_id?}",[MailingApi::class,'kirimHukum'])->name("berkas.kirim.hukum.mail");
    Route::get("berkas-tolak/{document_id?}/{kasubag_id?}",[MailingApi::class,'tolak'])->name("berkas.tolak.mail");
});

Route::resource("walikota-api",PejabatApi::class);