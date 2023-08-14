<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Repositories\RoleRepositoryInterface;
use Illuminate\Http\Request;

class API_RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $RoleRepository;

    public function __construct(RoleRepositoryInterface $RoleRepository)
    {
        return $this->RoleRepository = $RoleRepository;
    }

    public function index()
    {
        $Role= $this->RoleRepository->getAllRole();
        return response()->json($Role, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Role = new Role();
        $Role->role = $request->role;
        $this->RoleRepository->createRole($Role);
        return response($Role,200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Role = $this->RoleRepository->getRoleById($id);
        if($Role){//exist
            return response()->json($Role, 200);
        }
        else{
            return response()->json([
                'message' => 'not found Role'
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
            'Role_id' => 'required'
        ]);

        $id = $request->Role_id;

        //check exist
        $exist = $this->RoleRepository->getRoleById($id);

        if($exist){
            $Role = Role::make($request->all());
            $this->RoleRepository->updateRole($id, $Role);
            return response()->json([
                'Role'=>$this->RoleRepository->getRoleById($id)
            ], 200);
        }else{
            return response()->json([
                'message' => 'Role not found'
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
            'Role_id' => 'required'
        ]);

        $id = $request->Role_id;

        //check exist
        $Role = $this->RoleRepository->getRoleById($id);

        if($Role){
            $this->RoleRepository->deleteRoleById($id);
            return response()->json([
                'message' => 'Role deleted'
            ], 200);
        }else{
            return response()->json([
                'message' => 'Role not found'
            ], 404);
        }
    }
}
