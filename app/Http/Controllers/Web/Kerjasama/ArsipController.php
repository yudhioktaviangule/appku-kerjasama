<?php

namespace App\Http\Controllers\Web\Kerjasama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Archive;
use App\Includes\JSFactory;

class ArsipController extends Controller{
    private $request;
    use JSFactory;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth');
        $this->middleware('role.operator.web');
    }
    public function index(){
        $request = $this->request; 
        return view('pages.arsip.index');

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
        $post  = $request->only("judul",'isi','document_id');
        echo $post['isi'];
        $cek = Archive::where("document_id",$post['document_id'])->where('judul',$post['judul'])->first();
        if($cek==NULL){
            Archive::create($post);        
        }else{
            Archive::where('id',$cek->id)->update($post);
        }
        $this->redirectBack("Dokumen Selesai dibuat","Dokumen",route('arsip.index'));
    }
    public function update($id=''){
        $request = $this->request; 
    }
    public function destroy($id=''){
        #code
    }
}
