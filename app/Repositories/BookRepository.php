<?php

namespace App\Repositories;

use App\Models\Book;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class BookRepository.
 */
class BookRepository extends BaseRepository implements BookRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Book::class;
    }

//    public function create($book)
//    {
//        return Book::create($book->toArray());
//    }
//
//    public function deleteBook($id){
//        return Book::destroy($id);
//    }

    public function getAllBooks()
    {
        return Book::all();
    }

    public function getBookById($id)
    {
        return DB::select('select * from book where book_id='.$id); //sql things (too familiar but I will not use this anymore in the future
    }

    public function createBook($data)
    {
        return Book::create($data->toArray());
    }

    public function updateBook($id, $data)
    {
        $book = Book::find($id);
        return $book->update($data->toArray());
    }

    public function deleteById($id): bool
    {
        return Book::destroy($id);
    }
}
