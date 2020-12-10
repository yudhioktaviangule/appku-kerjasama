<?php

namespace App\Http\Controllers\Api\WebApi\OperatorApi\Kerjasama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\TindakLanjutDoc;
use Illuminate\Support\Facades\View;
use Tabelku;
class ArsipApi extends Controller{
    private $request;
    
    public function __construct(Request $request){
        $this->request = $request; 
        //$this->middleware('auth');
    }
    private function getDoc()
    {
       
        $data = Document::get();
        $data = $this->getLastState($data);
        return $data;
    }

    public function getLastState($data)
    {
        $dataOK = [];
        $tindak = null;
        foreach ($data as $key => $value) {
            $tindak = $value->tindakanTerakhir(); 
            if($tindak->stdoc==='10'){
                $dataOK[] = $value->toArray();
            }
        }
        
        $dataOK = Document::hydrate($dataOK);
        return $dataOK;
    }
    public function index(){
        $request = $this->request;
        $data = $this->getDoc(); 
        
        return Tabelku::of($data)
            ->addIndexColumn()
            ->addColumn('aksi' , function($json){
                return View::make('pages.arsip.components.button');
            })
            ->addColumn('instansi' , function($json){
                $data = json_decode($json,TRUE);
                $dec = new Document();
                $dec->forcefill($data);
                return $dec->getPenanggungJawab()->getPerusahaan()->name;
            })
            ->make();  
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