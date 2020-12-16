<?php

namespace App\Http\Controllers\Api\WebApi\Operator\Dokumen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;

class TeruskanKasubagApi extends Controller{
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
        $dc = $request->doc==NULL ? "" : $request->doc;
        $dc = Document::where("id",$dc)->first();
        $data = $dc;
        return view('pages.operator.dokumen.api.teruskankekasubag',compact('data'));
    }
    public function show($id=''){
        $request = $this->request; 
    }
    public function edit($id=''){
        $request = $this->request; 
    }
    public function store(){
        $request = $this->request; 
        $post    = $request->only("status");
        $id      = $request->document_id;
        $data    = Document::where("id",$id);         
        $cek     = $data->first();
        if($cek==NULL){
            return response()->json(['message'=>"Dokumen tidak ditemukan, Harap memasukkan data dokumen dengan benar",'isError'=>true]);
        }else{
            $data->update($post);
            return response()->json(['message'=>"Sukses. Data Dokmen dengan Nomor.$cek->nomor Telah dikirim ke Kasubag ",'iserror'=>false]);
        } 
    }
    public function update($id=''){
        $request = $this->request; 
    }
    public function destroy($id=''){
        #code
    }
}
