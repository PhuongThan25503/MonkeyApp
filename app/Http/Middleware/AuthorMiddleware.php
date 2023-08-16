<?php

namespace App\Http\Middleware;

use App\Repositories\UserRepositoryInterface;
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

    protected $UserRepository;
    protected function __construct(UserRepositoryInterface $ur){
        return $this->UserRepository = $ur;
    }
    public function handle(Request $request, Closure $next): Response
    {
        $apiToken = $request->bearerToken();

        //check if the API token is valid
        if($apiToken && $this->isValidAPIToken($apiToken)){
            return $next($request);
        }

        //if API token is not valid
        return response()->json(['error'=> 'Unauthorized'], 401);
    }

    protected function isValidAPIToken($token){
        return $this->UserRepository->isApiTokenExist($token);
    }
}
