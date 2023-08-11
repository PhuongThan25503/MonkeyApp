<?php

namespace App\Repositories;
Interface StoryRepositoryInterface{
    public function getAllStory();
    public function getStoryById($id);
    public function createStory($data);
    public function updateStory($id, $data);
    public function deleteStoryById($id);
}
