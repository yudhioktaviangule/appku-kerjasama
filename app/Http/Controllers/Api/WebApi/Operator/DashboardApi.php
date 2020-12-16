<?php

namespace App\Http\Controllers\Api\WebApi\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Hakdankewajiban as Hdank;
use App\Models\RuangLingkup as RuLing;
use Illuminate\Support\Facades\View as Fiw;
use Carbon\Carbon;
use Tabelku;
class DashboardApi extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth.api');
        $this->middleware('role.operator.api');

    }


    public function getIDDocFromHdankRuLing()
    {
        $data_hdnk = Hdank::selectRaw("DISTINCT(document_id) AS id")->get();
        $id        = [];
        foreach ($data_hdnk as $key => $value) {
            $id[]=$value->id;
        }
        $dataRuling = Ruling::selectRaw("DISTINCT(document_id) AS id")->get();
        
        foreach ($dataRuling as $key => $value) {
            $idx = $value->id;
            $adaDiHdank = false;
            foreach ($id as $key_id => $value_id) {
                if($value_id==$idx){
                    $adaDiHdank=true;
                }
            }
            if(!$adaDiHdank):
                $id[]=$value->id;
            endif;
        }

        return $id;

    }

    public function index(){
        $request = $this->request; 
        $ids     = $this->getIDDocFromHdankRuLing(); 
        $data    = Document::whereIn('id',$ids)->whereIn('status',['0','1','7'])->get();
        $table   = Tabelku::of($data)->addIndexColumn();
        
        $table->addColumn("aksi",function($json){
            $data = json_decode($json);
            return Fiw::make('pages.operator.dokumen.api.button',['data'=>$data]);
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
