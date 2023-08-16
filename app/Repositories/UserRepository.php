<?php

namespace App\Repositories;

use App\Models\User;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return User::class;
    }

    public function getAllUser()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function createUser($data)
    {
        return User::create($data->toArray());
    }

    public function updateUser($id, $data)
    {
        $User = User::find($id);
        return $User->update($data->toArray());
    }

    public function deleteUserById($id)
    {
        return User::destroy($id);
    }

    public function isApiTokenExist($token)
    {
        return User::where('api_token', $token)->exists();
    }
}
