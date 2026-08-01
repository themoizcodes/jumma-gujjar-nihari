<?php

namespace App\Http\Controllers;

use App\Models\Category;

class MenuController extends Controller
{
    public function index()
    {
        $categories = Category::with(['menuItems' => function ($query) {
            $query->where('is_available', true);
        }])->orderBy('sort_order')->get();

        return view('menu', compact('categories'));
    }
}
