<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Controllers\Controller;
use App\Repositories\AuthorRepositoryInterface;
use Illuminate\Http\Request;

class API_AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $AuthorRepository;

    public function __construct(AuthorRepositoryInterface $AuthorRepository)
    {
        return $this->AuthorRepository = $AuthorRepository;
    }

    public function index()
    {
        $Author= $this->AuthorRepository->getAllAuthor();
        return response()->json($Author, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Author = new Author();
        $Author->name = $request->name;
        $Author->DOB = $request->DOB;
        $Author->gender = $request->gender;
        $this->AuthorRepository->createAuthor($Author);
        return response($Author,200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Author = $this->AuthorRepository->getAuthorById($id);
        if($Author){//exist
            return response()->json($Author, 200);
        }
        else{
            return response()->json([
                'message' => 'not found Author'
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
            'author_id' => 'required'
        ]);

        $id = $request->author_id;

        //check exist
        $exist = $this->AuthorRepository->getAuthorById($id);

        if($exist){
            $Author = Author::make($request->all());
            $this->AuthorRepository->updateAuthor($id, $Author);
            return response()->json([
                'Author'=>$this->AuthorRepository->getAuthorById($id)
            ], 200);
        }else{
            return response()->json([
                'message' => 'Author not found'
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
            'author_id' => 'required'
        ]);

        $id = $request->author_id;

        //check exist
        $Author = $this->AuthorRepository->getAuthorById($id);

        if($Author){
            $this->AuthorRepository->deleteAuthorById($id);
            return response()->json([
                'Author deleted'
            ], 200);
        }else{
            return response()->json([
                'message' => 'Author not found'
            ], 404);
        }
    }
}
