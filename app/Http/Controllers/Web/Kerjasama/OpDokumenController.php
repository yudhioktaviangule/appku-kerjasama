<?php

namespace App\Http\Controllers\Web\Kerjasama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\TindakLanjutDoc;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class OpDokumenController extends Controller{
    private $request;
    use \App\Includes\JSFactory;
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
        $d = TindakLanjutDoc::where("document_id",$id)->where("stdoc",$status['stdoc'])->first();
        if($d==NULL):
            Document::where("id",$id)->update($post);
            $tindak = [
                'document_id' => $id,
                'keterangan'  => "Dokumen telah diberi Nomor",
                "user_id"     => Auth::id(),
                "stdoc"       => $status['stdoc']
            ];
            $tindakLanjut = TindakLanjutDoc::create($tindak);
            $u = [
                'dokumen'=>Document::where('id',$id)->first(),
                "_user" => Auth::id()
            ];

          
            dispatch(new \App\Jobs\BerkasKirimKabag($u));
            $this->redirectBack("Sukses","Update Dokumen",url('/home'));
        else:
            $this->redirectBack("Gagal","Gagal Mengpdate Dokumen",url('/home'));
        endif;
    }
    public function destroy($id=''){
        #code
    }
}