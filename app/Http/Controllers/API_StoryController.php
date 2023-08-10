<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class API_StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Story::all();
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
    public function show(Story $story)
    {
        //
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
