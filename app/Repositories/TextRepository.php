<?php

namespace App\Repositories;

use App\Models\Text;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class TextRepository.
 */
class TextRepository extends BaseRepository implements TextRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Text::class;
    }

    public function getAllText()
    {
        return Text::all();
    }

    public function getTextById($id)
    {
        return Text::find($id);
    }

    public function createText($data)
    {
        return Text::create($data->toArray());
    }

    public function updateText($id, $data)
    {
        $text = Text::find($id);
        return $text->update($data->toArray());
    }

    public function deleteTextById($id)
    {
        return Text::destroy($id);
    }


}
