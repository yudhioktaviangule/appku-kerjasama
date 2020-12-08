<?php

namespace App\Http\Controllers\Api\WebApi\Kerjasama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Includes\StateDokumen as Status;
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
        $data = Document::whereIn("penanggung_jawab_id",function($query)use($request){
            $query->select('id')->from("penanggung_jawabs")->whereIn('perusahaan_id',
                function($query2)use($request){
                    $query2->select("id")->from("perusahaans")
                        ->where('user_id',$request->pjid);
                });
        })->get();
        return Tabelku::of($data)->addIndexColumn()
        ->addColumn("nomor",function($json)
        {   
            $dec = json_decode($json);
            $dec = $dec->nomor=='0'?"Belum Ada":$dec->nomor;
            
            return $dec;
        })
      
        ->addColumn("perusahaan",function($json)
        {
            $decode = json_decode(json_encode($json),TRUE);
            $doc=new Document();
            $doc->forceFill($decode);
            return $doc->getPenanggungJawab()->getPerusahaan()->name;
        })
        ->addColumn("tujuan",function($json)
        {
            $decode = json_decode(json_encode($json),TRUE);
            $doc=new Document();
            $doc->forceFill($decode);
            $p = $doc->getPejabat();
            $data = $p->name."({$p->jabatan})";
            return $data;
        })
        ->addColumn("aksi",function($json)
        {
            $decode = json_decode(json_encode($json),TRUE);
            $doc=new Document();
            $doc->forceFill($decode);
            $state = new Status();
            $data = $state->getStateDoc($doc);
            return $data;
        })

        
        ->addColumn("keterangan",function($json)
        {
            $decode = json_decode(json_encode($json),TRUE);
            $doc=new Document();
            $doc->forceFill($decode);
            $state = new Status();
            $data = $state->keterangan($doc);
            return $data;
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