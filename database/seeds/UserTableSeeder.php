<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Michael',
            'email' => 'michael130199@gmail.com',
            'password' => '12345678'
        ]);
    }
}
