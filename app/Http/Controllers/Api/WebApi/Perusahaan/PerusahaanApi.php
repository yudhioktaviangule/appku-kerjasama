<?php

namespace App\Http\Controllers\Api\WebApi\Perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\View;
use Tabelku;
class PerusahaanApi extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth.api');
    }
    public function index(){
        $request = $this->request; 
        $id = $request->uid;
        $ntype = $request->type==NULL?true:false;
    
        $data = Perusahaan::where('user_id',$id)->get();
        if($ntype):
            $table = Tabelku::of($data)->addIndexColumn();
            $table->addColumn('aksi',function($json){
                return View::make('pages.dash.clients.buttons',['json'=>$json]);
            });
            return $table->make();
        else:
            return response()->json($data);
        endif;
    }
    public function create(){
        $request = $this->request; 
        $user_id = $request->uid;
        return response()->view('pages.perusahaan.add',['uid'=>$user_id]);
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
    public function uploadN($type='akta',$id='')
    {
        $data = Perusahaan::where("id",$id)->first();
        
        return response()->view("pages.dash.clients.{$type}",['data'=>$data]);
        
    }
    public function openPenanggungJawab($perusahaan_id='',$user_id='')
    {
        return response()->view("pages.penanggung_jawab.index",['pid'=>$perusahaan_id,'uid'=>$user_id]);   
    }
    public function countss($uid)
    {
        $data = Perusahaan::where("user_id",$uid)->count();
        return response()->json(['count'=>$data]);
    }
}