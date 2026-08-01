@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
    <div>
        <h1 class="font-serif text-3xl text-cream">Dashboard</h1>
        <p class="text-cream/50 text-sm mt-1">{{ now()->format('l, d F Y') }}</p>
    </div>
</div>

<div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-4 mb-12">
    <div class="card card-hover p-5 reveal">
        <div class="flex items-center justify-between mb-3">
            <span class="flex h-9 w-9 items-center justify-center border border-yellow-500/40 text-yellow-400">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </span>
            <span class="h-2 w-2 rounded-full bg-yellow-400"></span>
        </div>
        <p class="text-3xl font-serif text-gold">{{ $stats['pending_reservations'] }}</p>
        <p class="text-cream/50 text-xs uppercase tracking-widest mt-1">Pending</p>
    </div>
    <div class="card card-hover p-5 reveal">
        <div class="flex items-center justify-between mb-3">
            <span class="flex h-9 w-9 items-center justify-center border border-green-500/40 text-green-400">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </span>
            <span class="h-2 w-2 rounded-full bg-green-400"></span>
        </div>
        <p class="text-3xl font-serif text-gold">{{ $stats['today_reservations'] }}</p>
        <p class="text-cream/50 text-xs uppercase tracking-widest mt-1">Today's Bookings</p>
    </div>
    <div class="card card-hover p-5 reveal">
        <div class="flex items-center justify-between mb-3">
            <span class="flex h-9 w-9 items-center justify-center border border-gold/40 text-gold">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </span>
            <span class="h-2 w-2 rounded-full bg-gold"></span>
        </div>
        <p class="text-3xl font-serif text-gold">{{ $stats['total_menu_items'] }}</p>
        <p class="text-cream/50 text-xs uppercase tracking-widest mt-1">Menu Items</p>
    </div>
    <div class="card card-hover p-5 reveal">
        <div class="flex items-center justify-between mb-3">
            <span class="flex h-9 w-9 items-center justify-center border border-cream/40 text-cream">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h.01M11 15h.01M15 15h.01M5 19V5a2 2 0 012-2h10a2 2 0 012 2v14"/></svg>
            </span>
            <span class="h-2 w-2 rounded-full bg-cream/60"></span>
        </div>
        <p class="text-3xl font-serif text-gold">{{ $stats['total_tables'] }}</p>
        <p class="text-cream/50 text-xs uppercase tracking-widest mt-1">Tables</p>
    </div>
    <div class="card card-hover p-5 reveal">
        <div class="flex items-center justify-between mb-3">
            <span class="flex h-9 w-9 items-center justify-center border border-maroon text-cream">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </span>
            <span class="h-2 w-2 rounded-full bg-maroon"></span>
        </div>
        <p class="text-3xl font-serif text-gold">{{ $stats['total_customers'] }}</p>
        <p class="text-cream/50 text-xs uppercase tracking-widest mt-1">Customers</p>
    </div>
</div>

{{-- Email / notification status --}}
<div class="card p-5 md:p-6 mb-10 reveal">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div class="flex items-start gap-3">
            <svg class="h-6 w-6 text-gold shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            <div>
                <h3 class="text-sm uppercase tracking-widest text-gold mb-1">Email Notifications</h3>
                <p class="text-cream/60 text-sm">
                    Mailer: <span class="text-cream font-medium">{{ config('mail.default') }}</span>
                    · Admin alerts to: <span class="text-cream font-medium">{{ config('mail.admin_address') ?: 'not set (set ADMIN_EMAIL in .env)' }}</span>
                    @if(config('mail.default') === 'log')
                    · <span class="text-yellow-400">Emails are being written to the log — configure SMTP in .env to send real emails.</span>
                    @endif
                </p>
            </div>
        </div>
        <form method="POST" action="{{ route('admin.test-email') }}" onsubmit="this.querySelector('button').disabled = true;">
            @csrf
            <button type="submit" class="btn-xs-outline">
                Send Test Email
            </button>
        </form>
    </div>
</div>

<h2 class="font-serif text-xl text-gold mb-4">Recent Reservations</h2>

<div class="overflow-x-auto border border-gold/20 reveal">
    <table class="w-full text-sm">
        <thead class="bg-bg-dark-2 text-cream/60 uppercase text-xs tracking-widest">
            <tr>
                <th class="text-left px-4 py-3">Booking</th>
                <th class="text-left px-4 py-3">Name</th>
                <th class="text-left px-4 py-3">Date / Time</th>
                <th class="text-left px-4 py-3">Guests</th>
                <th class="text-left px-4 py-3">Table</th>
                <th class="text-left px-4 py-3">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gold/10">
            @forelse($recentReservations as $r)
            <tr class="table-row-hover">
                <td class="px-4 py-3 text-gold">#{{ $r->booking_ref }}</td>
                <td class="px-4 py-3">{{ $r->name }}</td>
                <td class="px-4 py-3">{{ $r->reservation_date->format('d M Y') }} · {{ \Carbon\Carbon::parse($r->reservation_time)->format('g:i A') }}</td>
                <td class="px-4 py-3">{{ $r->guests }}</td>
                <td class="px-4 py-3">{{ $r->table->table_number ?? '-' }}</td>
                <td class="px-4 py-3">
                    <span @class([
                        'badge-status',
                        'border-yellow-500/40 text-yellow-400' => $r->status === 'pending',
                        'border-green-500/40 text-green-400' => $r->status === 'confirmed',
                        'border-red-500/40 text-red-400' => in_array($r->status, ['rejected', 'cancelled']),
                        'border-cream/30 text-cream/60' => $r->status === 'completed',
                    ])>{{ $r->status }}</span>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="px-4 py-6 text-center text-cream/40">No reservations yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
