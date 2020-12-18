<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
class OpdanKasubagApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $authorizedLevel = [
            'root',
            'kasubag',
            'operator',
        ];
        $header = $request->headers->has("Auth");
        $validation = true;
        if($header){
            $myHeader = $request->header("Auth");
            $header = preg_replace('/(Bearer )/','',$myHeader);
            $data = User::whereRaw('MD5(id)=?',$header)->first();
            if($data==NULL):
                $validation=false;
            else:
                $level  = $data->level;
                $level = strtolower($level);
                $v=false;

                foreach ($authorizedLevel as $key => $value) {
                    //echo $level;
                    if($level===$value){
                        $v=true;
                    }
                }
                
                $validation = $v;
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
