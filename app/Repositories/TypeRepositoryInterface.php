<?php

namespace App\Repositories;

interface TypeRepositoryInterface{
    public function getAllType();
    public function getTypeById($id);
    public function createType($data);
    public function updateType($id, $data);
    public function deleteTypeById($id);
}
