<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Repositories\UserRepository;
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

    public $UserRepository;

    public function __construct(UserRepositoryInterface $UserRepository)
    {
        return $this->UserRepository = $UserRepository;
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
        $user = $this->UserRepository->isApiTokenExist($token);
        if($user){
            $author = new Role;
            $author->role_id = 2;
            return $this->UserRepository->isRoleMatch($user, $author);
        }
        return false;
    }
}
