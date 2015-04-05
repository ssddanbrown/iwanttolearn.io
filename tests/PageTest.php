<?php

class PageTest extends TestCase {

    protected $baseUrl = 'http://iwanttolearn.io';

    /** @test */
    public function verify_that_pages_load_properly()
    {
        $this->visit('/');
        $this->visit('/about');
    }

    /** @test */
    public function about_link_on_homepage_goes_to_about_page()
    {
        $this->visit('/')
            ->click('about')
            ->andSee('About')
            ->onPage('/about');
    }

}
