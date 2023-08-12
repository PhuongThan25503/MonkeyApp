<?php

namespace App\Repositories;

use App\Models\Touch;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

//use Your Model

/**
 * Class TouchRepository.
 */
class TouchRepository extends BaseRepository implements TouchRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Touch::class;
    }

    public function getAllTouch()
    {
        return Touch::all();
    }

    public function getTouchById($id)
    {
        return Touch::find($id);
    }

    public function createTouch($data)
    {
        return Touch::create($data->toArray());
    }

    public function updateTouch($id, $data)
    {
        $touch = Touch::find($id);
        return $touch->update($data->toArray());
    }

    public function deleteTouchById($id)
    {
        Return Touch::destroy($id);
    }


}
