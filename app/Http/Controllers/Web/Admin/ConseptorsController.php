<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConseptorsController extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth');
        $this->middleware('role.root.kasubag.operator');
    }
    public function index(){
        $request = $this->request; 

        return view('pages.konseptor.index');
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
        $post = $request->only("isi");
        echo $post['isi'];
        
    }
    public function update($id=''){
        $request = $this->request; 
    }
    public function destroy($id=''){
        #code
    }
}