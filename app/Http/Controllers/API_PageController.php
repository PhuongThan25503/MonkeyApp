<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\Touch;
use App\Repositories\PageRepositoryInterface;
use Exception;
use Faker\Test\Provider\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PDO;
use Symfony\Component\Console\Logger\ConsoleLogger;

use function Laravel\Prompts\error;

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
        // Query the story model with its related page, text, audio, and touch_ models and convert it to an array
        $story = Story::with(['Page.TextConfig.Audio','Page.TextConfig.Text', 'Page.Touch_.Text.Audio'])->find($id)->toArray(); // to array to display all info

        // Loop through each page element in the story array
        foreach ($story['page'] as $p_index => $p) {
            // // Use a try-catch block to handle any possible errors
            // try {
            //     // Decode the sync_data attribute of the audio model from JSON to PHP object
            //     $sync_data_raw = json_decode($p['text']['audio']['sync_data']);
            //     // Assign the decoded value back to the sync_data attribute of the audio model in the array
            //     $story['page'][$p_index]['text']['audio']['sync_data'] = $sync_data_raw;
            // } catch (Exception $e) {
            //     // Log the error message if any
            //     Log::info($e);
            // }

            // Loop through each touch_ element in the page array
            foreach ($p['touch_'] as $t_index => $t) {
                // Use a try-catch block to handle any possible errors
                try {
                    // Decode the data attribute of the touch_ model from JSON to PHP object
                    $data_raw = json_decode($t['data']);
                    // Assign the decoded value back to the data attribute of the touch_ model in the array
                    $story['page'][$p_index]['touch_'][$t_index]['data'] = $data_raw;
                    //config position for the floating text
                    $config_text_raw = json_decode($t['config']);
                    //assign json decoded
                    $story['page'][$p_index]['touch_'][$t_index]['config'] = $config_text_raw;
                } catch (Exception $e) {
                    // Log the error message if any
                    Log::info($e);
                }
            }
        }

        if ($story) {
            return response()->json(
                $story,
                200
            );
        } else {
            return response()->json([
                'message' => 'Page not found'
            ], 404);
        }
    }
}
