<?php

namespace App\Http\Controllers;

use App\Mail\ReservationStatusMail;
use App\Models\Reservation;
use App\Models\RestaurantTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    /**
     * Show the reservation form.
     */
    public function index()
    {
        return view('reservation');
    }

    /**
     * AJAX: check which tables are available for a given date/time/guest count.
     */
    public function checkAvailability(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reservation_date' => 'required|date|after_or_equal:today',
            'reservation_time' => 'required|date_format:H:i',
            'guests' => 'required|integer|min:1|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $data = $validator->validated();

        // Tables already booked for this exact date + time (pending or confirmed hold the slot)
        $bookedTableIds = Reservation::where('reservation_date', $data['reservation_date'])
            ->where('reservation_time', $data['reservation_time'])
            ->whereIn('status', ['pending', 'confirmed'])
            ->pluck('table_id');

        $availableTables = RestaurantTable::where('is_active', true)
            ->where('capacity', '>=', $data['guests'])
            ->whereNotIn('id', $bookedTableIds)
            ->orderBy('capacity')
            ->get(['id', 'table_number', 'capacity']);

        return response()->json([
            'success' => true,
            'available' => $availableTables->isNotEmpty(),
            'tables' => $availableTables,
        ]);
    }

    /**
     * Store a new reservation (booking confirmation).
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'table_id' => 'required|exists:restaurant_tables,id',
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:150',
            'reservation_date' => 'required|date|after_or_equal:today',
            'reservation_time' => 'required|date_format:H:i',
            'guests' => 'required|integer|min:1|max:20',
            'special_request' => 'nullable|string|max:500',
        ]);

        // Re-check the chosen table is still free (avoid race conditions / double booking)
        $alreadyBooked = Reservation::where('table_id', $data['table_id'])
            ->where('reservation_date', $data['reservation_date'])
            ->where('reservation_time', $data['reservation_time'])
            ->whereIn('status', ['pending', 'confirmed'])
            ->exists();

        if ($alreadyBooked) {
            return back()
                ->withInput()
                ->withErrors(['table_id' => 'Sorry, this table was just booked by someone else. Please choose another slot.']);
        }

        // Make sure the table actually fits the party and is active (re-validate server-side)
        $table = RestaurantTable::where('id', $data['table_id'])
            ->where('is_active', true)
            ->where('capacity', '>=', $data['guests'])
            ->first();

        if (! $table) {
            return back()
                ->withInput()
                ->withErrors(['table_id' => 'The selected table is no longer available for this party size.']);
        }

        $reservation = Reservation::create(array_merge($data, [
            'user_id' => auth()->id(),
            'booking_ref' => 'PENDING',
            'status' => 'pending',
        ]));

        // Generate a friendly booking reference now that we have the ID
        $reservation->update([
            'booking_ref' => 'RSV-' . (1000 + $reservation->id),
        ]);

        // Notify customer (and admin) — fails silently if mail isn't configured yet
        try {
            if ($reservation->email) {
                Mail::to($reservation->email)->send(new ReservationStatusMail($reservation, 'received'));
            }
            if ($adminEmail = config('mail.admin_address')) {
                Mail::to($adminEmail)->send(new ReservationStatusMail($reservation, 'new_booking_admin'));
            }
        } catch (\Throwable $e) {
            report($e);
        }

        return redirect()
            ->route('reservation.confirmation', $reservation->booking_ref)
            ->with('reservation', $reservation);
    }

    /**
     * Show the booking confirmation page.
     */
    public function confirmation(string $bookingRef)
    {
        $reservation = Reservation::with('table')
            ->where('booking_ref', $bookingRef)
            ->firstOrFail();

        return view('reservation-confirmation', compact('reservation'));
    }
}
