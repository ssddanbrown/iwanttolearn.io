<?php namespace Learn\Http\Composers;


use Illuminate\Contracts\View\View;
use Learn\Models\Format;
use Learn\Models\Tag;
use Learn\Repos\FormatRepo;
use Learn\Repos\ResourceRepo;
use Learn\Repos\TagRepo;

class FrontPartsComposer extends NamedComposer {

    protected $tagRepo;
    protected $resourceRepo;
    protected $formatRepo;

    function __construct(TagRepo $tagRepo, ResourceRepo $resourceRepo, FormatRepo $formatRepo)
    {
        $this->tagRepo = $tagRepo;
        $this->resourceRepo = $resourceRepo;
        $this->formatRepo = $formatRepo;
    }

    public function tagLinks(View $view)
    {
        $tags = $this->tagRepo->getAllOrderByName();
        $view->with('tags', $tags);
    }

    public function formatLinks(View $view)
    {
        $formats = $this->formatRepo->getAll();
        $view->with('formats', $formats);
    }

    public function recentResources(View $view)
    {
        $recentResources = $this->resourceRepo->getRecentlyCreatedFrontPage()->all();
        $view->with('resources', $recentResources);
    }


}