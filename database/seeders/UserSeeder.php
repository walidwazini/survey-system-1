<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $demoUsers = [
            [
                'name' => 'Ava',
                'username' => '@ava1996',
                'email' => 'ava@email.com',
                'password' => bcrypt('ava123'),
            ],
            [
                'name' => 'Sarah',
                'username' => '@sarah_rk',
                'email' => 'sarah@email.com',
                'password' => bcrypt('sarah123'),
            ],
        ];
        DB::table('users')->insert($demoUsers);
    }
}
