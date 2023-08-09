<?php

namespace App\Repositories;

interface BookRepositoryInterface
{
    public function getAllBooks();
    public function getBookById($id);
    public function createBook($data);
    public function updateBook($id, $data);
    public function deleteById($id);
}
