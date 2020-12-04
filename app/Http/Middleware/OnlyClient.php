<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class OnlyClient
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
        $authenticated = [
            'client',
            

        ];
        $data = Auth::user();
        $level = $data->level;
        $v= false;
        $level = strtolower($level);
        foreach ($authenticated as $key => $value) {
            if($value===$level){
                $v=true;
            }
        }
        if($v):
            return $next($request);
        else:
            return redirect(route('restrict.index'));
        endif;
    }
}
