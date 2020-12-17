<?php

namespace App\Http\Controllers\Api\WebApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Document;
class DokumenLengkapApi extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth.api');
    }
    public function index(){
        $request = $this->request; 
    }
    public function create(){
        $request = $this->request; 
    }
    public function show($id=''){
        $request = $this->request; 
        $dokumen = Document::where("id",$id)->first();
        $data = [
            'dokumen' => $dokumen,
            "dari" => [
                'penanggung_jawab' => $dokumen->getPenanggungJawab(),
                'perusahaan' => $dokumen->getPenanggungJawab()->getPerusahaan(),
                'user' => $dokumen->getPenanggungJawab()->getPerusahaan()->getUser(),
            ]
        ];
       return  response()->json($data);
    }
    public function edit($id=''){
        $request = $this->request; 
    }
    public function store(){
        $request = $this->request; 
    }
    public function update($id=''){
        $request = $this->request; 
    }
    public function destroy($id=''){
        #code
    }
}
