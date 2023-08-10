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
        //
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
    public function update(Request $request, Story $story)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Story $story)
    {
        //
    }
}
