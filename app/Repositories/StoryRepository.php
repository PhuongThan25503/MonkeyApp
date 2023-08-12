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

    public function createStory($story)
    {
        return Story::create($story->toArray());
    }

    public function updateStory($id, $data)
    {
        $story = Story::find($id);
        return $story->update($data->toArray());
    }

    public function deleteStoryById($id){
        return Story::destroy($id);
    }
}
