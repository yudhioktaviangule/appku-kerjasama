<?php

namespace App\Http\Controllers\Api\WebApi\OperatorApi\Kerjasama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class SelectTwoPejabatApi extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth.api');
        $this->middleware('role.operator.api');
    }
    public function index(){
        
        $request = $this->request;
        if($request->q!=NULL):
            $search  = $request->only("q");
            $search  = $search['q']; 
            $in = User::select('id')->where("name",'like',"%$search%")
            ->orWhere("email",'like',"%$search%")->limit(5)->get();

            $id = [];
            foreach ($in as $key => $value) {
                $id[] = $value->id;
            }

            $pejabat = User::where('level','kasubag')->whereIn('id',$id)->get();
        else:    
            $pejabat = User::where('level','kasubag')->limit(5)->get();
        endif;

        $data    = [];
        foreach ($pejabat as $key => $value) {
            $data[]=[
                'id'=>$value->id,
                'name'=>strtoupper($value->jabatan),
                'text'=>$value->name,
            ];
        }
        return response()->json($data);
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
    }
    public function update($id=''){
        $request = $this->request; 
    }
    public function destroy($id=''){
        #code
    }
}
