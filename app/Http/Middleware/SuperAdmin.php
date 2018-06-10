<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class SuperAdmin {

    public function handle($request, Closure $next) {

        if (Session::get('SuperAdmin') == "SuperAdmin") {
            return $next($request);  // if exist proceed to next step
        } else {
            return redirect('/');
        }
    }

}
