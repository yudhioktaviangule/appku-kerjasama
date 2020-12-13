<?php

namespace App\Http\Controllers\Web\Kerjasama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TindakLanjutDoc as Tlanjut;
use App\Models\Document;
use App\Models\User;
use App\Includes\JSFactory;
class KasubagDokumenController extends Controller{
    use JSFactory;
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth');
    }
    public function index(){
        $request = $this->request; 
    }
    public function create(){
        $request = $this->request; 
    }
    public function show($id=''){
        $request = $this->request; 
        $p = ['stdoc'=>'99','document_id'=>$id,'user_id'=>Auth::id()];
        $dokumen      = Document::where('id',$id)->first()->toArray();
        $dokumen['type'] = 99;
        $dataJSONToSend=json_encode($dokumen);
        //Document::where("id",$id)->delete();
        Tlanjut::create($p);
        $this->redirectBackWithLStorage($dataJSONToSend,"Sukses","Tolak Dokumen",url('/home'));
    }
    public function edit($id=''){
        $request = $this->request; 
    }
    public function store(){
        $request = $this->request; 
    }
    public function update($id=''){
        $request = $this->request; 
        $post = $request->only("nomor",'pihak_pertama','pihak_kedua');
        $status = $request->only("stdoc");
        $d = Tlanjut::where("document_id",$id)->where("stdoc",$status['stdoc'])->first();
        if($d==NULL):
            $tindak = [
                'document_id' => $id,
                'keterangan'  => "-",
                "user_id"     => Auth::id(),
                "stdoc"       => $status['stdoc']
            ];
            $tindakLanjut = Tlanjut::create($tindak);
            
            $dokumen         = Document::where('id',$id)->first()->toArray();
            $dokumen['type'] = intval($status['stdoc']);
            $dataJSONToSend=json_encode($dokumen);
            $this->redirectBackWithLStorage($dataJSONToSend,"Sukses","Tindak Lanjut",url('/home'));

        endif;
    }
    public function destroy($id=''){
        #code
    }
}