<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('rootadmin'),
            'created_at' => Now()
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Author',
            'email' => 'author@gmail.com',
            'password' => bcrypt('rootauthor'),
            'created_at' => Now()
        ]);

    }
}
