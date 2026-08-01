<?php

namespace Database\Seeders;

use App\Models\Chef;
use Illuminate\Database\Seeder;

class ChefSeeder extends Seeder
{
    public function run(): void
    {
        Chef::create([
            'name' => 'Sultan Gujjar',
            'role' => 'Founder & Head Chef',
            'bio' => "Sultan Gujjar is the founder and keeper of the flame behind Karachi's most loved Nihari. For over thirty years he has guarded the family recipe — every pot slow-cooked through the night and finished by his own hand with the signature desi ghee ka tarka. Nothing leaves his kitchen that he wouldn't serve his own family.",
            'image' => '/chef/founder.jpg',
        ]);

        Chef::create([
            'name' => 'Sons of Jumma',
            'role' => 'Legacy Team',
            'bio' => 'The next generation now runs the kitchen, preserving the original taste that made Jumma Gujjar Nihari a Liaquatabad landmark.',
            'image' => 'https://images.unsplash.com/photo-1577219491135-ce391730fb2c?w=600',
        ]);
    }
}
