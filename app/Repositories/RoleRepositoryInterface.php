<?php

namespace App\Repositories;
use App\Models\Role;

Interface RoleRepositoryInterface{
    public function getAllRole();
    public function getRoleById($id);
    public function createRole($data);
    public function updateRole($id, $data);
    public function deleteRoleById($id);
}
