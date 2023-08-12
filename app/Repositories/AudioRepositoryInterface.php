<?php

namespace App\Repositories;

interface AudioRepositoryInterface{
    public function getAllAudio();
    public function getAudioById($id);
    public function createAudio($data);
    public function updateAudio($id, $data);
    public function deleteAudioById($id);
}
