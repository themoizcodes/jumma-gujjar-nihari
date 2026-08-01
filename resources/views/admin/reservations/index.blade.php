@extends('admin.layout')

@section('title', 'Reservations')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
    <h1 class="font-serif text-3xl text-cream">Reservation Management</h1>

    <div class="flex flex-wrap gap-2 text-xs uppercase tracking-widest">
        @foreach(['' => 'All', 'pending' => 'Pending', 'confirmed' => 'Confirmed', 'rejected' => 'Rejected', 'cancelled' => 'Cancelled', 'completed' => 'Completed'] as $value => $label)
        <a href="{{ route('admin.reservations.index', $value ? ['status' => $value] : []) }}"
           class="px-3 py-1.5 border transition-colors {{ request('status', '') === $value ? 'bg-gold text-bg-dark border-gold' : 'border-gold/30 text-gold/80 hover:bg-gold/10' }}">
            {{ $label }}
        </a>
        @endforeach
    </div>
</div>

<div class="overflow-x-auto border border-gold/20 reveal">
    <table class="w-full text-sm">
        <thead class="bg-bg-dark-2 text-cream/60 uppercase text-xs tracking-widest">
            <tr>
                <th class="text-left px-4 py-3">Booking</th>
                <th class="text-left px-4 py-3">Customer</th>
                <th class="text-left px-4 py-3">Date / Time</th>
                <th class="text-left px-4 py-3">Guests</th>
                <th class="text-left px-4 py-3">Table</th>
                <th class="text-left px-4 py-3">Status</th>
                <th class="text-left px-4 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gold/10">
            @forelse($reservations as $r)
            <tr class="table-row-hover">
                <td class="px-4 py-3 text-gold">#{{ $r->booking_ref }}</td>
                <td class="px-4 py-3">
                    {{ $r->name }}<br>
                    <span class="text-cream/40 text-xs">{{ $r->phone }}</span>
                </td>
                <td class="px-4 py-3">{{ $r->reservation_date->format('d M Y') }}<br><span class="text-cream/40 text-xs">{{ \Carbon\Carbon::parse($r->reservation_time)->format('g:i A') }}</span></td>
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
                <td class="px-4 py-3">
                    <form method="POST" action="{{ route('admin.reservations.status', $r) }}" class="flex items-center gap-2">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="bg-bg-dark border border-gold/30 text-cream text-xs px-2 py-1.5 focus:outline-none focus:border-gold">
                            @foreach(['pending', 'confirmed', 'rejected', 'cancelled', 'completed'] as $status)
                            <option value="{{ $status }}" @selected($r->status === $status)>{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn-xs-outline">Update</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="px-4 py-6 text-center text-cream/40">No reservations found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">{{ $reservations->links() }}</div>

@endsection
