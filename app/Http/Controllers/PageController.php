<?php namespace Learn\Http\Controllers;

use Learn\Repos\ResourceRepo;
use Learn\Repos\TagRepo;

class PageController extends Controller {

    protected $tagRepo;
    protected $resourceRepo;

    function __construct(TagRepo $tagRepo, ResourceRepo $resourceRepo)
    {
        $this->tagRepo = $tagRepo;
        $this->resourceRepo = $resourceRepo;
    }

    /**
     * Shows the initial homepage.
     *
     * @return \Illuminate\View\View
     */
	public function homepage()
	{
		return view('front/homepage', [
            'tags' => $this->tagRepo->getAll()
        ]);
	}

    /**
     * Shows the about page.
     */
    public function about()
    {
        $totals = [
            'tags' => $this->tagRepo->getTotalCount(),
            'resources' => $this->resourceRepo->getTotalCount()
        ];
        return view('front/about', ['totals' => $totals]);
    }

    /**
     * Shows the resource/topic suggestion page.
     */
    public function submit()
    {
        return view('front/submit');
    }

    /**
     * Show the page for a specific tag.
     *
     * @param $tagSlug
     * @return \Illuminate\View\View
     */
    public function tag($tagSlug)
    {
        $tag = $this->tagRepo->getBySlug($tagSlug);
        $resourceGroups = $this->resourceRepo->getByTagGroupedByFormat($tag);
        return view('front/tag', ['tag' => $tag, 'resourceGroups' => $resourceGroups]);
    }

}
