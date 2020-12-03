<?php

namespace App\Http\Controllers\Api\WebApi\Perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\PenanggungJawab;
use App\Includes\PhotoProcessing as FileProcessing;
class PenanggungJawabUploadSkApi extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth.api');
    }
    public function upload($id='')
    {
        try{
            $request = $this->request;
            $data  = $request->only("file_sk");
            
            $file = new FileProcessing('sk_jabatan',$data['file_sk']);
            $fileName = $file->getFileName();
            $fileName = $file->setName(Str::uuid()."$id",$fileName);
            $file->upload();
            $update = ['file_sk_jabatan' => $fileName];
            PenanggungJawab::where("id",$id)->update($update);
            $update['id'] = $id;
            $done = ['message'=>'Berhasil Upload Data','post'=>$update];
            $state=200;
        }catch(\Exception $e){
            $done = ['message'=>'Gagal upload Data','post'=>$update,'e'=>$e];
            $state=500;
        }
        return response()->json($done,$state);
    }
}