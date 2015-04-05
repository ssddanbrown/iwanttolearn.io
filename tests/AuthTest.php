<?php

use Laracasts\TestDummy\Factory as TestDummy;

class AuthTest extends TestCase {


    /** @test */
    public function authentication_required_for_admin_pages()
    {
        $this->visit('/admin/resources')
            ->andSee('Login')
            ->onPage('/admin/login');
    }


}
