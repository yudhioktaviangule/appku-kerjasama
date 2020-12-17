<?php

namespace App\Http\Controllers\Web\Kasubag;

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
        $this->middleware('role.root.kasubag');
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
        $dok::where("id",$id)->update(['status'=>'5']);
        $this->redirectBack("Berhasil Meneruskan ke Bag. Hukum","Dokumen",url('/home'));

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