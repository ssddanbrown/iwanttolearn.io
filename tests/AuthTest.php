<?php

class AuthTest extends TestCase {

    /** @test */
    public function authentication_required_for_admin_pages()
    {
        $this->visit('/admin/resources')
            ->andSee('Login')
            ->onPage('/admin/login');
    }

    /** @test */
    public function it_does_not_login_with_incorrect_credentials()
    {
        $this->logIntoAdminArea([
            'email' => 'admin@admin.com',
            'password' => 'wrongPass'
        ])
            ->andSee('Login')
            ->onPage('/admin/login');
    }

    /** @test */
    public function it_logs_in_with_correct_credentials()
    {
        $this->logIntoAdminArea()
            ->andSee('Welcome')
            ->onPage('/admin');
    }

    /** @test */
    public function it_logs_out_a_user_and_redirects_to_homepage()
    {
        $this->logIntoAdminArea()
            ->andClick('Logout')
            ->seePageIs('/');

        $this->authentication_required_for_admin_pages();
    }

}
