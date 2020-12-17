<?php

namespace App\Http\Controllers\Web\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Includes\JSFactory;
class HdankController extends Controller{
    use JSFactory;
    private $request;
    public function __construct(Request $request){
        $this->request = $request;         
        $this->middleware('auth');
        $this->middleware('only.client');
    }
    public function index(){
        $request = $this->request; 
    }
    public function create(){
        $request = $this->request; 
    }
    public function show($id=''){
        $request = $this->request; 
        $dok = Document::class;
        $dok::where("id",$id)->update(['status'=>'4']);
        $this->redirectBack("Berhasil Menyetujui Usulan dari kasubag","Dokumen",route('dokumen.index'));

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
