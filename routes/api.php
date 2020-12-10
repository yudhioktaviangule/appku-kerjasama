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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource("client-api-perusahaan",PerusahaanApi::class);
Route::resource("client-api-penanggungjawabku",penanggungJawabApi::class);

Route::get("client-api-perusahaan/{xType?}/{id?}",[PerusahaanApi::class,'uploadN'])->name('api.perusahaan.upload_doc');
Route::get("client-api-perusahaan/open/tj/{pid?}/{uid?}",[PerusahaanApi::class,'openPenanggungJawab'])->name('api.penanggungjawab.view.modal');
Route::get("client-api-perusahaan-c/{id}",[PerusahaanApi::class,'countss'])->name('api-perusahaan-c');

Route::post("client-api-penanggungjawabku/upload/{id?}",[PenanggungJawabUploadSkApi::class,'upload'])->name('upload.sk.jabatan');

Route::resource("walikota-api",PejabatApi::class);
Route::get("select2-walikota-api/{slug}",[PejabatApi::class,'pejabat'])->name('api.walikota.select2');
Route::resource("doc-api",DokumenApi::class);

Route::group(['prefix'=>"operator"],function(){
    Route::resource("op_doc_api",OperatorDocApi::class);
    Route::resource("arsipapi",ArsipApi::class);
    Route::get("kehendak/resource/{document_id}",[KehendakApi::class,'getResource'])->name('kehendak.get.resource');
});
