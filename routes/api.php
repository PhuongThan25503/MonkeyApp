<?php

use App\Http\Controllers\API_AudioController;
use App\Http\Controllers\API_PageController;
use App\Http\Controllers\API_StoryController;
use App\Http\Controllers\API_TextConfigController;
use App\Http\Controllers\API_TextController;
use App\Http\Controllers\API_TouchController;
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

Route::get('getStoryByIdTest/{id}', function ($id){
    $story = \App\Models\Story::find($id);
    return $story->Page()->get();
});

//Below are APIs for main project

/*Story*/
//get all story
Route::get('getAllStory', [API_StoryController::class, 'index']);
//get story by id
Route::get('getStoryById/{id}', [API_StoryController::class, 'show']);
//add new story
Route::post('addNewStory', [API_StoryController::class, 'store']);
//update a story
Route::patch('updateStory', [API_StoryController::class, 'update']);
//delete a story
Route::delete('deleteStory', [API_StoryController::class, 'destroy']);

/*Page*/
//get all Page
Route::get('getAllPage', [API_PageController::class, 'index']);
//get Page by id
Route::get('getPageById/{id}', [API_PageController::class, 'show']);
//add new Page
Route::post('addNewPage', [API_PageController::class, 'store']);
//update a Page
Route::patch('updatePage', [API_PageController::class, 'update']);
//delete a Page
Route::delete('deletePage', [API_PageController::class, 'destroy']);

/*Text*/
//get all Text
Route::get('getAllPage', [API_TextController::class, 'index']);
//get Text by id
Route::get('getPageById/{id}', [API_TextController::class, 'show']);
//add new Text
Route::post('addNewPage', [API_TextController::class, 'store']);
//update a Text
Route::patch('updatePage', [API_TextController::class, 'update']);
//delete a Text
Route::delete('deletePage', [API_TextController::class, 'destroy']);

/*Audio*/
//get all Audio
Route::get('getAllPage', [API_AudioController::class, 'index']);
//get Audio by id
Route::get('getPageById/{id}', [API_AudioController::class, 'show']);
//add new Audio
Route::post('addNewPage', [API_AudioController::class, 'store']);
//update a Audio
Route::patch('updatePage', [API_AudioController::class, 'update']);
//delete a Audio
Route::delete('deletePage', [API_AudioController::class, 'destroy']);

/*Touch*/
//get all Touches
Route::get('getAllPage', [API_TouchController::class, 'index']);
//get Touch by id
Route::get('getPageById/{id}', [API_TouchController::class, 'show']);
//add new Touch
Route::post('addNewPage', [API_TouchController::class, 'store']);
//update a Touch
Route::patch('updatePage', [API_TouchController::class, 'update']);
//delete a Touch
Route::delete('deletePage', [API_TouchController::class, 'destroy']);

/*TextConfig*/
//get all TextConfig
Route::get('getAllPage', [API_TextConfigController::class, 'index']);
//get TextConfig by id
Route::get('getPageById/{id}', [API_TextConfigController::class, 'show']);
//add new TextConfig
Route::post('addNewPage', [API_TextConfigController::class, 'store']);
//update a TextConfig
Route::patch('updatePage', [API_TextConfigController::class, 'update']);
//delete a TextConfig
Route::delete('deletePage', [API_TextConfigController::class, 'destroy']);
