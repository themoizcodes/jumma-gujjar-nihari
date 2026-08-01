@extends('layouts.app')

@section('title', 'Booking Confirmed — Jumma Gujjar Nihari')

@section('content')

<section class="relative pt-48 pb-24 px-6 lg:px-10 min-h-screen overflow-hidden">
    <div class="absolute inset-0 opacity-[0.06]">
        <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=1600" alt="" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-b from-bg-dark/70 to-bg-dark"></div>

    <div class="relative max-w-xl mx-auto text-center">
        <div class="flex justify-center mb-8 animate-fade-in">
            @if($reservation->status === 'confirmed')
            <span class="flex h-20 w-20 items-center justify-center rounded-full border border-green-500/50 text-green-400 text-4xl">&#10003;</span>
            @elseif(in_array($reservation->status, ['rejected', 'cancelled']))
            <span class="flex h-20 w-20 items-center justify-center rounded-full border border-red-500/50 text-red-400 text-4xl">&#9888;</span>
            @else
            <span class="flex h-20 w-20 items-center justify-center rounded-full border border-gold/50 text-gold text-4xl">&#9203;</span>
            @endif
        </div>

        <h1 class="font-serif text-3xl md:text-5xl text-cream mb-4 animate-fade-up" style="animation-delay: 100ms">
            @if($reservation->status === 'confirmed')
                Reservation <span class="text-gold-gradient italic">Confirmed</span>
            @elseif($reservation->status === 'rejected')
                Reservation Not Available
            @elseif($reservation->status === 'cancelled')
                Reservation Cancelled
            @else
                Reservation <span class="text-gold-gradient italic">Received</span>
            @endif
        </h1>
        <p class="text-cream/60 mb-12 animate-fade-up" style="animation-delay: 200ms">
            @if($reservation->status === 'pending')
                We've received your booking — our team will confirm it shortly.
            @else
                We look forward to welcoming you to Jumma Gujjar Nihari.
            @endif
        </p>

        <div class="border border-gold/30 bg-bg-dark/70 backdrop-blur p-8 text-left space-y-3 reveal">
            <div class="flex justify-between border-b border-gold/10 pb-3 mb-2">
                <span class="text-cream/60 text-sm uppercase tracking-widest">Booking ID</span>
                <span class="text-gold font-serif text-xl">#{{ $reservation->booking_ref }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-cream/60 text-sm">Status</span>
                <span @class([
                    'badge-status capitalize',
                    'border-yellow-500/40 text-yellow-400' => $reservation->status === 'pending',
                    'border-green-500/40 text-green-400' => $reservation->status === 'confirmed',
                    'border-red-500/40 text-red-400' => in_array($reservation->status, ['rejected', 'cancelled']),
                ])>{{ $reservation->status }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-cream/60 text-sm">Name</span>
                <span class="text-cream">{{ $reservation->name }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-cream/60 text-sm">Date</span>
                <span class="text-cream">{{ $reservation->reservation_date->format('d F Y') }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-cream/60 text-sm">Time</span>
                <span class="text-cream">{{ \Carbon\Carbon::parse($reservation->reservation_time)->format('g:i A') }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-cream/60 text-sm">Guests</span>
                <span class="text-cream">{{ $reservation->guests }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-cream/60 text-sm">Table</span>
                <span class="text-cream">{{ $reservation->table->table_number ?? '-' }}</span>
            </div>
            @if($reservation->special_request)
            <div class="flex justify-between border-t border-gold/10 pt-3 mt-2">
                <span class="text-cream/60 text-sm">Special Request</span>
                <span class="text-cream text-right max-w-[60%]">{{ $reservation->special_request }}</span>
            </div>
            @endif
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center mt-12 reveal">
            <a href="{{ route('home') }}" class="btn-outline">Back to Home</a>
            <a href="{{ route('menu') }}" class="btn-gold">Explore Menu</a>
        </div>
    </div>
</section>

@endsection
