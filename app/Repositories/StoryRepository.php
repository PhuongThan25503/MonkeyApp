<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class StoryRepository.
 */
class StoryRepository extends BaseRepository implements StoryRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
    }

    public function getAllStory()
    {
        // TODO: Implement getAllStory() method.
    }

    public function getStoryById($id)
    {
        // TODO: Implement getStoryById() method.
    }

    public function createStory($data)
    {
        // TODO: Implement createStory() method.
    }

    public function updateStory($id, $data)
    {
        // TODO: Implement updateStory() method.
    }


}
