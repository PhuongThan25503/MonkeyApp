<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Http\Controllers\Controller;
use App\Models\Touch;
use App\Repositories\PageRepositoryInterface;
use Illuminate\Http\Request;

class API_PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $PageRepository;

    public function __construct(PageRepositoryInterface $PageRepository)
    {
        return $this->PageRepository = $PageRepository;
    }

    public function index()
    {
        $Page = $this->PageRepository->getAllPage();
        return response()->json($Page, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Page = new Page();
        $Page->story_id = $request->story_id;
        $Page->background = $request->background;
        $Page->page_num = $request->page_num;
        $this->PageRepository->createPage($Page);
        return response($Page, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $page = $this->PageRepository->getPageById($id);
        if ($page) { //exist
            return response()->json([
                'page' => $page,
            ], 200);
        } else {
            return response()->json([
                'message' => 'not found Page'
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
            'page_id' => 'required'
        ]);

        $id = $request->page_id;

        //check exist
        $exist = $this->PageRepository->getPageById($id);

        if ($exist) {
            $Page = Page::make($request->all());
            $this->PageRepository->updatePage($id, $Page);
            return response()->json([
                'Page' => $this->PageRepository->getPageById($id)
            ], 200);
        } else {
            return response()->json([
                'message' => 'Page not found'
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
            'page_id' => 'required'
        ]);

        $id = $request->page_id;

        //check exist
        $Page = $this->PageRepository->getPageById($id);

        if ($Page) {

            /*delete data in related tables*/
            $Page->TextConfig()->delete(); // delete data in text config
            $Page->Touch()->delete(); //delete data in touch
            /**/

            $this->PageRepository->deletePageById($id);
            return response()->json([
                'message' => 'Page deleted'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Page not found'
            ], 404);
        }
    }

    /**
     * get all pages by story id
     */
    public function getPagesbyStoryId($id)
    {
        $page = $this->PageRepository->getPagesByStoryId($id);
        if ($page) {
            return response()->json(
                $page,
                200
            );
        } else {
            return response()->json([
                'message' => 'Page not found'
            ], 404);
        }
    }
}
