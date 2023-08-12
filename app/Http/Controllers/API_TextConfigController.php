<?php

namespace App\Http\Controllers;

use App\Models\TextConfig;
use App\Http\Controllers\Controller;
use App\Repositories\TextConfigRepository;
use App\Repositories\TextConfigRepositoryInterface;
use Illuminate\Http\Request;

class API_TextConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $TextConfigRepository;

    public function __construct(TextConfigRepositoryInterface $tCRepo){
        return $this->TextConfigRepository = $tCRepo;
    }
    public function index()
    {
        $TextConfig = $this->TextConfigRepository->getAllTextConfig();
        return response($TextConfig, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $textConfig = new TextConfig();
        $textConfig->text_id = $request->text_id;
        $textConfig->page_id = $request->page_id;
        $textConfig->position = $request->position;
        $this->TextConfigRepository->createTextConfig($textConfig);
        return response()->json([
            'textConfig' => $textConfig,
            'message' => ' insert successfully',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $textConfig = $this->TextConfigRepository->getTextConfigById($id);
        return response()->json($textConfig, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'id' => 'required',
        ]);

        $id= $request->id;

        // Find the tc by id
        $exist = TextConfig::find($id);

        // Update the tc with the request data
        if($exist){
            $textConfig= TextConfig::make($request->all());
            $this->TextConfigRepository->updateTextConfig($id,$textConfig);
            // Return a JSON response with the updated tc
            return response()->json([
                'textConfig'=>$textConfig,
                'message' => 'Data updated',
            ], 200);
        }else{
            return response()->json([
                'message' => 'Text Config not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // Validate the request data
        $request->validate([
            'id' => 'required',
        ]);

        $id= $request->id;

        // Find the tc by id
        $exist = TextConfig::find($id);

        // Update the tc with the request data
        if($exist){
            $this->TextConfigRepository->deleteTextConfigById($id);
            // Return a JSON response with the updated tc
            return response()->json([
                'message' => 'Data deleted',
            ], 200);
        }else{
            return response()->json([
                'message' => 'Text Config not found'
            ], 404);
        }
    }
}
