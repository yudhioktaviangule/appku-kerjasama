<?php

namespace App\Http\Controllers\Api\WebApi\Perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tabelku;
class PerusahaanApi extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        //$this->middleware('auth.api');
    }
    public function index(){
        $request = $this->request; 
    }
    public function create(){
        $request = $this->request; 
        $user_id = $request->uid;
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