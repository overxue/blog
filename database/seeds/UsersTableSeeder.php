<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'XueCong',
            'email' => '409771385@qq.com',
            'password' => bcrypt('xuecong'),
            'remember_token' => str_random(10),
        ]);
    }
}
