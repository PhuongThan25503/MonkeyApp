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

    public function __construct(TouchRepositoryInterface $TouchRepository){
        $this->TouchRepository = $TouchRepository;
    }
    public function index()
    {
        $touch = $this->TouchRepository->getAllTouch();
        return response()->json([
            'touch'=>$touch,
            'message' => 'Get successfully',
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $touch = new Touch;
        $touch->page_id = $request->page_id;
        $touch->text_id = $request->text_id;
        $touch->data = $request->data;
        $this->TouchRepository->createTouch($touch);
        return response()->json([
            'message' => 'touch inserted',
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $touch = $this->TouchRepository->getTouchById($id);
        return response($touch,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //get id
        $id = $request->touch_id;

        //validate
        $request->validate([
            'touch_id' => 'required',
        ]);

        //make a touch
        $touch = Touch::make($request->all());

        //update
        $this->TouchRepository->updateTouch($id, $touch);

        //return
        return response()->json([
            'new_data' => $this->TouchRepository->getTouchById($id),
            'message' => 'Data updated',
        ],200);
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

        //check if touch exist
        $touch = $this->TouchRepository->getTouchById($id);

        if($touch){
            $this->TouchRepository->deleteTouchById($request->touch_id);
            return response()->json([
                'message' => 'Touch deleted'
            ]);
        }
        else{
            return response()->json([
               'message' => 'Touch not found'
            ], 404);
        }

    }
}
