<?php

namespace App\Http\Controllers\Web\Kasubag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AgendaRapat as Agenda;
use App\Models\Document;
use App\Includes\JSFactory;
class AgendaRapatController extends Controller{
    private $request;
    use JSFactory;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth');
        $this->middleware('role.root.kasubag');
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
        $request = $this->request; 
        try{
            $post = $request->only("valJSON");
            $data = json_decode($post['valJSON'],true);
            $agenda_data = [
                'tanggal_rapat' => "$data[tanggal] $data[waktu]",
                'tempat' =>$data['tempat'],
                'document_id' =>$data['document_id'],

        
            ];
            
            $agenda = new Agenda();
        
            $agenda->fill($agenda_data);
            $agenda->save();
            $id = $agenda->document_id;
            Document::where('id',$id)->update(["status"=>'7']);
            $this->redirectBack("Berhasil Membuat Agenda Rapat","Dokumen",url('/home'));
        }catch(\Exception $e){
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