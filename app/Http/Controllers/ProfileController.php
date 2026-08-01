<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $reservations = $request->user()->reservations()
            ->with('table')
            ->orderByDesc('reservation_date')
            ->orderByDesc('reservation_time')
            ->get();

        return view('profile.show', compact('reservations'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email|max:150|unique:users,email,' . $request->user()->id,
        ]);

        $request->user()->update($data);

        return back()->with('status', 'Profile updated successfully.');
    }
}
