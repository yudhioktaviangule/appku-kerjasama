<?php

namespace App\Http\Controllers\Api\WebApi\Operator\Dokumen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\TindakLanjutDoc;
class DokumenApi extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth.api');
        $this->middleware('role.operator.api');
    }
    public function index(){
        $request = $this->request; 
    }
    public function create(){
        $request = $this->request; 
        $doc = $request->doc;
        if($doc==NULL){
            echo "NOT FOUND DATA";
        }else{
            $doc = Document::where("id",$doc)->first();
            if($doc!=NULL):
                return response()->view('pages.operator.dokumen.api.nomor',['doc'=>$doc]);
            else:
                return 'DOCUMENT NOT FOUND';
            endif;
        }
    }
    public function show($id=''){
        $request = $this->request; 
    }
    public function edit($id=''){
        $request = $this->request; 
    }
    public function store(){
        $request = $this->request; 

        $post = $request->only("nomor");
        $id   = $request->document_id;
        $data = Document::where("id",$id);
        $get  = $data->first();
        if($get!=NULL):
            $post['status']="1";
            $data->update($post);
            return response()->json(['message'=>"Ubah Nomor Berhasil","isError"=>false]);
        else:
            return response()->json(['message'=>"Ubah Nomor Gagal, Data Dokumen Tidak Ditemukan","isError"=>true]);

        endif;

    }
    public function update($id=''){
        $request = $this->request; 
    }
    public function destroy($id=''){
        
    }
}