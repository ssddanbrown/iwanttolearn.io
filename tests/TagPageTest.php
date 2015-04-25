<?php

use Laracasts\TestDummy\Factory as TestDummy;

class TagPageTest extends TestCase {


    /** @test */
    public function it_has_a_page_on_the_tag_slug()
    {
        $testTag = TestDummy::create('Learn\Models\Tag');
        $this->visit('/t/' . $testTag->slug)
            ->andSee($testTag->name);
    }

    /** @test */
    public function social_links_share_the_correct_page()
    {
        $testTag = TestDummy::create('Learn\Models\Tag');
        $link = $this->visit('/t/' . $testTag->slug)
            ->crawler->selectLink('Share on Facebook')->link()->getURI();
        $this->assertContains($testTag->slug, $link);
    }

    /** @test */
    public function it_displays_resources()
    {
        $testTag = TestDummy::create('Learn\Models\Tag');
        $format = TestDummy::create('Learn\Models\Format');
        $resources = TestDummy::times(5)->create('Learn\Models\Resource');
        $testName = 'Test-resource-1001';

        $resources->push(TestDummy::create('Learn\Models\Resource', ['name' => $testName]));
        foreach($resources as $resource) {
            $resource->syncFormatArray([$format->id]);
            $resource->syncTagArray([$testTag->id]);
        }
        $this->cacheClear();

        $this->visit('/t/' . $testTag->slug)
            ->andSee($testName);
    }

}
