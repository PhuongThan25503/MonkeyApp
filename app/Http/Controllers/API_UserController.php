<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

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
        $User= $this->UserRepository->getAllUser();
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
        return response($User,200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $User = $this->UserRepository->getUserById($id);
        if($User){//exist
            return response()->json($User, 200);
        }
        else{
            return response()->json([
                'message' => 'not found User'
            ], 404);
        }
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

        if($exist){
            $User = User::make($request->all());
            $this->UserRepository->updateUser($id, $User);
            return response()->json([
                'User'=>$this->UserRepository->getUserById($id)
            ], 200);
        }else{
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

        if($User){
            $this->UserRepository->deleteUserById($id);
            return response()->json([
                'message' => 'User deleted'
            ], 200);
        }else{
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
    }
}