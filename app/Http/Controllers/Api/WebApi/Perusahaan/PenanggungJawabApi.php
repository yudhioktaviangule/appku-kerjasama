<?php

namespace App\Http\Controllers\Api\WebApi\Perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PenanggungJawab;
use Illuminate\Support\Facades\View;
use Tabelku As Tableku;
use App\Includes\PhotoProcessing as FileProcessing;
class PenanggungJawabApi extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth.api');
        $this->middleware('auth.api.only.client');
    }
    public function index(){
        $request = $this->request; 
        $post = $request->only('pid','uid');
        $post = json_decode(json_encode($post));
        $get  = PenanggungJawab::where("user_id",$post->uid)
                                ->where('perusahaan_id',$post->pid);
        $actionEnabled = $get->count();
        $data= $get->get();
        return Tableku::of($data)->addIndexColumn()
                    ->addColumn("aksi",function($json)use($actionEnabled){
                        $decode = json_decode($json);
                        if($actionEnabled<2){
                            return View::make("pages.penanggung_jawab.buttons_nodel",['json'=>$decode,'jsonStr'=>$json]);
                        }else{
                            return View::make("pages.penanggung_jawab.buttons",['json'=>$decode,"jsonStr"=>$json]);
                        }
                    })->make();
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
        try{
            $request = $this->request; 
            $post = $request->only('user_id','perusahaan_id','nomor_sk_jabatan','jabatan','file_sk_jabatan');
            $data = new PenanggungJawab();
            $data->fill($post);
            $data->save();
            $status=200;
            $response = [
                'message'=>'Berhasil menambah penanggung jawab',
            ];
        }catch(\Exception $e){
            $status=500;
            $response = [
                'message'=>'Terjadi Kesalahan saat Menyimpan data',
                '_e'=>$e
            ];
        }
        return response()->json($response);
    }
    public function update($id=''){
        $request = $this->request; 
    }
    public function destroy($id=''){
        $response = [];
        try{
            $status=200;
            $get = PenanggungJawab::where("id",$id);
            $data = $get->first();
            $jabatan = $data->jabatan;
            $response = ['title'=>'Hapus','icon'=>'success','message'=>"Berhasil menghapus ".$jabatan];
            try{
                $p = new FileProcessing('','');
                $file = $p->getPathX().$data->file_sk_jabatan;
                unlink($file);
                
                $response = $response;
            }catch(\Exception $n){
                $response = $response;
                $response['E_FILE'] = $n;
                
            }
            $status=200;
            $get->delete();
            
            
        }catch(\Exception $e){
            $status=500;
            $response = ['message'=>"Gagal Menyimpan ".$jabatan,'_e'=>$e];
        }
        return response()->json($response);
    }
}