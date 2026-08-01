<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ReservationStatusMail;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $query = Reservation::with('table')->latest();

        if ($status = $request->get('status')) {
            $query->where('status', $status);
        }

        $reservations = $query->paginate(15)->withQueryString();

        return view('admin.reservations.index', compact('reservations'));
    }

    public function updateStatus(Request $request, Reservation $reservation)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,confirmed,rejected,cancelled,completed',
        ]);

        $reservation->update(['status' => $data['status']]);

        // Map status to the mail type + only email for statuses the guest cares about
        $mailType = match ($data['status']) {
            'confirmed' => 'confirmed',
            'rejected' => 'rejected',
            'cancelled' => 'cancelled',
            default => null,
        };

        if ($mailType && $reservation->email) {
            try {
                Mail::to($reservation->email)->send(new ReservationStatusMail($reservation, $mailType));
            } catch (\Throwable $e) {
                report($e);
            }
        }

        return back()->with('status', 'Reservation #' . $reservation->booking_ref . ' updated to ' . $data['status'] . '.');
    }
}
