<?php

namespace App\Repositories;

use App\Models\Audio;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class AudioRepository.
 */
class AudioRepository extends BaseRepository implements AudioRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Audio::class;
    }

    public function getAllAudio()
    {
        return Audio::all();
    }

    public function getAudioById($id)
    {
        return Audio::find($id);
    }

    public function createAudio($data)
    {
        return Audio::create($data->toArray());
    }

    public function updateAudio($id, $data)
    {
        $Audio = Audio::find($id);
        return $Audio->update($data->toArray());
    }

    public function deleteAudioById($id)
    {
        return Audio::destroy($id);
    }
}
