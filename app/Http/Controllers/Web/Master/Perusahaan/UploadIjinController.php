<?php

namespace App\Http\Controllers\Web\Master\Perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Includes\PhotoProcessing as FileProcessing;
use App\Models\Perusahaan;
class UploadIjinController extends Controller{

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
        $post = $request->only('pid','file_ijin');
        
        $file = new Fileprocessing('ijin_usaha',$post['file_ijin']);
        $fileName = $file->getFilename();
        $fileName = $file->setName($post['pid'],$fileName);
        
        $file->upload();
        $update = ['file_ijin_usaha'=>$fileName];
        Perusahaan::where("id",$post['pid'])->update($update);
        $this->redirectBack("Upload File IJIN Usaha Berhasil","Upload Sukses",url('/home'));  
    }
    public function update($id=''){
        $request = $this->request; 
    }
    public function destroy($id=''){
        #code
    }
}
