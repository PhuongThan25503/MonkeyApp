<?php

namespace App\Repositories;

use App\Models\Author;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class AuthorRepository.
 */
class AuthorRepository extends BaseRepository implements AuthorRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Author::class;
    }

    public function getAllAuthor()
    {
        return Author::all();
    }

    public function getAuthorById($id)
    {
        return Author::find($id);
    }

    public function createAuthor($data)
    {
        return Author::create($data->toArray());
    }

    public function updateAuthor($id, $data)
    {
        $Author = Author::find($id);
        return $Author->update($data->toArray());
    }

    public function deleteAuthorById($id)
    {
        return Author::destroy($id);
    }
}
