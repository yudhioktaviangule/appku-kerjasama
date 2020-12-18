<?php

namespace App\Http\Controllers\Web\Kasubag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;

use App\Includes\JSFactory;

class SiapDitandatanganiController extends Controller{
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
        Document::where("id",$id)->update(['status'=>'8']);
        $this->redirectBack("Dokumen Siap ditanda tangani, Silahkan masuk ke menu konseptor untuk membuat Pernyataan Kehendak, Nota Kesepakatan dan Perjanjian Kerjasama","Dokumen",url('/home'));       
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