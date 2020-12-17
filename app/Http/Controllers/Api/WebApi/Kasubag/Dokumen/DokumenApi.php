<?php

namespace App\Http\Controllers\Api\WebApi\Kasubag\Dokumen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\View as Fiw;
use Tabelku;

class DokumenApi extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth.api');
        $this->middleware('auth.api.kasubag.root');
    }
    public function index(){
        $request = $this->request; 
        Document::where("status",'2')->update(['status'=>'3']);
        $data    = Document::whereIn('status',['2','3','4','5','6','7','8'])->get();
        $table   = Tabelku::of($data)->addIndexColumn();
        
        $table->addColumn("aksi",function($json){
            $data = json_decode($json);
            return Fiw::make('pages.kasubag.button',['data'=>$data]);
        });
        $table->addColumn("nomor",function($json){
            $dec   = json_decode($json);
            $nomor = $dec->nomor; 
            
            return $nomor=='0'?"-":$nomor;
        });
        $table->addColumn("instansi",function($json){
            $dec      = json_decode($json,true);
            $dokumen  = new Document();
            $dokumen->forceFill($dec);
            $instansi = $dokumen->getPenanggungJawab()->getPerusahaan(); 
            return $instansi->name;
        });
        $table->addColumn("dinas_tujuan",function($json){
            $dec      = json_decode($json,true);
            $dokumen  = new Document();
            $dokumen->forceFill($dec);
            $instansi = $dokumen->getPejabat(); 
            return $instansi->jabatan;
        });
        return $table->make();
    }
    public function create(){
        $request = $this->request; 
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
