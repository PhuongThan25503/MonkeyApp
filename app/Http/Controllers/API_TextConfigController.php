<?php

namespace App\Http\Controllers;

use App\Models\TextConfig;
use App\Http\Controllers\Controller;
use App\Repositories\TextConfigRepositoryInterface;
use Illuminate\Http\Request;

class API_TextConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $TextConfigRepository;

    public function __construct(TextConfigRepositoryInterface $TextConfigRepository)
    {
        return $this->TextConfigRepository = $TextConfigRepository;
    }

    public function index()
    {
        $TextConfig= $this->TextConfigRepository->getAllTextConfig();
        return response()->json($TextConfig, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $TextConfig = new TextConfig();
        $TextConfig->text_id = $request->text_id;
        $TextConfig->page_id = $request->page_id;
        $TextConfig->position = $request->position;
        $this->TextConfigRepository->createTextConfig($TextConfig);
        return response($TextConfig,200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $TextConfig = $this->TextConfigRepository->getTextConfigById($id);
        if($TextConfig){//exist
            return response()->json($TextConfig, 200);
        }
        else{
            return response()->json([
                'message' => 'not found TextConfig'
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
            'id' => 'required'
        ]);

        $id = $request->id;

        //check exist
        $exist = $this->TextConfigRepository->getTextConfigById($id);

        if($exist){
            $TextConfig = TextConfig::make($request->all());
            $this->TextConfigRepository->updateTextConfig($id, $TextConfig);
            return response()->json([
                'TextConfig'=>$this->TextConfigRepository->getTextConfigById($id)
            ], 200);
        }else{
            return response()->json([
                'message' => 'TextConfig not found'
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
            'id' => 'required'
        ]);

        $id = $request->id;

        //check exist
        $TextConfig = $this->TextConfigRepository->getTextConfigById($id);

        if($TextConfig){
            $this->TextConfigRepository->deleteTextConfigById($id);
            return response()->json([
                'TextConfig deleted'
            ], 200);
        }else{
            return response()->json([
                'message' => 'TextConfig not found'
            ], 404);
        }
    }
}
