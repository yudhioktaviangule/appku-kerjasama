<?php

namespace App\Http\Controllers\Api\WebApi\Web\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pejabat;
use Illuminate\Support\Facades\View;
use Tabelku;
class PejabatApi extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth.api');
        $this->middleware('auth.api.kasubag.root')->except('pejabat');
    }
    public function index(){
        $request = $this->request; 
        $data = Pejabat::orderBy('aktif','desc')->get();
        return Tabelku::of($data)
                    ->addIndexColumn()
                    ->addColumn("aksi",function($json){
                        return View::make("pages.pejabat.buttons",['json'=>$json]);
                    })
                    ->addColumn("status_aktif",function($json){
                        $decode=json_decode($json);
                        if($decode->aktif==='0'){
                            return "Non-Aktif";
                        }else{
                            return "Aktif";

                        }
                    })
                    ->make();
    }
    public function create(){
        $request = $this->request; 
        return response()->view("pages.pejabat.add");
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

    public function pejabat()
    {
        $request = $this->request;
        if($request->q!=NULL):
            $search  = $request->only("q");
            $search  = $search['q']; 
            $in = Pejabat::select('id')->where("name",'like',"%$search%")
            ->orWhere("jabatan",'like',"%$search%")->get();
            $id = [];
            foreach ($in as $key => $value) {
                $id[] = $value->id;
            }

            $pejabat = Pejabat::where('aktif','1')->whereIn('id',$id)
                            ->get();
        else:    
            $pejabat = Pejabat::where('aktif','1')->get();
        endif;

        $data    = [];
        foreach ($pejabat as $key => $value) {
            $data[]=[
                'id'=>$value->id,
                'name'=>$value->jabatan,
                'text'=>$value->name,
            ];
        }

        return response()->json(['results'=>$data]);
    }
}
