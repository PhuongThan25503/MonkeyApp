<?php

namespace App\Http\Controllers;

use App\Models\Touch;
use App\Http\Controllers\Controller;
use App\Repositories\TouchRepositoryInterface;
use Illuminate\Http\Request;

class API_TouchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $TouchRepository;

    public function __construct(TouchRepositoryInterface $TouchRepository)
    {
        return $this->TouchRepository = $TouchRepository;
    }

    public function index()
    {
        $Touch= $this->TouchRepository->getAllTouch();
        return response()->json($Touch, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Touch = new Touch();
        $Touch->page_id = $request->page_id;
        $Touch->text_id = $request ->text_id;
        $Touch->data = $request ->data;
        $this->TouchRepository->createTouch($Touch);
        return response($Touch,200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Touch = $this->TouchRepository->getTouchById($id);
        if($Touch){//exist
            return response()->json(json_decode($Touch->data), 200);
        }
        else{
            return response()->json([
                'message' => 'not found Touch'
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
            'touch_id' => 'required'
        ]);

        $id = $request->touch_id;

        //check exist
        $exist = $this->TouchRepository->getTouchById($id);

        if($exist){
            $Touch = Touch::make($request->all());
            $this->TouchRepository->updateTouch($id, $Touch);
            return response()->json([
                'Touch'=>$this->TouchRepository->getTouchById($id)
            ], 200);
        }else{
            return response()->json([
                'message' => 'Touch not found'
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
            'touch_id' => 'required'
        ]);

        $id = $request->touch_id;

        //check exist
        $Touch = $this->TouchRepository->getTouchById($id);

        if($Touch){
            $this->TouchRepository->deleteTouchById($id);
            return response()->json([
                'message' => 'Touch deleted'
            ], 200);
        }else{
            return response()->json([
                'message' => 'Touch not found'
            ], 404);
        }
    }
}
