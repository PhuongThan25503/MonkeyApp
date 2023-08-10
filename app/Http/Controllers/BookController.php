<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Repositories\BookRepository;
use App\Repositories\BookRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public $bookRepository; //initiate a repository

    public function __construct(BookRepositoryInterface $bookRepository){
        $this->bookRepository = $bookRepository;
    }

    public function getBookDetail($id){
//        $book=DB::select('select * from book where book_id='.$id); //sql things (too familiar but I will not use this anymore in the future
        $book = $this->bookRepository->getBookById($id);
        return view('bookDetail', compact('book'));
    }

    public function goToAddPage(){
        return view('addBook');
    }

    public function postAdd(Request $req){

        //book image
        $req->validate([
           'image' => 'required|image|mimes:jpeg,png,jpg|max:4096'
        ]);
        $imageName = time().'.'.$req->image->getClientOriginalExtension();
        $req->image->move(public_path('images/books'), $imageName);

        //book info
        $book = new Book;
        $book->image = 'images/books/'.$imageName;
        $book->name = $req->input('name');
        $book->content = $req->input('content');
        // Print out the request data
//        echo "Name: " . $name . "<br>";
//        echo "Content: " . $content;
        //Book::create($book);
        $book->isActive = 0;
        $book->coin = 10;
        $this->bookRepository->createBook($book);
        return redirect('/');
    }

    public function deleteBook(Request $request){
        //two ways delete and destroy
        $book_id = $request->query('id');
//        Book::destroy($book_id);
        $this->bookRepository->deleteById($book_id);
        return redirect('/');
    }

    public function getEdit(Request $request){
        $book_id = $request->query('id');
        $book = Book::find($book_id);
        //echo $book;
        return view('editBook', compact('book'));
    }
    public function postEdit(Request $request){
        //The query method, on the other hand, only retrieves data from the query string
        $book_id = $request->query('id');
        $book = new Book();
        $book->name = $request->input('name');
        $book->content = $request->input('content');
        //The input method retrieves data from the request body or
        // query string. You can use this method to retrieve data from GET, POST, PUT, PATCH, and DELETE requests.
        $this->bookRepository->updateBook($book_id, $book);
        return redirect('/');
    }
}
