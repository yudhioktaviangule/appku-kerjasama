<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WebApi\Perusahaan\PerusahaanApi;
use App\Http\Controllers\Api\WebApi\Perusahaan\PenanggungJawabApi;
use App\Http\Controllers\Api\WebApi\Perusahaan\PenanggungJawabUploadSkApi;
use App\Http\Controllers\Api\WebApi\Web\Master\PejabatApi;
use App\Http\Controllers\Api\WebApi\Kerjasama\DokumenApi;
use App\Http\Controllers\Api\WebApi\MailingApi;
use App\Http\Controllers\Api\WebApi\Client\Kerjasama\RoleApi;
use App\Http\Controllers\Api\WebApi\Client\Dokumen\HdanKApi as HakApi;
use App\Http\Controllers\Api\WebApi\Client\Dokumen\RuangLingkupApi as RLingkupClient;

use App\Http\Controllers\Api\WebApi\Operator\DashboardApi as OpDashboard;
use App\Http\Controllers\Api\WebApi\Operator\Dokumen\DokumenApi as OpDokumen;
use App\Http\Controllers\Api\WebApi\Operator\Dokumen\TeruskanKasubagApi as OpTeruskanKasubag;

use App\Http\Controllers\Api\WebApi\Kasubag\Dokumen\DokumenApi as KsbDokumen;
use App\Http\Controllers\Api\WebApi\Kasubag\Dokumen\HdanKApi as KsbHdank;
use App\Http\Controllers\Api\WebApi\Kasubag\Aksi\NegosiasiUserApi as KsbNego;
use App\Http\Controllers\Api\WebApi\DokumenLengkapApi as DokumenData;

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
    
    Route::get("select2-pejabat/{slug}",[PejabatApi::class,'pejabat'])->name('api.walikota.select2');
    Route::resource("doc-api",DokumenApi::class);
    Route::resource("role_user",RoleApi::class);
    Route::resource("hakapi",HakApi::class);
    Route::resource("rlapi",RLingkupClient::class);
});

Route::group(['prefix'=>"operator"],function(){
    Route::resource('opdash',OpDashboard::class);
    Route::resource('opdoc',OpDokumen::class);
    Route::resource('optokasubag',OpTeruskanKasubag::class);
});
Route::group(['prefix'=>"kasubag"],function(){
    Route::resource('ksbdoc',KsbDokumen::class);
    Route::resource('ksbnego',KsbNego::class);
    Route::resource('ksbhdank',KsbHdank::class);
    
});
Route::group(['prefix'=>"dokumen-data"],function(){
    Route::resource('cekdok',DokumenData::class);
    
});

Route::group(['prefix'=>'mail'],function(){
    Route::get("berkas-dibuat-mail-api/{document_id?}",[MailingApi::class,'berkasDibuat'])->name("berkas.buat.mail");
    Route::get("berkas-dikirim-kasubag/{document_id?}/{op_id?}",[MailingApi::class,'kirimKasubag'])->name("berkas.kirim.kasubag.mail");
    Route::get("berkas-dikirim-hukum/{document_id?}/{kasubag_id?}",[MailingApi::class,'kirimHukum'])->name("berkas.kirim.hukum.mail");
    Route::get("berkas-tolak/{document_id?}/{kasubag_id?}",[MailingApi::class,'tolak'])->name("berkas.tolak.mail");
});

Route::resource("walikota-api",PejabatApi::class);