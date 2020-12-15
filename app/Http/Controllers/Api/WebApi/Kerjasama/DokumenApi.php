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
     //   $this->middleware('auth.api');
       // $this->middleware('auth.api.only.client');
    }
    public function index(){
        $request = $this->request; 
        $uid = $request->uid;
        $user =\App\Models\User::where("id",$uid)->first();
        if($user!==NULL){
            $data = Document::get();
            $dt   = Tabelku ::of($data)->addIndexColumn();
            $dt->addColumn('nomor',function($json){
                $dec = json_decode($json);
                return $dec->nomor == '0' ? 'Belum ada Nomor' : $dec->nomor;
            });
            $dt->addColumn('perusahaan',function($json){
                $dec = json_decode($json,true);
                $dc = new Document();
                $dc->forceFill($dec);
                $perusahaan = $dc->getPenanggungJawab()->getPerusahaan();
                return $perusahaan->name;
            });
            $dt->addColumn('aksi',function($json){
                return "aksi";
            });
            $dt->addColumn('dinas_tujuan',function($json){
                $dec = json_decode($json,true);
                $dc = new Document();
                $dc->forceFill($dec);
                $tujuan = $dc->getPejabat();
                return $tujuan->instansi;
            });
            return $dt->make();
        }else{
            return response()->json(['error'=>'User Not Found'],404);
        }
        
    }
    public function create(){
        $request = $this->request; 
        return response()->view("pages.dokumen.api.add",['pjid'=>$request->pjid]);
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