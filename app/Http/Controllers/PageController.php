<?php namespace Learn\Http\Controllers;

use Learn\Repos\ItemRepo;

class PageController extends Controller {

    protected $itemRepo;

    function __construct(ItemRepo $itemRepo)
    {
        $this->itemRepo = $itemRepo;
    }


    /**
     * Shows the initial homepage.
     *
     * @return \Illuminate\View\View
     */
	public function homepage()
	{
        $tags = $this->itemRepo->getAllTags();
        $recentResources = $this->itemRepo->getRecentResources(6);
		return view('front/homepage', ['tags' => $tags, 'recentResources' => $recentResources]);
	}

    /**
     * Show the page for a specific tag.
     *
     * @param $tagSlug
     * @return \Illuminate\View\View
     */
    public function tag($tagSlug)
    {
        $tag = $this->itemRepo->getTagBySlug($tagSlug);
        $resourceGroups = $this->itemRepo->getResourcesByTagGroupedByFormat($tag);
        return view('front/tag', ['tag' => $tag, 'resourceGroups' => $resourceGroups]);
    }

}
