<?php namespace Learn\Repos;

use Learn\Models\Resource;
use Illuminate\Cache\Repository as Cache;

class ResourceRepo {

    protected $resource;
    protected $cache;

    // The tags used for caching.
    protected $cacheTags = [
        'byTagGrouped' => 'resources-by-tag-grouped-', // Append tagID
        'recentFrontPage' => 'resources-recent-front-page'
    ];

    function __construct(Resource $resource, Cache $cache)
    {
        $this->resource = $resource;
        $this->cache = $cache;
    }

    /**
     * Cleans all relevant cache entries for a resource.
     * @param $resource
     */
    public function cleanCache($resource) {
        $this->cache->forget($this->cacheTags['recentFrontPage']);
        foreach ($resource->tags as $tag) {
            $this->cache->forget($this->cacheTags['byTagGrouped'] . $tag->id);
        }
    }

    /**
     * Gets the resources that belongs to a tag and groups them
     * by their formats.
     *
     * This method is cached for speed.
     * @param $tag
     * @return array
     */
    public function getByTagGroupedByFormat($tag)
    {
        $cacheKey = $this->cacheTags['byTagGrouped'] . $tag->id;
        if ($this->cache->has($cacheKey)) {
            return $this->cache->get($cacheKey);
        }

        $resources = $tag->resources()->with('formats')->get();

        $formatResourceArray = array();
        foreach($resources as $resource) {
            foreach($resource->formats as $format) {
                $formatResourceArray[$format->order]['resources'][] = $resource;
                $formatResourceArray[$format->order]['format'] = $format;
            }
        }
        ksort($formatResourceArray);

        $this->cache->forever($cacheKey, $formatResourceArray);
        return $formatResourceArray;
    }

    /**
     * Gets the most recently created for display on the front page.
     * The set count allows caching for performance.
     */
    public function getRecentlyCreatedFrontPage()
    {
        $cacheKey = $this->cacheTags['recentFrontPage'];
        if ($this->cache->has($cacheKey)) {
            return $this->cache->get($cacheKey);
        }

        $resources = $this->getRecentlyCreated(9);
        $this->cache->forever($cacheKey, $resources);
        return $resources;
    }

    /**
     * Gets the chosen quantitiy of most recently created resources.
     *
     * @param int $count
     * @return mixed
     */
    public function getRecentlyCreated($count = 10)
    {
        return $this->resource->orderBy('created_at', 'desc')->take($count)->get();
    }

    /**
     * Destroys a resource with it's attachments and empties
     * the relevant cache entries.
     * Returns the name of the resource for notification use.
     *
     * @param $id
     * @return string Resource Name
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->resource = $this->resource->find($id);
        $name = $this->resource->name;

        $this->cleanCache($this->resource);
        $this->resource->tags()->detach();
        $this->resource->formats()->detach();
        $this->resource->delete();
        return $name;
    }


}