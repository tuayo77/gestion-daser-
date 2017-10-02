<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$array = ['name'=>'Administrator','email'=>'admin@admin.com','password'=>bcrypt('admin@admin.com')];
    	
        \App\Models\User::truncate();
        \App\Models\User::create($array);
    }
}
