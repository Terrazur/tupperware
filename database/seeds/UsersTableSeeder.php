<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'cs',
        	'email' => 'cs@email.com',
        	'phone' => 'cs',
        	'password' => bcrypt('dummy'),
        	'addr' => 'cs',
        	'wallet' => '0',
        	'role' => 'CS',
        ]);

        DB::table('users')->insert([
            'name' => 'pd',
        	'email' => 'pd@email.com',
        	'phone' => 'pd',
        	'password' => bcrypt('dummy'),
        	'addr' => 'pd',
        	'wallet' => '0',
        	'role' => 'PD',
        ]);
    }
}
