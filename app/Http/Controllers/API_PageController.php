<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Http\Controllers\Controller;
use App\Repositories\PageRepositoryInterface;
use Illuminate\Http\Request;

class API_PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $PageRepository;
    public function __construct(PageRepositoryInterface $PageRepository){
        $this->PageRepository = $PageRepository;
    }

    public function index()
    {
        $page = $this->PageRepository->getAllPage();
        return response()->json($page, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $page = new Page();
        $page->story_id = $request->story_id;
        $page->background = $request->background;
        $page->page_num = $request->page_num;
        $this->PageRepository->createPage($page);
        return response()->json([
            'page' => $page,
            'message' => 'insert successful',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $page = Page::find($id);
        return response()->json($page, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //validate
        $request->validate([
            'page_id'=>'required'
        ]);

        $id= $request->page_id;

        //check exist
        $exist = Page::find($id);

        if($exist){
            //make a page
            $page = Page::make($request->all());

            //update
            $this->PageRepository->updatePage($id, $page);

            //return
            return response()->json([
                'page' => $this->PageRepository->getPageById($id),
                'message' => 'update successfully',
            ]);
        }else{
            return response()->json([
                'message' => 'page not found'
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->validate([
           'page_id' => 'required',
        ]);

        $id = $request->page_id;

        //get page
        $page= $this->PageRepository->getPageById($id);

        //check if exist
        if($page){
            $this->PageRepository->deletePageById($id);
            return response()->json([
                'message' => 'delete successfully'
            ],200);
        }else{
            return response()->json([
                'message' => 'page not found'
            ],404);
        }

    }
}
