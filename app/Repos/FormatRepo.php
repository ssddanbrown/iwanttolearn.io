<?php namespace Learn\Repos;

use Learn\Models\Format;
use Illuminate\Cache\Repository as Cache;

class FormatRepo {

    protected $format;
    protected $cache;

    protected $cacheFormats = [
        'all' => 'format-all',
        'allByName' => 'format-all-by-name'
    ];

    function __construct(Format $format, Cache $cache)
    {
        $this->format = $format;
        $this->cache = $cache;
    }

    /**
     * Cleans all relevant cache entries for a format.
     * @param $resource
     */
    public function cleanCache($format)
    {
        $this->cache->forget($this->cacheFormats['all']);
        $this->cache->forget($this->cacheFormats['allByName']);
    }

    /**
     * Gets the number of formats on the system.
     */
    public function getTotalCount()
    {
        return count($this->getAll());
    }

    /**
     * Gets all the formats available.
     *
     * This method is cached for speed.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->allFormats('all', 'created_at');
    }

    /**
     * Gets all the formats available ordered by name.
     *
     * This method is cached for speed.
     * @return mixed
     */
    public function getAllOrderByName()
    {
        return $this->allFormats('allByName', 'name', 'asc');
    }

    /**
     * Gets all formats available with a format for caching
     * and a specified column for sorting.
     *
     * @param string $cacheFormatName
     * @param string $orderColumn
     * @param string $orderDirection
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function allFormats($cacheFormatName, $orderColumn, $orderDirection = 'asc')
    {
        $cacheFormat = $this->cacheFormats[$cacheFormatName];

        if ($this->cache->has($cacheFormat)) {
            return $this->cache->get($cacheFormat);
        }

        $formats = $this->format->orderBy($orderColumn, $orderDirection)->get();
        $this->cache->forever($cacheFormat, $formats);
        return $formats;
    }

    /**
     * Gets the format from the supplied url slug.
     *
     * @param string $slug
     * @return mixed
     */
    public function getBySlug($slug)
    {
        return $this->format->where('slug', '=', $slug)->first();
    }

}