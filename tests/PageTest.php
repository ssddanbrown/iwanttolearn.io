<?php

class PageTest extends TestCase {

    /** @test */
    public function it_loads_pages_properly()
    {
        $this->visit('/');
        $this->visit('/about');
    }

    /** @test */
    public function it_is_live_on_the_web()
    {
        $this->visit('https://iwanttolearn.io/catss')
            ->seePageIs('https://iwanttolearn.io/catss');
    }

    /** @test */
    public function it_redirects_to_the_about_page_when_about_is_clicked()
    {
        $this->visit('/')
            ->click('About')
            ->andSee('About')
            ->onPage('/about');
    }



}
