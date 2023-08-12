<?php

namespace App\Repositories;

interface TextRepositoryInterface{
    public function getAllText();
    public function getTextById($id);
    public function createText($data);
    public function updateText($id, $data);
    public function deleteTextById($id);
}
