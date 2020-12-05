<?php

namespace App\Http\Controllers\Api\WebApi\Kerjasama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\View;
use Tabelku;
class DokumenApi extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth.api');
        $this->middleware('auth.api.only.client');
    }
    public function index(){
        $request = $this->request; 
        $penanggungJawab = $request->pjid;
        $data = Document::where("penanggung_jawab_id",$penanggungJawab)->get();
        return Tabelku::of($data)->addIndexColumn()->addColumn("aksi",function($json)
        {
            return "no action needed";
        })->make();
    }
    public function create(){
        $request = $this->request; 
        return response()->view("pages.dokumen.add",['pjid'=>$request->pjid]);
    }
    public function show($id=''){
        $request = $this->request; 
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