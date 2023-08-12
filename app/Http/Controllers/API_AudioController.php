<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use App\Http\Controllers\Controller;
use App\Repositories\AudioRepositoryInterface;
use Illuminate\Http\Request;

class API_AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $AudioRepository;

    public function __construct(AudioRepositoryInterface $AudioRepository)
    {
        return $this->AudioRepository = $AudioRepository;
    }

    public function index()
    {
        $Audio= $this->AudioRepository->getAllAudio();
        return response()->json($Audio, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Audio = new Audio();
        $Audio->audio = $request->audio;
        $Audio->text_id = $request->text_id;
        $this->AudioRepository->createAudio($Audio);
        return response($Audio,200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Audio = $this->AudioRepository->getAudioById($id);
        if($Audio){//exist
            return response()->json($Audio, 200);
        }
        else{
            return response()->json([
                'message' => 'not found Audio'
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
            'audio_id' => 'required'
        ]);

        $id = $request->audio_id;

        //check exist
        $exist = $this->AudioRepository->getAudioById($id);

        if($exist){
            $Audio = Audio::make($request->all());
            $this->AudioRepository->updateAudio($id, $Audio);
            return response()->json([
                'Audio'=>$this->AudioRepository->getAudioById($id)
            ], 200);
        }else{
            return response()->json([
                'message' => 'Audio not found'
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
            'audio_id' => 'required'
        ]);

        $id = $request->audio_id;

        //check exist
        $Audio = $this->AudioRepository->getAudioById($id);

        if($Audio){
            $this->AudioRepository->deleteAudioById($id);
            return response()->json([
                'Audio deleted'
            ], 200);
        }else{
            return response()->json([
                'message' => 'Audio not found'
            ], 404);
        }
    }
}
