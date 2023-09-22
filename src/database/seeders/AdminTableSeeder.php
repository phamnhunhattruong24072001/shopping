<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Supper Admin',
            'email' => 'supperadmin@gmail.com',
            'username' => 'supperadmin',
            'status' => 1,
            'role' => 0,
            'password' => bcrypt('12345678')
        ];
        DB::table('admin')->insert($data);
    }
}
