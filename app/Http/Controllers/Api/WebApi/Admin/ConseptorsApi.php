<?php

namespace App\Http\Controllers\Api\WebApi\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\View as Fiw;
use Tabelku;
class ConseptorsApi extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth.api.conseptor');
    }
    public function index(){
        $request = $this->request; 
        $data    = Document::where("status",'8')->get();
        //$dt      = Tabelku::of($data)->addIndexColumn();
        
        $table   = Tabelku::of($data)->addIndexColumn();
        
        $table->addColumn("aksi",function($json){
            $data = json_decode($json);
            return Fiw::make('pages.konseptor.api.buttons',compact('data'));
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