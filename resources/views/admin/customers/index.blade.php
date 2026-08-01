@extends('admin.layout')

@section('title', 'Customers')

@section('content')

<h1 class="font-serif text-3xl text-cream mb-8">Customer Management</h1>

<div class="overflow-x-auto border border-gold/20 reveal">
    <table class="w-full text-sm">
        <thead class="bg-bg-dark-2 text-cream/60 uppercase text-xs tracking-widest">
            <tr>
                <th class="text-left px-4 py-3">Name</th>
                <th class="text-left px-4 py-3">Phone</th>
                <th class="text-left px-4 py-3">Email</th>
                <th class="text-left px-4 py-3">Bookings</th>
                <th class="text-left px-4 py-3">Joined</th>
                <th class="text-left px-4 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gold/10">
            @forelse($customers as $customer)
            <tr class="table-row-hover">
                <td class="px-4 py-3 text-cream">{{ $customer->name }}</td>
                <td class="px-4 py-3 text-cream/70">{{ $customer->phone ?? '-' }}</td>
                <td class="px-4 py-3 text-cream/70">{{ $customer->email }}</td>
                <td class="px-4 py-3"><span class="badge-status border-gold/50 text-gold">{{ $customer->reservations_count }}</span></td>
                <td class="px-4 py-3 text-cream/40 text-xs">{{ $customer->created_at->format('d M Y') }}</td>
                <td class="px-4 py-3">
                    <a href="{{ route('admin.customers.show', $customer) }}" class="text-gold hover:underline text-xs uppercase tracking-widest">View History</a>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="px-4 py-6 text-center text-cream/40">No registered customers yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">{{ $customers->links() }}</div>

@endsection
