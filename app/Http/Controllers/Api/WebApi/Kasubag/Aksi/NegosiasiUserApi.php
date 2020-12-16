<?php

namespace App\Http\Controllers\Api\WebApi\Kasubag\Aksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
class NegosiasiUserApi extends Controller{
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
        $id = $request->doc==NULL?'':$request->doc;
        $data = Document::where("id",$id)->first();
        return response()->view('pages.kasubag.nego',compact('data'));
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