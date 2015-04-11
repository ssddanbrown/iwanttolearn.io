<?php

class AdminTest extends TestCase {

    /** @test */
    public function it_shows_the_username_on_the_dashboard()
    {
        $this->adminTest(function() {

            $this->visit('/admin')
                ->andSee('Welcome admin');

        });
    }


}
