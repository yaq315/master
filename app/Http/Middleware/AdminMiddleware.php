<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized', 401);
            }
            return redirect()->guest(route('login'));
        }
    
        $user = Auth::user();
        
        
        if (!$user->isAdmin() && !$user->isSuperAdmin()) {
            abort(403, 'Unauthorized action. You must be an administrator to access this page.');
        }
    
        return $next($request);
    }
}