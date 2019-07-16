<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $admin = \App\Admin::create([
			'first_name'=>'super',
			'last_name'=>'admin',
			'email'=>'super_admin@test.com',
			'password'=>bcrypt('123456'),
       ]);

       $admin->attachRole('super_admin');
    }
}
