<?php

namespace Database\Seeders;

use App\Models\GalleryImage;
use Illuminate\Database\Seeder;

class GalleryImageSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            ['image' => 'https://images.unsplash.com/photo-1631452180519-c014fe946bc7?w=900', 'caption' => 'Signature Beef Nihari'],
            ['image' => 'https://images.unsplash.com/photo-1585937421612-70a008356fbe?w=900', 'caption' => 'Nalli Nihari with fresh naan'],
            ['image' => 'https://images.unsplash.com/photo-1601050690597-df0568f70950?w=900', 'caption' => 'Fresh tandoor bread'],
            ['image' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=900', 'caption' => 'Our dining space'],
            ['image' => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=900', 'caption' => 'Kitchen in action'],
            ['image' => 'https://images.unsplash.com/photo-1606313564200-e75d5e30476c?w=900', 'caption' => 'Traditional desserts'],
        ];

        foreach ($images as $image) {
            GalleryImage::create($image);
        }
    }
}
