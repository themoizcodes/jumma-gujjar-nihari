<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $reviews = [
            ['customer_name' => 'Ahmed Raza', 'rating' => 5, 'comment' => 'Best Nihari in Karachi, hands down. The desi ghee ka tarka is unmatched!'],
            ['customer_name' => 'Sana Malik', 'rating' => 5, 'comment' => 'Authentic taste, generous portions, and the nalli nihari is a must-try.'],
            ['customer_name' => 'Bilal Khan', 'rating' => 4, 'comment' => 'Great food and quick service. Gets busy on weekends, so plan ahead.'],
            ['customer_name' => 'Fatima Sheikh', 'rating' => 5, 'comment' => 'Been coming here for years. Consistent quality every single time.'],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}
