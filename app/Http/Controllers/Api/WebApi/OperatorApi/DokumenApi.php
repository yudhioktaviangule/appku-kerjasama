<?php

namespace App\Http\Controllers\Api\WebApi\OperatorApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\TindakLanjutDoc;
use \Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Tabelku;
class DokumenApi extends Controller{
    private $request;
    
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth.api');
    }
    private function getDoc()
    {
       
        $data = Document::get();
        
        return $data;
    }
    
    public function index(){
        $request = $this->request;
        $data = $this->getDoc();
        if($request->uid!=NULL){
            $uid = $request->uid;
        }else{
            $uid='0';
        }
        return Tabelku::of($data)
            ->addIndexColumn()
            ->addColumn('no' , function($json){
                $x = json_decode($json);
                return $x->nomor==='0'?'BELUM ADA NOMOR':$x->nomor;
            })
            ->addColumn('pengirim' , function($json){
                $x = json_decode($json,TRUE);
                $doc = new Document();
                $doc->forceFill($x);
                
                return $doc->getPenanggungJawab()->getPerusahaan()->name;
            })
            ->addColumn('tanggal' , function($json){
                $x = json_decode($json,TRUE);
                $doc = new Document();
                $doc->forceFill($x);
                $tanggal = Carbon::parse($doc->created_at)->format("d-m-Y");
                return $tanggal;
            })
            ->addColumn('tujuan' , function($json){
                $x = json_decode($json,TRUE);
                $data = new Document();
                $data->forceFill($x);
                $tujuan = $data->getPejabat();
                return $tujuan->jabatan;
            })
            ->addColumn('aksi' , function($json)use($uid){
                $x = json_decode($json);
                $document_id=$x->id;
                $c = TindakLanjutDoc::where('document_id',$document_id)->orderBy('stdoc','desc')->first();
                
                if($uid!='0'){
                    $role = User::where('id',$uid)->first();
                    $level=$role->level;
                }else{
                    $level='';
                }
                return View::make("pages.dash.operator.buttons",['json'=>$json,'type'=>$c->stdoc,'level'=>$level]);
            })->make();       
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
