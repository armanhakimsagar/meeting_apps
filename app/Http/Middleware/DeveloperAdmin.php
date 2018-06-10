<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class DeveloperAdmin
{
    public function handle($request, Closure $next)
    {	
        if(Session::get('DeveloperAdmin') == "DeveloperAdmin"){
            return $next($request);		// if exist proceed to next step
        }else{
            return redirect('/');
        }  	
    }
}
