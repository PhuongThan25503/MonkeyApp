<?php

namespace App\Http\Middleware;

use App\Repositories\UserRepositoryInterface;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public $userRepository;
    public function __construct(UserRepositoryInterface $userRepository){
        return $this->userRepository = $userRepository;
    }
    public function handle(Request $request, Closure $next): Response
    {
        $apiToken = $request->bearerToken();
        $id = $request->id;
        $user = $this->userRepository->isApiTokenExist($apiToken);

        //check if api_token match the user id so that user can only see info of them
        if($apiToken && $user && $this->userRepository->isIdMatch($user, $id)){
            return $next($request);
        }

        //if API token is not valid
        return response()->json(['error'=> 'Unauthorized'], 401);
    }
}
