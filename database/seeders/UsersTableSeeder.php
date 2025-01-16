<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create multiple users
        DB::table('users')->insert([
            'username' => 'teste1',
            'password' => bcrypt('123456'),
            'last_login' => date('Y-m-d H:i:s')
        ]
    );

    }
}
