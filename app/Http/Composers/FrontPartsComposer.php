<?php namespace Learn\Http\Composers;


use Illuminate\Contracts\View\View;
use Learn\Models\Format;
use Learn\Models\Tag;
use Learn\Repos\ResourceRepo;
use Learn\Repos\TagRepo;

class FrontPartsComposer extends NamedComposer {

    protected $tagRepo;
    protected $resourceRepo;

    function __construct(TagRepo $tagRepo, ResourceRepo $resourceRepo)
    {
        $this->tagRepo = $tagRepo;
        $this->resourceRepo = $resourceRepo;
    }

    public function tagLinks(View $view)
    {
        $tags = $this->tagRepo->getAll();
        $view->with('tags', $tags);
    }

    public function recentResources(View $view)
    {
        $recentResources = $this->resourceRepo->getRecentlyCreatedFrontPage();
        $view->with('resources', $recentResources);
    }


}