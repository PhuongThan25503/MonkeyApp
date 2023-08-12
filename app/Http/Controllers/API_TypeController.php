<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Controllers\Controller;
use App\Repositories\TypeRepositoryInterface;
use Illuminate\Http\Request;

class API_TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $TypeRepository;

    public function __construct(TypeRepositoryInterface $TypeRepository)
    {
        return $this->TypeRepository = $TypeRepository;
    }

    public function index()
    {
        $Type= $this->TypeRepository->getAllType();
        return response()->json($Type, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Type = new Type();
        $Type->name = $request->name;
        $this->TypeRepository->createType($Type);
        return response($Type,200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Type = $this->TypeRepository->getTypeById($id);
        if($Type){//exist
            return response()->json($Type, 200);
        }
        else{
            return response()->json([
                'message' => 'not found Type'
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
            'type_id' => 'required'
        ]);

        $id = $request->type_id;

        //check exist
        $exist = $this->TypeRepository->getTypeById($id);

        if($exist){
            $Type = Type::make($request->all());
            $this->TypeRepository->updateType($id, $Type);
            return response()->json([
                'Type'=>$this->TypeRepository->getTypeById($id)
            ], 200);
        }else{
            return response()->json([
                'message' => 'Type not found'
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
            'type_id' => 'required'
        ]);

        $id = $request->type_id;

        //check exist
        $Type = $this->TypeRepository->getTypeById($id);

        if($Type){
            $this->TypeRepository->deleteTypeById($id);
            return response()->json([
                'Type deleted'
            ], 200);
        }else{
            return response()->json([
                'message' => 'Type not found'
            ], 404);
        }
    }
}
