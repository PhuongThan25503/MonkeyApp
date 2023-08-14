<?php

namespace App\Repositories;

interface UserRepositoryInterface{
    public function getAllUser();
    public function getUserById($id);
    public function createUser($data);
    public function updateUser($id, $data);
    public function deleteUserById($id);
}
