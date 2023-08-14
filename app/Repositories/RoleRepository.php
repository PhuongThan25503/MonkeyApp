<?php

namespace App\Repositories;

use App\Models\Role;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class RoleRepository.
 */
class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Role::class;
    }

    public function getAllRole()
    {
        return Role::all();
    }

    public function getRoleById($id)
    {
        return Role::find($id);
    }

    public function createRole($data)
    {
        return Role::create($data->toArray());
    }

    public function updateRole($id, $data)
    {
        $Role = Role::find($id);
        return $Role->update($data->toArray());
    }

    public function deleteRoleById($id){
        return Role::destroy($id);
    }
}
