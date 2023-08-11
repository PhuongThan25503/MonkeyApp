<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Http\Controllers\Controller;
use App\Repositories\StoryRepositoryInterface;
use Illuminate\Http\Request;

class API_StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $StoryRepository;

    public function __construct(StoryRepositoryInterface $StoryRepository){
        $this->StoryRepository=$StoryRepository;
    }

    public function index()
    {
        $story = $this->StoryRepository->getAllStory();
        return response()->json($story);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $story = new Story();
        $story->author_id = $request->author_id;
        $story->type_id = $request->type_id;
        $story->name = $request->name;
        $story->thumbnail = $request->thumbnail;
        $story->coin = $request->coin;
        $story->isActive = $request-> isActive;
        $this->StoryRepository->createStory($story);
        return response()->json([
            'story' => $story,
            'message' => 'Data inserted',
        ], 201); //success
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $story = $this->StoryRepository->getStoryById($id);
        return response()->json($story);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'story_id' => 'required',
        ]);

        // Find the story by id
        $story= Story::make($request->all());

        // Update the story with the request data
        $this->StoryRepository->updateStory($request->story_id,$story);

        // Return a JSON response with the updated story
        return response()->json([
            'story'=>$story,
            'message' => 'Data updated',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //validate
        $request->validate([
           'story_id' => 'required'
        ]);

        //find the story by id
        $this->StoryRepository->deleteStoryById($request->story_id);

        //return json response
        return response()->json([
           'message' => 'Data deleted',
        ], 200);
    }
}
