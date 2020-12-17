<?php

namespace App\Http\Controllers\Api\WebApi\Client\Dokumen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hakdankewajiban AS HdanK;
use App\Models\Document;

class HdanKApi extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth.api');
        $this->middleware('auth.api.only.client');
    }
    public function index(){
        $request = $this->request; 
        $document_id = $request->doc==NULL?'':$request->doc;
        $data = HdanK::where('document_id',$document_id)->whereIn("deleted",["0","2","1"])->get();
        return response()->json([
            'post'=>$request->input(),
            'data'=>$data
        ]);
    }
    public function create(){
        $request = $this->request; 
        $id = $request->doc==NULL?"":$request->doc;
        $dokumen = Document::where("id",$id)->first();

        return response()->view('pages.hak_dan_kewajiban.api.add',compact("dokumen"));
    }
    public function show($id=''){
        $request = $this->request; 
    }
    public function edit($id=''){
        $request = $this->request; 
    }
    public function store(){
        $request = $this->request; 

        $post = $request->only("jenis",'document_id','nilai','pihak'); 
        $cek  = HdanK::where('jenis',$post['jenis'])
            ->where("document_id",$post['document_id'])
            ->where("nilai",$post['nilai'])
            ->where("pihak",$post['pihak'])->first();
        if($cek==NULL){
            $hnk = new HdanK();
            $hnk->fill($post);
            $hnk->save();
            return response()->json([
                'message' => "Berhasil Menyimpan Data",
                'title'   => strtoupper("$post[jenis]"),
                'icon'    => "success",
                "code"    => 200
            ]);
        }else{
            return response()->json([
                'message' => "Tidak diijinkan menginput $post[jenis] sama yang pernah diinput untuk PIHAK ".strtoupper($post['pihak']),
                'title'   => strtoupper("$post[jenis]"),
                'icon'    => "error",
                "code"    => 500
            ]);
        }
    
    }
    public function update($id=''){
        $request = $this->request; 
    }
    public function destroy($id=''){
        HdanK::where("id",$id)->delete(); 
    }
}
