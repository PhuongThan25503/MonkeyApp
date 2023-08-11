<?php

namespace App\Repositories;

use App\Models\Touch;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use TouchRepositoryInterface;

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
        // TODO: Implement getAllTouch() method.
    }

    public function getTouchById($id)
    {
        // TODO: Implement getTouchById() method.
    }

    public function createTouch($data)
    {
        // TODO: Implement createTouch() method.
    }

    public function updateTouch($id, $data)
    {
        // TODO: Implement updateTouch() method.
    }

    public function deleteTouchById($id)
    {
        // TODO: Implement deleteTouchById() method.
    }


}
