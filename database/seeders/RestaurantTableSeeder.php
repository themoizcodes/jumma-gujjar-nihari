<?php

namespace Database\Seeders;

use App\Models\RestaurantTable;
use Illuminate\Database\Seeder;

class RestaurantTableSeeder extends Seeder
{
    public function run(): void
    {
        // Mix of small, medium and large tables
        $tables = [
            ['table_number' => 'T-1', 'capacity' => 2],
            ['table_number' => 'T-2', 'capacity' => 2],
            ['table_number' => 'T-3', 'capacity' => 2],
            ['table_number' => 'T-4', 'capacity' => 4],
            ['table_number' => 'T-5', 'capacity' => 4],
            ['table_number' => 'T-6', 'capacity' => 4],
            ['table_number' => 'T-7', 'capacity' => 4],
            ['table_number' => 'T-8', 'capacity' => 6],
            ['table_number' => 'T-9', 'capacity' => 6],
            ['table_number' => 'T-10', 'capacity' => 6],
            ['table_number' => 'T-11', 'capacity' => 8],
            ['table_number' => 'T-12', 'capacity' => 8],
        ];

        foreach ($tables as $table) {
            RestaurantTable::create($table);
        }
    }
}
