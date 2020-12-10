<?php

namespace App\Http\Controllers\Web\Kerjasama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Includes\JSFactory;
class ArsipController extends Controller{
    private $request;
    use JSFactory;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth');
    }
    public function index(){
        $request = $this->request; 
        return view('pages.arsip.index');

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
