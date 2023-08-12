<?php

namespace App\Http\Controllers;

use App\Models\Text;
use App\Http\Controllers\Controller;
use App\Repositories\TextRepositoryInterface;
use Illuminate\Http\Request;

class API_TextController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $textRepository;

    public function __construct(TextRepositoryInterface $textRepository)
    {
        return $this->textRepository = $textRepository;
    }

    public function index()
    {
        $text= $this->textRepository->getAllText();
        return response()->json($text, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $text = new Text();
        $text->text;
        $this->textRepository->createText($text);
        return response($text,200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $text = $this->textRepository->getTextById($id);
        if($text){//exist
            return response()->json($text, 200);
        }
        else{
            return response()->json([
                'message' => 'not found text'
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
            'text_id' => 'required'
        ]);

        $id = $request->text_id;

        //check exist
        $exist = $this->textRepository->getTextById($id);

        if($exist){
            $text = Text::make($request->all());
            $this->textRepository->updateText($id, $text);
            return response()->json([
                'text'=>$this->textRepository->getTextById($id)
            ], 200);
        }else{
            return response()->json([
                'message' => 'Text not found'
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
            'text_id' => 'required'
        ]);

        $id = $request->text_id;

        //check exist
        $text = $this->textRepository->getTextById($id);

        if($text){
            $this->textRepository->deleteTextById($id);
            return response()->json([
                'text deleted'
            ], 200);
        }else{
            return response()->json([
                'message' => 'Text not found'
            ], 404);
        }
    }
}
