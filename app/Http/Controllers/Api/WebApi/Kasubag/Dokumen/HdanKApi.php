<?php

namespace App\Http\Controllers\Api\WebApi\Kasubag\Dokumen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hakdankewajiban as Hdank;

class HdanKApi extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth.api');
        $this->middleware('auth.api.kasubag.root');

    }
    public function index(){
        $request = $this->request; 
    }
    public function create(){
        $request = $this->request; 
    }
    public function show($id=''){
        $request = $this->request; 
        $data    = Hdank::where("document_id",$id)->get();
        return response()->json($data);
    }
    public function edit($id=''){
        $request = $this->request; 
    }
    public function store(){
        
        $request = $this->request; 
        $data = $request->only('document_id','nilai','jenis','pihak');
        $data['status'] = '1';
        $cek = Hdank::where("nilai",$data['nilai'])
            ->where('jenis',$data['jenis'])
            ->where('pihak',$data['pihak'])
            ->where('document_id',$data['document_id'])->first();
        if($cek!=NULL):
            return response()->json([
                'isError' => true,
                'message' => $data['nilai']." Sudah pernah diinput sebelumnya",
            ],JSON_PRETTY_PRINT);
        endif;
        $hnk = new Hdank();
        $hnk->fill($data);
        $hnk->save();
        return response()->json([
            'isError' => false,
            'message' => $data['nilai']." Berhasil dimasukkan",
        ],JSON_PRETTY_PRINT);
    }
    public function update($id=''){
        $request = $this->request; 
    }
    public function destroy($id=''){
        $request = $this->request; 
        $permanent = $request->permanent==NULL?false:true;
        $q = Hdank::where("id",$id);
        $cek = $q->first();
        if($cek!=NULL){
            if(!$permanent):
                $q->update(['deleted'=>'2']);
            else:
                $q->delete();
            endif;
        }else{
            return response()->json([
                'isError' => true,
                'message' =>"Data Tidak ditemukan! Gagal dihapus",
            ]);
        }

         return response()->json([
            'isError' => false,
            'message' => "Data Berhasil Dihapus",
        ]);

    }
}