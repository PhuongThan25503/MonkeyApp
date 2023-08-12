<?php
namespace App\Repositories;

interface PageRepositoryInterface{
    public function getAllPage();
    public function getPageById($id);
    public function createPage($data);
    public function updatePage($id, $data);
    public function deletePageById($id);
}
