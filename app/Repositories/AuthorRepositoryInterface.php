<?php

namespace App\Repositories;

interface AuthorRepositoryInterface{
    public function getAllAuthor();
    public function getAuthorById($id);
    public function createAuthor($data);
    public function updateAuthor($id, $data);
    public function deleteAuthorById($id);
}
