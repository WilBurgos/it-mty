<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Wilbert Burgos',
            'email' => 'wil@example.com',
            'password' => bcrypt('example'),
        ]);
    }
}
