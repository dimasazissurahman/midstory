<?php

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
        // $this->call(UsersTableSeeder::class);
        DB::table('user')->insert([
        	'roles'=> 'admin',
            'name' => 'Joko',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'file' => 'BSBK2241.jpg',
            'gender' => 'male',
            'birthday' => '1998-05-12',
            'address' => 'Balekota',
        ]);
    }
}
