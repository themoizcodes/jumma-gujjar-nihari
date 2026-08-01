<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('sort_order')->get();
        $menuItems = MenuItem::with('category')->latest()->get();

        return view('admin.menu.index', compact('categories', 'menuItems'));
    }

    public function create()
    {
        $categories = Category::orderBy('sort_order')->get();

        return view('admin.menu.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $this->validateItem($request);
        $data['image'] = $this->handleImageUpload($request) ?? 'https://placehold.co/600x400/1A1512/C9A24B?text=' . urlencode($data['name']);
        unset($data['image_file']);

        MenuItem::create($data);

        return redirect()->route('admin.menu.index')->with('status', 'Menu item added.');
    }

    public function edit(MenuItem $menuItem)
    {
        $categories = Category::orderBy('sort_order')->get();

        return view('admin.menu.edit', compact('menuItem', 'categories'));
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $data = $this->validateItem($request);
        unset($data['image_file']);

        if ($uploaded = $this->handleImageUpload($request)) {
            $data['image'] = $uploaded;
        }

        $menuItem->update($data);

        return redirect()->route('admin.menu.index')->with('status', 'Menu item updated.');
    }

    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();

        return back()->with('status', 'Menu item deleted.');
    }

    // ---- Category management ----

    public function storeCategory(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'sort_order' => 'nullable|integer',
        ]);

        Category::create([
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'sort_order' => $data['sort_order'] ?? 0,
        ]);

        return back()->with('status', 'Category added.');
    }

    public function destroyCategory(Category $category)
    {
        if ($category->menuItems()->exists()) {
            return back()->withErrors(['category' => 'Cannot delete a category that still has menu items.']);
        }

        $category->delete();

        return back()->with('status', 'Category deleted.');
    }

    // ---- helpers ----

    private function validateItem(Request $request): array
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:150',
            'description' => 'nullable|string|max:500',
            'price' => 'required|numeric|min:0',
            'image_file' => 'nullable|image|max:4096',
        ]);

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_available'] = $request->boolean('is_available');

        return $data;
    }

    private function handleImageUpload(Request $request): ?string
    {
        if (! $request->hasFile('image_file')) {
            return null;
        }

        $path = $request->file('image_file')->store('menu-items', 'public');

        return Storage::url($path);
    }
}
