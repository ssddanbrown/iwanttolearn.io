<?php namespace Learn\Services;

use League\Flysystem\Exception;
use Learn\Models\Tag;

class SitemapService {

    protected $urls = [];

    protected $baseUrl;

    /**
     * Constructs the sitemap service.
     * An initial set of urls can be passed.
     *
     * @param string[] $urls
     */
    function __construct($urls = [])
    {
        $this->baseUrl = rtrim(url('/'), '/');
        if (!empty($urls)) {
            $this->addUrls($urls);
        }
    }


    /**
     * Generates a sitemap from the urls that have been added.
     * The sitemap is cached for 4 hours.
     *
     * @return string xml sitemap
     */
    public function generate()
    {
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');
        foreach ($this->urls as $url) {
            $urlElem = $xml->addChild('url');
            foreach ($url as $elemName => $elemValue) {
                $urlElem->addChild($elemName, $elemValue);
            }
        }
        $sitemap = $xml->asXML();
        return $sitemap;
    }

    /**
     * Adds an array of url strings to the sitemap.
     * boolean passed in to indicate if the urls
     * are absolute or relative.
     *
     * @param string[] $urlArray
     * @param bool $isRelative
     * @throws Exception
     */
    public function addUrls($urlArray, $isRelative = true)
    {
        foreach ($urlArray as $url) {
            $urlString = $isRelative ? $this->baseUrl . $url : $url;
            $this->addUrl($urlString);
        }
    }

    /**
     * Adds an array of tag pages into the sitemap.
     *
     * @param Tag[] $tags
     * @throws Exception
     */
    public function addTags($tags)
    {
        foreach ($tags as $tag) {
            $loc = $this->baseUrl . $tag->link();
            $lastMod = date('Y-m-d', strtotime($tag->updated_at));
            $this->addUrl($loc, $lastMod, 'weekly', '0.8');
        }
    }

    /**
     * Adds a url set to this objects instance.
     *
     * @param string $loc
     * @param null $lastmod
     * @param null $changefreq
     * @param null $priority
     * @throws Exception
     */
    private function addUrl($loc, $lastmod=null, $changefreq=null, $priority=null)
    {
        if($loc == null) {
            throw new Exception('Url not provided');
        }

        $urlSet = [];
        $urlSet['loc'] = $loc;
        if ($lastmod !== null) $urlSet['lastmod'] = $lastmod;
        if ($changefreq !== null) $urlSet['changefreq'] = $changefreq;
        if ($priority !== null) $urlSet['priority'] = $priority;

        $index = count($this->urls);
        $this->urls[$index] = $urlSet;
    }

}