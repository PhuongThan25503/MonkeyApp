<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//below is for learning
//Route::get('/', function () {
//    return date('Y-m-d H:i:s');
//});
//
//Route::post('/home', function(){
////    return('home page post');
//});
//
//Route::post('/home', function(){
//    return view('home');
//});
//
//Route::get('/login', function(){
////    return('home page get');
//    return view('form');
//});

Route::get('/',[HomeController::class, 'goToHome'])->name('home');

Route::prefix('books')->name('book.')-> group(function (){

    Route::get('/',[HomeController::class, 'getBooks'])->name('index');

    Route::get('book-detail/{id}', [BookController::class, 'getBookDetail'])->name('get');

    Route::get('add-new-book', [BookController::class, 'goToAddPage'])->name('goToAdd'); // get add

    Route::post('add-new-book', [BookController::class, 'postAdd'])->name('post-add');

    Route::delete('delete-book', [BookController::class, 'deleteBook'])->name('delete-book');

    Route::get('edit-book', [BookController::class, 'getEdit'])->name('get-edit');

    Route::patch('edit-book', [BookController::class, 'postEdit'])->name('post-edit');
});

Route::prefix('login')-> group(function (){
   Route::get('/',[\App\Http\Controllers\LoginController::class, 'getForm']);
});
