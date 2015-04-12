<?php

class PageTest extends TestCase {

    /** @test */
    public function it_loads_pages_properly()
    {
        $this->visit('/')->seePageIs('/');
        $this->visit('/about')->seePageIs('/about');
    }

    /** @test */
    public function it_redirects_to_the_about_page_when_about_is_clicked()
    {
        $this->visit('/')
            ->click('About')
            ->andSee('About')
            ->onPage('/about');
    }

    /** @test */
    public function it_shows_a_404_page_when_url_does_not_exist()
    {
        $this->call('GET', 'super-cat-404-test');
        $status = $this->statusCode();
        $this->assertEquals(404, $status);

        $this->call('GET', '/t/super-cat-404-test');
        $status = $this->statusCode();
        $this->assertEquals(404, $status);
    }

    /** @test */
    public function it_submits_resource_request_properly()
    {
        $formData = [
            'email' => 'test@iwanttolearn.io',
            'extra-link' => 'http://www.google.com',
            'extra-message' => 'This is a test message'
        ];

        $this->visit('/submit')
            ->andSubmitForm('Submit', $formData)
            ->andSee('Your resource submission was successfully sent')
            ->verifyInDatabase('feedback', ['email' => 'test@iwanttolearn.io']);
    }

}
