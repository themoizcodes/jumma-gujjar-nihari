<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use App\Models\MenuItem;
use App\Models\Reservation;
use App\Models\RestaurantTable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'pending_reservations' => Reservation::where('status', 'pending')->count(),
            'today_reservations' => Reservation::whereDate('reservation_date', now()->toDateString())
                ->whereIn('status', ['pending', 'confirmed'])->count(),
            'total_menu_items' => MenuItem::count(),
            'total_tables' => RestaurantTable::count(),
            'total_customers' => User::where('role', 'customer')->count(),
        ];

        $recentReservations = Reservation::with('table')
            ->latest()
            ->take(8)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentReservations'));
    }

    /**
     * Send a test email to the configured admin address to verify mail setup.
     */
    public function sendTestEmail()
    {
        $recipient = config('mail.admin_address');

        if (! $recipient) {
            return back()->withErrors(['email' => 'ADMIN_EMAIL is not set in your .env file, so a test email could not be sent.']);
        }

        try {
            Mail::to($recipient)->send(new TestMail());
        } catch (\Throwable $e) {
            report($e);

            return back()->withErrors(['email' => 'Test email failed to send: ' . $e->getMessage()]);
        }

        return back()->with('status', 'Test email sent to ' . $recipient . '. Check your inbox (or storage/logs/laravel.log if MAIL_MAILER=log).');
    }
}
