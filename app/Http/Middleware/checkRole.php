<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $link)
    {
        #return $next($request);
        $hakAkses = session('hakAkses');
        foreach ($hakAkses as $key => $val){
            #dd($val);            
            foreach ($val['data1'] as $key2 => $dt){
                foreach ($dt['data2'] as $key2 => $dtLink){
                    #dd($dtLink['menu_link']);
                    //dd($link);
                    if($dtLink['menu_link']==$link){
                        return $next($request);
                    }
                }
            }
        }
        #return abort(401);
        return redirect('/401');
    }
}
