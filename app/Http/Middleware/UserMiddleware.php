<?php

namespace App\Http\Middleware;

use App\Repositories\UserRepositoryInterface;
use Closure;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public $UserRepository;

    public function __construct(UserRepositoryInterface $UserRepository)
    {
        return $this->UserRepository = $UserRepository;
    }
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();

        if (strlen($token)>0 && $this->UserRepository->isApiTokenExist($token)) {
            return $next($request);
        } //if API token is not valid
        else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
