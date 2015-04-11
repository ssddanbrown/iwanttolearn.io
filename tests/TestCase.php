<?php

use Laracasts\Integrated\Extensions\Laravel as IntegrationTest;
use Laracasts\Integrated\Services\Laravel\DatabaseTransactions;

class TestCase extends IntegrationTest {

    use DatabaseTransactions;

    protected $baseUrl = 'http://iwanttolearn.io';

	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
		$app = require __DIR__.'/../bootstrap/app.php';

		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

		return $app;
	}

    /**
     * Provides a wrapper for admin area tests.
     * @param $callback
     */
    public function adminTest($callback)
    {
        $this->logIntoAdminArea();
        $callback();
        $this->logOutOfAdminArea();
    }

    /**
     * Logs into admin area with seeded user.
     * @param array $credentials
     * @return
     */
    public function logIntoAdminArea($credentials = array())
    {
        $defaultCredentials = [
            'email' => 'admin@admin.com',
            'password' => 'password'
        ];
        if (empty($credentials)) $credentials = $defaultCredentials;
        return $this->visit('/admin/login')
            ->andSubmitForm('Log In', $credentials);
    }

    /**
     * Logs out of admin area.
     */
    public function logOutOfAdminArea()
    {
        return $this->visit('/admin/logout');
    }

}
