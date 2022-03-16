<?php

namespace App\Http\Middleware;

use Closure;

class checkAge
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
        // before middleware
        
        // Nơi xử lý logic
        $age = $request->age;
        if($age < 18){
            return redirect()->route('accessDenied');
        }

        // Thực hiện tiếp tục request
        return $next($request);
    }
}
