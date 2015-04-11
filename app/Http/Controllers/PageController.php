<?php namespace Learn\Http\Controllers;

use Learn\Repos\ResourceRepo;
use Learn\Repos\TagRepo;
use Learn\Services\SitemapService;

class PageController extends Controller {

    protected $tagRepo;
    protected $resourceRepo;

    // A list of urls to static pages
    // Used for sitemap generation.
    protected $staticUrls = [
        '/',
        '/about',
        '/submit'
    ];

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
        if ($tag === null) {
            abort(404);
        }
        $resourceGroups = $this->resourceRepo->getByTagGroupedByFormat($tag);
        return view('front/tag', ['tag' => $tag, 'resourceGroups' => $resourceGroups]);
    }

    /**
     * Dynamically Creates a sitemap for crawlers such as Google.
     * @param SitemapService $sitemapService
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function sitemap(SitemapService $sitemapService)
    {
        $tags = $this->tagRepo->getAll();
        $sitemapService->addUrls($this->staticUrls);
        $sitemapService->addTags($tags);
        $sitemap = $sitemapService->generate();
        return response($sitemap, 200, ['Content-Type' => 'text/xml']);
    }

}
