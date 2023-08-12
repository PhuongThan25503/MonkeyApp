<?php

namespace App\Repositories;

use App\Models\TextConfig;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class TextConfigRepository.
 */
class TextConfigRepository extends BaseRepository implements TextConfigRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return TextConfig::class;
    }

    public function getAllTextConfig()
    {
        return TextConfig::all();
    }

    public function getTextConfigById($id)
    {
        return  TextConfig::find($id);
    }

    public function createTextConfig($data)
    {
        return TextConfig::create($data->toArray());
    }

    public function updateTextConfig($id, $data)
    {
        $textConfig = TextConfig::find($id);
        return $textConfig->update($data->toArray());
    }

    public function deleteTextConfigById($id)
    {
        return TextConfig::destroy($id);
    }

}
