<?php

namespace App\Http\Controllers\Web\Master\Perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Includes\PhotoProcessing as FileProcessing;
use App\Models\Perusahaan;
class UploadNotarisController extends Controller{

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
        $uuidx= Str::uuid();
        $request = $this->request; 
        $post = $request->only('pid','file_akta');
        
        $file = new Fileprocessing('akta_notaris',$post['file_akta']);
        $fileName = $file->getFilename();
        $fileName = $file->setName($uuidx.$post['pid'],$fileName);
        
        $file->upload();
        $update = ['file_akta_notaris'=>$fileName];
        Perusahaan::where("id",$post['pid'])->update($update);
        $this->redirectBack("Upload File Akta Notaris Berhasil","Upload Sukses",url('/home'));       
    }
    public function update($id=''){
        $request = $this->request; 
    }
    public function destroy($id=''){
        #code
    }
}