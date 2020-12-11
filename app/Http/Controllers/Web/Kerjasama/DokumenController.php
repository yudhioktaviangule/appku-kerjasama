<?php

namespace App\Http\Controllers\Web\Kerjasama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document as Dokumen;
use App\Models\TindakLanjutDoc as Tindakan;
use App\Models\PenanggungJawab;
use Illuminate\Support\Facades\Auth;
use App\Jobs\BerkasDibuat;

class DokumenController extends Controller{
    private $request;
    use \App\Includes\JSFactory;
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
        try{
            $store = $request->only('ketentuan_hukum','pelaksanaan','pejabat_id','penanggung_jawab_id','tentang','maksud','tujuan','lingkup','pihak_pertama','pihak_kedua');
            $object = json_decode(json_encode($store));
            $cek = PenanggungJawab::where("id",$object->penanggung_jawab_id)->first();
            if($cek==NULL){
                $this->redirectBack("Akses Ditolak","Simpan",route('pejabat.index'));
            }else{
                $tambahan = ['nomor'=>"0"];
                $data = array_merge($store,$tambahan);
                $d = Dokumen::create($data);
                $tindakan = Tindakan::create([
                    'document_id' => $d->id,
                    'user_id'     => Auth::id(),
                    'stdoc'       => '0',
                    'keterangan'  => 'Dokumen Baru dibuat'

                ]);
               
                $this->redirectBack("Sukses","Simpan",route('dokumen.index'));
            }

        }catch(\Exception $e){
            $p = $request->input();
            dd($e);
        }
    }
    public function update($id=''){
        $request = $this->request; 
    }
    public function destroy($id=''){
        #code
    }
}