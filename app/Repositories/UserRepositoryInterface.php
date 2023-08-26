<?php

namespace App\Repositories;

interface UserRepositoryInterface{
    public function getAllUser();
    public function getUserById($id);
    public function getUserByToken($token);
    public function createUser($data);
    public function updateUser($id, $data);
    public function deleteUserById($id);
    public function isApiTokenExist($token);
    public function isRoleMatch($user, $role);
    public function isIdMatch($user, $id);
}
