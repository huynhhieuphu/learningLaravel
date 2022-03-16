<?php

namespace App\Http\Middleware;

use Closure;

class checkNumber
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // after middleware
        $response = $next($request);

        $number = $request->number;
        if($number % 2 != 0){
            return redirect()->route('sole', ['num' => $number]);
        }

        // trả về response;
        return $response;
    }
}
