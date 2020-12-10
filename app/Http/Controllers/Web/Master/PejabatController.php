<?php

namespace App\Http\Controllers\Web\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pejabat;
class PejabatController extends Controller{
    private $request;
    use \App\Includes\JSFactory;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth');
        $this->middleware('role.root.kasubag');
    }
    public function index(){
        $request = $this->request; 
        return view('pages.pejabat.index');
    }
    public function create(){
        $request = $this->request; 
    }
    public function show($id=''){
        $request = $this->request; 
        $post['aktif']='0';
        Pejabat::where("id",$id)->update($post);
        $this->redirectBack("Status = Non-Aktif","Ubah Status",route('pejabat.index'));
    }
    public function edit($id=''){
        
        $request = $this->request; 
        $post['aktif']='1';
        Pejabat::where("id",$id)->update($post);
        $this->redirectBack("Status = Aktif","Ubah Status",route('pejabat.index'));
    }
    public function store(){
        try{
            $request = $this->request; 
            $post = $request->only('name','jabatan','aktif','instansi');
            Pejabat::create($post);
            $this->redirectBack("Data Pejabat Berhasil disimpan","Simpan",route('pejabat.index'));
        }catch(\Exception $e){
            $this->redirectBack("Data Pejabat Gagal disimpan","Gagal Disimpan",route('pejabat.index'));
        }
        
    }
    public function update($id=''){
        try{
            $request = $this->request; 
            $post = $request->only('name','jabatan','aktif','instansi');
            Pejabat::where("id",$id)->update($post);
            $this->redirectBack("Data Pejabat Berhasil diubah","Ubah",route('pejabat.index'));
        }catch(\Exception $e){
            $this->redirectBack("Data Pejabat Gagal diubah","Gagal Ubah",route('pejabat.index'));

        }

    }
    public function destroy($id=''){
        Pejabat::where('id',$id)->delete();
        $this->redirectBack("Data Pejabat Berhasil dihapus","Simpan",route('pejabat.index'));
        #code
    }
    
}