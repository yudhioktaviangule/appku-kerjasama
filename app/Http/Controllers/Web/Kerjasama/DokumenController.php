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
            $post    = $request->only("penanggung_jawab_id",'maksud_dan_tujuan','tentang','pejabat_id','pelaksanaan','ketentuan_umum');
            $arr     = ['nomor' => '0','status' => '0'];
            $post    = array_merge($post,$arr); 
            $dokumen = new Dokumen();
            $dokumen->fill($post);
            $dokumen->save();
            $dataTindak = [
                'document_id' => $dokumen->id,
                'user_id'     => Auth::id(),
                'keterangan'  => 'Dokumen di registrasi',
                'stdoc'       => '0'
            ];
            $tindak = new Tindakan();
            $tindak->fill($dataTindak);
            $tindak->save();
            $this->redirectBack("Data Dokumen tentang $post[tentang] telah terkirim","Kirim Dokumen",route('dokumen.index'));

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