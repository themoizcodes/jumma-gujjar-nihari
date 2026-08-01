<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Nihari Items', 'slug' => 'nihari', 'sort_order' => 1],
            ['name' => 'Nihari Extras', 'slug' => 'nihari-extras', 'sort_order' => 2],
            ['name' => 'Chicken Pulao', 'slug' => 'chicken-pulao', 'sort_order' => 3],
            ['name' => 'Sada Biryani / Pulao', 'slug' => 'sada-biryani', 'sort_order' => 4],
            ['name' => 'Chicken Biryani', 'slug' => 'chicken-biryani', 'sort_order' => 5],
            ['name' => 'Sides & Extras', 'slug' => 'sides', 'sort_order' => 6],
            ['name' => 'Tin Pack', 'slug' => 'tin-pack', 'sort_order' => 7],
            ['name' => 'Bread', 'slug' => 'bread', 'sort_order' => 8],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
