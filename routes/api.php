<?php

use App\Http\Controllers\API_AudioController;
use App\Http\Controllers\API_RoleController;
use App\Http\Controllers\API_UserController;
use App\Http\Controllers\API_PageController;
use App\Http\Controllers\API_StoryController;
use App\Http\Controllers\API_TextConfigController;
use App\Http\Controllers\API_TextController;
use App\Http\Controllers\API_TouchController;
use App\Http\Controllers\API_TypeController;
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

Route::get('test__IIE3107',function (){
   return (\App\Models\User::find(1)->Role()->value('name') == 'admin');
});

/*
 *
 *   *************************************
 * ***** (   o    ) ******  (   o   )  ******
 *   *************************************
 * */

//Below are APIs for main project

/*Login*/
Route::post('authenticate', [API_UserController::class, 'authenticate']);

/*Story*/
Route::group(['middleware' => 'author'],function (){
    //add new story
    Route::post('addNewStory', [API_StoryController::class, 'store']);
    //update a story
    Route::patch('updateStory', [API_StoryController::class, 'update']);
    //delete a story
    Route::delete('deleteStory', [API_StoryController::class, 'destroy']);
});
//get all story
Route::get('getAllStory', [API_StoryController::class, 'index']);
//get story by id
Route::get('getStoryById/{id}', [API_StoryController::class, 'show']);

/*Page*/
Route::group(['middleware' => 'author'],function (){
    //add new Page
    Route::post('addNewPage', [API_PageController::class, 'store']);
    //update a Page
    Route::patch('updatePage', [API_PageController::class, 'update']);
    //delete a Page
    Route::delete('deletePage', [API_PageController::class, 'destroy']);
});
//get all Page
Route::get('getAllPage', [API_PageController::class, 'index']);
//get Page by id
Route::get('getPageById/{id}', [API_PageController::class, 'show']);

/*Text*/
Route::group(['middleware' => 'author'], function(){
    //add new Text
    Route::post('addNewText', [API_TextController::class, 'store']);
    //update a Text
    Route::patch('updateText', [API_TextController::class, 'update']);
    //delete a Text
    Route::delete('deleteText', [API_TextController::class, 'destroy']);
});
//get all Text
Route::get('getAllText', [API_TextController::class, 'index']);
//get Text by id
Route::get('getTextById/{id}', [API_TextController::class, 'show']);

/*Audio*/
Route::group(['middleware' => 'author'], function (){
    //add new Audio
    Route::post('addNewAudio', [API_AudioController::class, 'store']);
    //update a Audio
    Route::patch('updateAudio', [API_AudioController::class, 'update']);
    //delete a Audio
    Route::delete('deleteAudio', [API_AudioController::class, 'destroy']);
});
//get all Audio
Route::get('getAllAudio', [API_AudioController::class, 'index']);
//get Audio by id
Route::get('getAudioById/{id}', [API_AudioController::class, 'show']);

/*Touch*/
Route::group(['middleware'=>'author'], function (){
    //add new Touch
    Route::post('addNewTouch', [API_TouchController::class, 'store']);
    //update a Touch
    Route::patch('updateTouch', [API_TouchController::class, 'update']);
    //delete a Touch
    Route::delete('deleteTouch', [API_TouchController::class, 'destroy']);
});
//get all Touches
Route::get('getAllTouch', [API_TouchController::class, 'index']);
//get Touch by id
Route::get('getTouchById/{id}', [API_TouchController::class, 'show']);

/*TextConfig*/
Route::group(['middleware'=>'author'], function (){
    //add new TextConfig
    Route::post('addNewTextConfig', [API_TextConfigController::class, 'store']);
    //update a TextConfig
    Route::patch('updateTextConfig', [API_TextConfigController::class, 'update']);
    //delete a TextConfig
    Route::delete('deleteTextConfig', [API_TextConfigController::class, 'destroy']);
});
//get all TextConfig
Route::get('getAllTextConfig', [API_TextConfigController::class, 'index']);
//get TextConfig by id
Route::get('getTextConfigById/{id}', [API_TextConfigController::class, 'show']);

/*User*/
Route::group(['middleware'=>'admin'], function (){
    //get all User
    Route::get('getAllUser', [API_UserController::class, 'index']);
    //get User by id
    Route::get('getUserById/{id}', [API_UserController::class, 'show']);
    //delete an User (shouldn't)
    //Route::delete('deleteUser', [API_UserController::class, 'destroy']);
});
//add new User
Route::post('addNewUser', [API_UserController::class, 'store']);
Route::group(['middleware'=>'user'], function (){
    //update an User
    Route::patch('updateUser', [API_UserController::class, 'update']);
    //get personal info
    Route::post('getPersonalInfo', [API_UserController::class, 'getPersonalInfo']);
    /*Logout*/
    Route::post('logout', [API_UserController::class, 'logout']);
});


/*Type*/
//get all Type
Route::get('getAllType', [API_TypeController::class, 'index']);
//get Type by id
Route::get('getTypeById/{id}', [API_TypeController::class, 'show']);
//add new Type
Route::post('addNewType', [API_TypeController::class, 'store']);
//update an Type
Route::patch('updateType', [API_TypeController::class, 'update']);
//delete an Type
Route::delete('deleteType', [API_TypeController::class, 'destroy']);

/*Role*/
//get all Role
Route::get('getAllRole', [API_RoleController::class, 'index']);
//get Role by id
Route::get('getRoleById/{id}', [API_RoleController::class, 'show']);
//add new Role
Route::post('addNewRole', [API_RoleController::class, 'store']);
//update an Role
Route::patch('updateRole', [API_RoleController::class, 'update']);
//delete an Role
Route::delete('deleteRole', [API_RoleController::class, 'destroy']);
