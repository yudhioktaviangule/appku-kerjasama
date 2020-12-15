<?php

namespace App\Http\Controllers\Api\WebApi\Client\Kerjasama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\PenanggungJawab;

class RoleApi extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth.api');
        $this->middleware('auth.api.only.client');
    }
    public function index(){
        $request = $this->request; 
    }
    public function create(){
        $request = $this->request; 
    }
    public function show($id=''){
        $request = $this->request; 
        $data = Perusahaan::where("user_id",$id)->get();
        return response()->json($data);
    }
    public function edit($id=''){
        $request = $this->request; 
        $data = PenanggungJawab::where("perusahaan_id",$id)->get();
        return response()->json($data);
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