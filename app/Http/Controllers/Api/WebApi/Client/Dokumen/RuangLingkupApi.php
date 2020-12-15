<?php

namespace App\Http\Controllers\Api\WebApi\Client\Dokumen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RuangLingkup as rl;
class RuangLingkupApi extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth.api');
        $this->middleware('auth.api.only.client');
    }
    public function index(){
        $request = $this->request; 
        $doc     = $request->doc;
        
        if($doc===NULL):
            return response()->json([]);
        endif;

        $data = rl::where("document_id",$doc)->get();
        return response()->json($data);
    }
    public function create(){
        $request = $this->request; 
        return response()->view("pages.ruang_lingkup.api.add");
    }
    public function show($id=''){
        $request = $this->request; 
    }
    public function edit($id=''){
        $request = $this->request; 
    }
    public function store(){
        $request = $this->request; 
        $post = $request->only("lingkup","document_id",'status');
        $cek  = rl::where("lingkup",$post['lingkup'])
                        ->where("document_id",$post['document_id'])->first();
        if($cek!=NULL){
            return response()->json(['aaa'=>'aaa'],500);
        }
        $rl   = new rl();
        $rl->fill($post);
        $rl->save();

    }
    public function update($id=''){
        $request = $this->request; 
    }
    public function destroy($id=''){
        rl::where("id",$id)->delete();
    }
}