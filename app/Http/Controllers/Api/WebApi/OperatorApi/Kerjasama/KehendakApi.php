<?php

namespace App\Http\Controllers\Api\WebApi\OperatorApi\Kerjasama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Archive as Arsip;
use \Carbon\Carbon;
class KehendakApi extends Controller
{
    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getResource($document_id)
    {
        $request = $this->request;
        $type = $request->type==NULL?'':$request->type;
        if($type===''){
            return response()->json(['message'=>'harap pilih jenis pengiriman terlebih dahulu']);
        }
        $baru = Arsip::where("document_id",$document_id)->where("judul",$type)->first();
        $baru = ['arsip'=>$baru];
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
        $json=array_merge($json,$baru);
        return response()->json($json);
    }
}
