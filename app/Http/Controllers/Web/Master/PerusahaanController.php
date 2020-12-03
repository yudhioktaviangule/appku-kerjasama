<?php

namespace App\Http\Controllers\Web\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Includes\PhotoProcessing as FileProcessing;
use App\Models\Perusahaan;
use App\Models\PenanggungJawab;
class PerusahaanController extends Controller{
    private $request;
    use \App\Includes\JSFactory;
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
    }
    public function edit($id=''){
        $request = $this->request; 
    }
    public function store(){
        try{
            $id = Auth::id();
            $request                     = $this->request; 
            $pj                          = $request->only("jabatan","nomor_sk_jabatan");
            $kantor                      = $request->only('user_id','jenis',"name",'alamat','email','telepon','nomor_ijin_usaha','nomor_akta_notaris');
            $kantor['file_ijin_usaha']   = "ijin_usaha/";
            $kantor['file_akta_notaris'] = "akta_notaris/";
            $kantor['user_id']           = Auth::id();
            $perusahaan                  = Perusahaan::create($kantor);
            $pj['perusahaan_id']         = $perusahaan->id;
            $pj['user_id']               = Auth::id();
            $pj['file_sk_jabatan']       = 'sk_jabatan/';
            $jabatan                     = PenanggungJawab::create($pj);
            $this->redirectBack("Data Perusahaan Berhasil disimpan","Simpan",url('/home'));
        }catch(\Exception $e){
            dd($e);
        }
        

        



    }
    public function update($id=''){
        try{
            $request = $this->request; 
            $post = $request->only("name",'jenis','email','nomor_ijin_usaha','nomor_akta_notaris','telepon','alamat');
            Perusahaan::where("id",$id)->update($post);
            $this->redirectBack("Data Perusahaan Berhasil diubah","Ubah Data",url('/home'));
            
        }catch(\Exception $e){

        }
    }
    public function destroy($id=''){
        Perusahaan::where("id",$id)->delete();
        $this->redirectBack("Data Perusahaan Berhasil dihapus","Hapus Data",url('/home'));
    }
}