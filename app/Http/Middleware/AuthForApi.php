<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class AuthForApi
{
    
    public function handle(Request $request, Closure $next)
    {
        $header = $request->headers->has("Auth");
        $validation = true;
        if($header){
            $myHeader = $request->header("Auth");
            $header = preg_replace('/(Bearer )/','',$myHeader);
            $data = User::whereRaw('MD5(id)=?',$header)->first();
            if($data==NULL):
                $validation=false;
            endif;
        }else{
            $validation=false;
        }
        if($validation){
            return $next($request);
        }else{
            return response()->json(['err'=>403,'message'=>'Akses tidak diizinkan'],403);
        }
    }
}
