<?php

namespace App\Repositories;

use App\Models\Page;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class PageRepository.
 */
class PageRepository extends BaseRepository implements PageRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Page::class;
    }

    public function getAllPage()
    {
        return Page::all();
    }

    public function getPageById($id)
    {
        return Page::find($id);
    }

    public function createPage($data)
    {
        return Page::create($data->toArray());
    }

    public function updatePage($id, $data)
    {
        $page = Page::find($id);
        return $page->update($data->toArray());
    }

    public function deletePageById($id)
    {
        return Page::destroy($id);
    }

    public function getPagesByStoryId($id){
        $page = Page::where('story_id', $id)->orderBy('page_num')->get();
        return $page;
    }
}
