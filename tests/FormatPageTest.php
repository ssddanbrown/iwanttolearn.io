<?php

use Laracasts\TestDummy\Factory as TestDummy;

class FormatPageTest extends TestCase {

    protected $testFormat;

    protected static $attrs = [
        'slug' => 'test-format-abc123',
        'name' => 'Format to test abc123'
    ];

    /** @setUp */
    public function createTestFormatInDatabase()
    {
        if ($this->testFormat == null) {
            $this->testFormat = TestDummy::create('Learn\Models\Format', static::$attrs);
        }
    }

    protected function goToFormatPage()
    {
        return $this->visit('/f/' . static::$attrs['slug']);
    }


    /** @test */
    public function it_has_a_page_on_the_format_slug()
    {
        $this->goToFormatPage()
            ->andSee(static::$attrs['name']);
    }

    /** @test */
    public function it_says_sorry_when_no_resources_are_available()
    {
        $this->goToFormatPage()
            ->andSee('Sorry, No resources are available in this format.');
    }


}
