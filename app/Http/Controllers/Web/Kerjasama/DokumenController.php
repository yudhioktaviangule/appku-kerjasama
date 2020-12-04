<?php

namespace App\Http\Controllers\Web\Kerjasama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DokumenController extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth');
        $this->middleware('only.client');
    }
    public function index(){
        $request = $this->request; 
        return view('pages.dokumen.index');
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
    }
    public function destroy($id=''){
        #code
    }
}