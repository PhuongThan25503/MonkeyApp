<?php

use App\Http\Controllers\API_StoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Book;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//get all book list
Route::get('getBookList', function(){
   $book = Book::all();
    return response()->json($book);
});

//delete a book
Route::delete('/deleteBook/{id}', function ($id){
   $book = Book::find($id);
   if($book){
       $book->delete();
       return response()->json(['message' => 'Book deleted successfully']);
   }else {
       return response()->json(['message'=> 'Book not found']);
   }
});

//add a book
Route::post('/addBook', function (Request $request) {
    $book = new Book;
    $book->name = $request->name;
    $book->content = $request->content;
    $book->isActive = $request->isActive;
    $book->coin = $request -> coin;
    $book->save();
    return response()->json($book, 201);
});

//update a book
Route::put('/books/{id}', function (Request $request) {
    $book_id = $request->book_id;
    $book = Book::find($book_id);
    if ($book) {
        $book->update($request->all());
        return response()->json($book);
    } else {
        return response()->json(['message' => 'Book not found'], 404);
    }
});

//Below are APIs for main project

//get all story
Route::get('getAllStory', [API_StoryController::class, 'index']);
//get story by id
Route::get('getStoryById/{id}', [API_StoryController::class, 'show']);
