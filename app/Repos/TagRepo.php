<?php namespace Learn\Repos;

use Learn\Models\Tag;
use Illuminate\Cache\Repository as Cache;

class TagRepo {

    protected $tag;
    protected $cache;

    protected $cacheTags = [
        'all' => 'tag-all',
    ];

    function __construct(Tag $tag, Cache $cache)
    {
        $this->tag = $tag;
        $this->cache = $cache;
    }

    /**
     * Cleans all relevant cache entries for a tag.
     * @param $resource
     */
    public function cleanCache($tag) {
        $this->cache->forget($this->cacheTags['all']);
    }

    /**
     * Gets all the tags available.
     *
     * This method is cached for speed.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        $cacheTag = $this->cacheTags['all'];

        if ($this->cache->has($cacheTag)) {
            return $this->cache->get($cacheTag);
        }

        $tags = $this->tag->orderBy('created_at', 'desc')->get();
        $this->cache->forever($cacheTag, $tags);
        return $tags;
    }

    /**
     * Gets the tag from the supplied url slug.
     *
     * @param string $slug
     * @return mixed
     */
    public function getBySlug($slug)
    {
        return $this->tag->where('slug', '=', $slug)->first();
    }

    /**
     * Destroy a tag along with it's attachments and
     * cache entries.
     *
     * Returns the tag name for notification purposes.
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $this->tag = $this->tag->find($id);
        $name = $this->tag->name;

        $this->cleanCache($this->tag);
        $this->tag->tags()->detach();
        $this->tag->resources()->detach();
        $this->tag->articles()->detach();
        $this->tag->delete();
        return $name;
    }


}