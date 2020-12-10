<?php

namespace App\Http\Controllers\Api\WebApi\OperatorApi\Kerjasama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use \Carbon\Carbon;
class KehendakApi extends Controller
{
    public function getResource($document_id)
    {
        $data = Document::where("id",$document_id)->first();
        $json = [
            'dokumen'=>$data,
            'pejabat'=>$data->getPejabat(),
            'tanggal' => Carbon::parse($data->created_at)->format('d'),
            'bulan' => Carbon::parse($data->created_at)->format('m'),
            'tahun' => Carbon::parse($data->created_at)->format('Y'),
            'user_query'=>[
                            'jabatan'=>$data->getPenanggungJawab(),
                            'perusahaan'=>$data->getPenanggungJawab()->getPerusahaan(),
                            'user'=>$data->getPenanggungJawab()->getPerusahaan()->getUser(),
                            ],
                        ];
        return response()->json($json);
    }
}
