<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $admin = \App\Model\Setting::create([
			'main_lang'=>'ar',
      'sitename_ar'=>'عروض الرحاب',
      'sitename_en'=>'Rehab Offers',
      'status'=>'open',
       ]);
    }
}
