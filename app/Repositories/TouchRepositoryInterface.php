<?php

interface TouchRepositoryInterface{
    public function getAllTouch();
    public function getTouchById($id);
    public function createTouch($data);
    public function updateTouch($id, $data);
    public function deleteTouchById($id);
}
