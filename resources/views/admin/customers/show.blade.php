@extends('admin.layout')

@section('title', 'Customer: ' . $customer->name)

@section('content')

<a href="{{ route('admin.customers.index') }}" class="text-cream/50 hover:text-gold text-sm mb-6 inline-block">← Back to Customers</a>

<div class="card p-6 mb-8 reveal">
    <div class="flex items-center gap-4 mb-6">
        <div class="h-14 w-14 rounded-full bg-gold/15 border border-gold/40 flex items-center justify-center font-serif text-2xl text-gold">
            {{ strtoupper(substr($customer->name, 0, 1)) }}
        </div>
        <div>
            <h1 class="font-serif text-2xl text-cream">{{ $customer->name }}</h1>
            <p class="text-cream/50 text-sm">{{ $customer->email }}</p>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
        <div>
            <p class="text-cream/40 text-xs uppercase tracking-widest mb-1">Phone</p>
            <p class="text-cream/80">{{ $customer->phone ?? '-' }}</p>
        </div>
        <div>
            <p class="text-cream/40 text-xs uppercase tracking-widest mb-1">Total Bookings</p>
            <p class="text-cream/80">{{ $customer->reservations()->count() }}</p>
        </div>
        <div>
            <p class="text-cream/40 text-xs uppercase tracking-widest mb-1">Customer Since</p>
            <p class="text-cream/80">{{ $customer->created_at->format('d M Y') }}</p>
        </div>
    </div>
</div>

<h2 class="font-serif text-xl text-gold mb-4">Booking History</h2>

<div class="overflow-x-auto border border-gold/20 reveal">
    <table class="w-full text-sm">
        <thead class="bg-bg-dark-2 text-cream/60 uppercase text-xs tracking-widest">
            <tr>
                <th class="text-left px-4 py-3">Booking</th>
                <th class="text-left px-4 py-3">Date / Time</th>
                <th class="text-left px-4 py-3">Guests</th>
                <th class="text-left px-4 py-3">Table</th>
                <th class="text-left px-4 py-3">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gold/10">
            @forelse($reservations as $r)
            <tr class="table-row-hover">
                <td class="px-4 py-3 text-gold">#{{ $r->booking_ref }}</td>
                <td class="px-4 py-3">{{ $r->reservation_date->format('d M Y') }} <span class="text-cream/40 text-xs">{{ \Carbon\Carbon::parse($r->reservation_time)->format('g:i A') }}</span></td>
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
            <tr><td colspan="5" class="px-4 py-6 text-center text-cream/40">No bookings yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
