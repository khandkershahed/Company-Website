<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DepartmentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$departments)
    {
        $user = Auth::user();
        // dd($user);
        if (!$user) {
            abort(403, 'Unauthorized');
        }

        // super_admin bypass
        if ($user->myDepartmentsInstance(['super_admin'])) {
            return $next($request);
        }

        if (!$user->myDepartmentsInstance($departments)) {
            abort(403, 'Unauthorized access for your department.');
        }
        return $next($request);
    }
}
