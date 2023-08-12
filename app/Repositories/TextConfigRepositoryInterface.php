<?php

namespace App\Repositories;

interface TextConfigRepositoryInterface{
    public function getAllTextConfig();
    public function getTextConfigById($id);
    public function createTextConfig($data);
    public function updateTextConfig($id, $data);
    public function deleteTextConfigById($id);
}
