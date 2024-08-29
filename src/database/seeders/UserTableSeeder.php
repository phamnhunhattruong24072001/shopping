<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'first_name' => 'User One',
                'email' => 'userone@gmail.com',
                'status' => 1,
                'password' => Hash::make("12345678")
            ],
            [
                'first_name' => 'User Two',
                'email' => 'usertwo@gmail.com',
                'status' => 1,
                'password' => Hash::make("12345678")
            ],
        ];

        DB::table('users')->insert($data);
    }
}
