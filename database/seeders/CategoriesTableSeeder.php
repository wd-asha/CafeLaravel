<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'title' => 'soup',
            'slug' => 'soup',
            'created_at' => Now()
        ]);

        DB::table('categories')->insert([
            'title' => 'salad',
            'slug' => 'salad',
            'created_at' => Now()
        ]);

        DB::table('categories')->insert([
            'title' => 'drink',
            'slug' => 'drink',
            'created_at' => Now()
        ]);

        DB::table('categories')->insert([
            'title' => 'bakery',
            'slug' => 'bakery',
            'created_at' => Now()
        ]);

        DB::table('categories')->insert([
            'title' => 'snack',
            'slug' => 'snack',
            'created_at' => Now()
        ]);

    }
}
