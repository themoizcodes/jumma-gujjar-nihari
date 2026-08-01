<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\GalleryImage;
use App\Models\MenuItem;
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $featuredDishes = MenuItem::with('category')
            ->where('is_featured', true)
            ->where('is_available', true)
            ->take(6)
            ->get()
            ->when(fn ($featured) => $featured->count() < 6, function ($featured) {
                return $featured->merge(
                    MenuItem::with('category')
                        ->where('is_available', true)
                        ->whereKeyNot($featured->pluck('id'))
                        ->take(6 - $featured->count())
                        ->get()
                );
            });

        $reviews = Review::latest()->take(6)->get();

        $galleryImages = GalleryImage::latest()->take(6)->get();

        $chef = Chef::first();

        return view('home', compact('featuredDishes', 'reviews', 'galleryImages', 'chef'));
    }
}
