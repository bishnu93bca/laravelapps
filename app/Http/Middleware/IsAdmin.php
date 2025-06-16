<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role=null): Response
    {
        // if ($role && (!$request->user() || !$request->user()->hasRole($role))) {
        //     return response()->json(['message' => 'Unauthorized'], 403);
        // }
        // if ($role === 'admin' && $request->user()->role !== 'admin') {
        //     return redirect('/home');
        // }
        if (!$request->user()) {
            return redirect('/login');
        }
        
        // Check if the user has the required role
        if ($request->user()->role !== $role) {
           // return response()->json(['message' => 'Unauthorized'], 403);
        }
        return $next($request);
    }
}
