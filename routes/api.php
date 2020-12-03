<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WebApi\Perusahaan\PerusahaanApi;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource("client-api-perusahaan",PerusahaanApi::class);

