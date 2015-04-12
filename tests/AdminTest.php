<?php

class AdminTest extends TestCase {

    /** @test */
    public function it_shows_the_username_on_the_dashboard()
    {
        $this->adminTest(function() {

            $this->visit('/admin')
                ->see('Welcome admin');

        });
    }

    /** @test */
    public function it_allows_adding_a_valid_resource()
    {
        $this->adminTest(function() {

            $formData = [
                'name' => 'Test Resource - abc123',
                'link' => 'http://www.google.com',
                'description' => 'Test desc - abc456',
                'cost' => 'paid'
            ];

            $invalidData = $formData;
            $invalidData['name'] = '';
            $invalidData['link'] = 'http';

            $this->visit('/admin/resources')
                ->andClick('New')
                ->seePageIs('/admin/resources/create')
                ->submitForm('Save', $invalidData)
                ->andSee('name field is required')
                ->andSee('link format is invalid')
                ->submitForm('Save', $formData)
                ->seeInDatabase('resources', $formData)
                ->visit('/admin/resources')
                ->andSee($formData['name']);
        });
    }

    /** @test */
    public function it_allows_adding_a_valid_tag()
    {
        $this->adminTest(function() {

            $formData = [
                'name' => 'Test Tag - abc123',
                'slug' => 'test-tag',
                'description' => 'Test tag desc - abc456'
            ];

            $invalidData = $formData;
            $invalidData['name'] = '';

            $this->visit('/admin/tags')
                ->andClick('New')
                ->seePageIs('/admin/tags/create')
                ->submitForm('Save', $invalidData)
                ->andSee('name field is required')
                ->submitForm('Save', $formData)
                ->seeInDatabase('tags', $formData)
                ->visit('/admin/tags')
                ->andSee($formData['name']);
        });
    }

    /** @test */
    public function it_allows_adding_a_valid_format()
    {
        $this->adminTest(function() {

            $formData = [
                'name' => 'Test Format - abc123',
                'plural' => 'Test Formats',
                'order' => '0',
                'icon' => 'book'
            ];

            $invalidData = $formData;
            $invalidData['name'] = '';

            $this->visit('/admin/formats')
                ->andClick('New')
                ->seePageIs('/admin/formats/create')
                ->submitForm('Save', $invalidData)
                ->andSee('name field is required')
                ->submitForm('Save', $formData)
                ->seeInDatabase('formats', $formData)
                ->visit('/admin/formats')
                ->andSee($formData['name']);
        });
    }

    /** @test */
    public function it_allows_adding_a_valid_new_user()
    {
        $this->adminTest(function() {

            $formData = [
                'name' => 'Test User 101',
                'email' => 'testuser@iwanttolearn.io'
            ];

            $invalidData = $formData;
            $invalidData['name'] = '';
            $invalidData['password'] = 'password';
            $invalidData['password-confirm'] = '';

            $this->visit('/admin/users')
                ->andClick('New')
                ->seePageIs('/admin/users/create')
                ->submitForm('Save', $invalidData)
                ->andSee('name field is required')
                ->andSee('password and password-confirm must match')
                ->submitForm('Save', $formData + ['password-confirm' => 'password', 'password' => 'password'])
                ->seeInDatabase('users', $formData)
                ->visit('/admin/users')
                ->andSee($formData['name']);
        });
    }


}
