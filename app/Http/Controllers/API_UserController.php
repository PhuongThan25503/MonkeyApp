<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class API_UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $UserRepository;

    public function __construct(UserRepositoryInterface $UserRepository)
    {
        return $this->UserRepository = $UserRepository;
    }

    public function index()
    {
        $User = $this->UserRepository->getAllUser();
        return response()->json($User, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $User = new User();
        $User->role_id = $request->role_id;
        $User->username = $request->username;
        $User->password = $request->password;
        $User->fullname = $request->fullname;
        $User->address = $request->address;
        $User->phone = $request->phone;
        $User->email = $request->email;
        $this->UserRepository->createUser($User);
        return response($User, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id){
        $user = $this->UserRepository->getUserById($id);
        if($user){
            return response()->json($user, 200);
        } else {
            return response()->json([
                'message' => 'not found User'
            ], 404);
        }
    }

    public function getPersonalInfo(Request $request)
    {
        //get data from request
        $api_token = $request->bearerToken();

        //get user by token
        $user = $this->UserRepository->getUserByToken($api_token);

        //if user exists
        if ($user) {
            return response()->json($user, 200);
        } else {
            return response()->json([
                'message' => 'not found User'
            ], 404);
        }

//        $User = $this->UserRepository->getUserById($id);
//        if($User){//exist
//            return response()->json($User, 200);
//        }
//        else{
//            return response()->json([
//                'message' => 'not found User'
//            ], 404);
//        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //validate
        $request->validate([
            'user_id' => 'required'
        ]);

        $id = $request->user_id;

        //check exist
        $exist = $this->UserRepository->getUserById($id);

        if ($exist) {
            $User = User::make($request->all());
            $this->UserRepository->updateUser($id, $User);
            return response()->json([
                'User' => $this->UserRepository->getUserById($id)
            ], 200);
        } else {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //validate
        $request->validate([
            'user_id' => 'required'
        ]);

        $id = $request->user_id;

        //check exist
        $User = $this->UserRepository->getUserById($id);

        if ($User) {
            $this->UserRepository->deleteUserById($id);
            return response()->json([
                'message' => 'User deleted'
            ], 200);
        } else {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
    }

    //log in
    public function authenticate(Request $request)
    {
        //retrieve only username, password from request
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        //password will be automatically enscrypted by enscrypt techique write in config/hash
        if (Auth::attempt($credentials)) {
            $token = Str::random(60);
            //sha256 is quicklier hashing method compared to bcrypt as api_token is used in high frequency
            Auth::user()->api_token = hash('sha256', $token);
            Auth::user()->token_expired_at = date('Y-m-d H:i:s', time() + 3600);
            Auth::user()->save();
            return response()->json([
                'token' => Auth::user()->api_token,
                'user_id' => Auth::user()->getAuthIdentifier(), //user id
            ]);
        }
        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    public function logout(Request $request)
    {
        //get the api token
        $apiToken = $request->bearerToken();

        //get the user by the token
        $user = User::where('api_token', $apiToken)->first();

        //delete the API token
        if ($user) {
            $user->api_token = null;
            $user->save();
            return response()->json(['message' => 'logged out successfully']);
        }

        return response()->json(['message' => 'Unauthenticated'], 401);
    }
}
