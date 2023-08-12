<?php

namespace App\Repositories;
use App\Models\Story;

Interface StoryRepositoryInterface{
    public function getAllStory();
    public function getStoryById($id);
    public function createStory($data);
    public function updateStory($id, $data);
    public function deleteStoryById($id);
}
