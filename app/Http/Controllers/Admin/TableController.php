<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RestaurantTable;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        $tables = RestaurantTable::orderBy('table_number')->get();

        return view('admin.tables.index', compact('tables'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'table_number' => 'required|string|max:20|unique:restaurant_tables,table_number',
            'capacity' => 'required|integer|min:1|max:50',
        ]);

        $data['is_active'] = true;

        RestaurantTable::create($data);

        return back()->with('status', 'Table added.');
    }

    public function update(Request $request, RestaurantTable $table)
    {
        $data = $request->validate([
            'table_number' => 'required|string|max:20|unique:restaurant_tables,table_number,' . $table->id,
            'capacity' => 'required|integer|min:1|max:50',
        ]);

        $table->update($data);

        return back()->with('status', 'Table updated.');
    }

    public function toggleStatus(RestaurantTable $table)
    {
        $table->update(['is_active' => ! $table->is_active]);

        return back()->with('status', 'Table status changed to ' . ($table->is_active ? 'Active' : 'Inactive') . '.');
    }

    public function destroy(RestaurantTable $table)
    {
        if ($table->reservations()->whereIn('status', ['pending', 'confirmed'])->exists()) {
            return back()->withErrors(['table' => 'Cannot delete a table with active reservations.']);
        }

        $table->delete();

        return back()->with('status', 'Table deleted.');
    }
}
