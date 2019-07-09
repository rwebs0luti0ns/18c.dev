<?php

use App\Models\Auth\Admin;
use App\Models\Auth\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	Admin::create([
			'name' 			=> 'Superadmin',
			'username' 		=> 'super_admin',
			'password' 		=> Hash::make('123321'),
			'role' 			=> 'super_admin',
    	]);
    }
}
