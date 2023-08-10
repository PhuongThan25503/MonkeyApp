<?php

namespace App\Repositories;

use App\Models\Story;
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
        return Story::class;
    }

    public function getAllStory()
    {
        return Story::all();
    }

    public function getStoryById($id)
    {
        return Story::find($id);
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
