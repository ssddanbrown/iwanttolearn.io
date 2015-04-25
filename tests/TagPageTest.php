<?php

use Laracasts\TestDummy\Factory as TestDummy;

class TagPageTest extends TestCase {

    protected static $attrs = [
        'slug' => 'test-tag-abc123',
        'name' => 'Tag to test abc123'
    ];

    /** @beforeClass */
    public static function createTagToTest()
    {
        TestDummy::create('Learn\Models\Tag', static::$attrs);
    }

    protected function goToTagPage()
    {
        return $this->visit('/t/' . static::$attrs['slug']);
    }

    /** @test */
    public function it_has_a_page_on_the_tag_slug()
    {
        $link = $this->goToTagPage()->crawler->selectLink('Share on Facebook')->link()->getURI();
        $this->assertContains(static::$attrs['slug'], $link);
    }

    /** @test */
    public function social_links_share_the_correct_page()
    {
        $this->goToTagPage()
            ->andSee(static::$attrs['name']);
    }


}
