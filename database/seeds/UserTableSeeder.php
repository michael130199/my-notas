<?php

use App\User;
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
            'password' => bcrypt('12345678')
        ]);
    }
}
