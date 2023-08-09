<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    //get all books
    public function getBooks(){
        return 'List all books out';
    }

    public function goToHome(){

        $book=DB::select('select * from book');
//        dd($book);
//        $pdo = DB::connection()->getPdo();
//        if($pdo) {
//            echo "Connected successfully to database ".DB::connection()->getDatabaseName();
//            echo $book;
//        } else {
//            echo "You are not connected to database";
//        }
        return view('home', compact('book'));
    }
}
