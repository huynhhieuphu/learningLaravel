<?php

namespace App\Http\Middleware;

use Closure;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = null)
    {
        // $role => đại diện tham số truyền vào middleware
        if($role !== 'admin'){
            return redirect()->route('notAccess');
        }

        return $next($request);
    }
}
