<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Learn\Models\Format;
use Learn\Models\User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('FormatTableSeeder');
        $this->command->info('Format Table Seeded!');

        $this->call('InitialUserSeeder');
        $this->command->info('Intitial user added!');
	}

}

class FormatTableSeeder extends Seeder {

    public function run()
    {
        Format::create(['name' => 'Article', 'plural' => 'Articles', 'icon' => 'file-text']);
        Format::create(['name' => 'Video', 'plural' => 'Videos', 'icon' => 'film']);
        Format::create(['name' => 'Book', 'plural' => 'Books','icon' => 'book']);
        Format::create(['name' => 'Blog', 'plural' => 'Blogs', 'icon' => 'th-list']);
        Format::create(['name' => 'Interactive', 'plural' => 'Interactive Sites', 'icon' => 'keyboard-o']);
        Format::create(['name' => 'Community', 'plural' => 'Community Hubs', 'icon' => 'group']);
    }

}

class InitialUserSeeder extends Seeder {

    public function run()
    {
        User::create(['name' => 'admin', 'email' => 'admin@admin.com', 'password' => Hash::make('password')]);
    }

}