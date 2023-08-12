<?php

namespace App\Repositories;

use App\Models\Type;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class TypeRepository.
 */
class TypeRepository extends BaseRepository implements TypeRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Type::class;
    }

    public function getAllType()
    {
        return Type::all();
    }

    public function getTypeById($id)
    {
        return Type::find($id);
    }

    public function createType($data)
    {
        return Type::create($data->toArray());
    }

    public function updateType($id, $data)
    {
        $Type = Type::find($id);
        return $Type->update($data->toArray());
    }

    public function deleteTypeById($id)
    {
        return Type::destroy($id);
    }
}
