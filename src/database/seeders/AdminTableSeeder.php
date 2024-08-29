<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Supper Admin',
                'email' => 'supperadmin@gmail.com',
                'username' => 'supperadmin',
                'status' => 1,
                'role' => 0,
                'password' => Hash::make("12345678")
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'status' => 1,
                'role' => 1,
                'password' => Hash::make("12345678")
            ],
        ];

        DB::table('admins')->insert($data);
    }
}
