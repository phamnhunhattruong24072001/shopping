<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Electronics', 'description' => 'All kinds of electronic items', 'slug' => Str::slug('Electronics')],
            ['name' => 'Fashion', 'description' => 'Clothing and accessories', 'slug' => Str::slug('Fashion')],
            ['name' => 'Home & Garden', 'description' => 'Furniture, decor, and more', 'slug' => Str::slug('Home & Garden')],
            ['name' => 'Sports & Outdoors', 'description' => 'Gear and equipment for sports', 'slug' => Str::slug('Sports & Outdoors')],
            ['name' => 'Health & Beauty', 'description' => 'Beauty products and healthcare', 'slug' => Str::slug('Health & Beauty')],
            ['name' => 'Automotive', 'description' => 'Cars, bikes, and accessories', 'slug' => Str::slug('Automotive')],
            ['name' => 'Books', 'description' => 'Books and educational materials', 'slug' => Str::slug('Books')],
            ['name' => 'Toys & Games', 'description' => 'Toys, games, and entertainment', 'slug' => Str::slug('Toys & Games')],
            ['name' => 'Jewelry', 'description' => 'Jewelry and watches', 'slug' => Str::slug('Jewelry')],
            ['name' => 'Music', 'description' => 'Music instruments and albums', 'slug' => Str::slug('Music')],
        ];

        DB::table('categories')->insert($categories);
    }
}
