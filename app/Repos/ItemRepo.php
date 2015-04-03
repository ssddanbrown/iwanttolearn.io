<?php
/**
 * Created by PhpStorm.
 * User: Dan
 * Date: 30/03/2015
 * Time: 19:46
 */

namespace Learn\Repos;


use Learn\Models\Article;
use Learn\Models\Format;
use Learn\Models\Resource;
use Learn\Models\Tag;

class ItemRepo {

    protected $tag;
    protected $format;
    protected $resource;
    protected $article;

    function __construct(Tag $tag,Format $format, Resource $resource, Article $article)
    {
        $this->tag = $tag;
        $this->format = $format;
        $this->resource = $resource;
        $this->article = $article;
    }

    public function getAllTags()
    {
        return $this->tag->all();
    }

    public function getTagBySlug($slug)
    {
        return $this->tag->where('slug', '=', $slug)->first();
    }

    public function getResourcesByTagGroupedByFormat($tag)
    {
        $resources = $tag->resources()->with('formats')->get();

        $formatResourceArray = array();
        foreach($resources as $resource) {
            foreach($resource->formats as $format) {
                $formatResourceArray[$format->order]['resources'][] = $resource;
                $formatResourceArray[$format->order]['format'] = $format;
            }
        }
        ksort($formatResourceArray);
        return $formatResourceArray;
    }

    public function getRecentResources($count = 10)
    {
        return $this->resource->orderBy('created_at', 'desc')->take($count)->get();
    }


}