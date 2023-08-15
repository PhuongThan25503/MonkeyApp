<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //if pass the authentication and role is 'author'
        if(Auth::check() && Auth::user()->getRole() == 'author') {
            return $next($request);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
