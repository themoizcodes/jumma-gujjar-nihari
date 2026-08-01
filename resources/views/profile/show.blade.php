@extends('layouts.app')

@section('title', 'My Profile — Jumma Gujjar Nihari')

@section('content')
<section class="relative pt-44 pb-24 px-6 lg:px-10 min-h-screen overflow-hidden">
    <div class="absolute inset-0 opacity-[0.06]">
        <img src="https://images.unsplash.com/photo-1601050690597-df0568f70950?w=1600" alt="" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-b from-bg-dark/70 to-bg-dark"></div>

    <div class="relative max-w-3xl mx-auto">
        <div class="text-center mb-12 reveal">
            <p class="section-eyebrow">Your Account</p>
            <h1 class="font-serif text-4xl md:text-5xl text-cream">My <span class="text-gold-gradient italic">Profile</span></h1>
            <div class="ornament-divider mt-7"></div>
        </div>

        @if (session('status'))
        <div class="border border-gold/40 bg-gold/10 text-gold text-sm p-4 mb-6 animate-fade-in">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
        <div class="border border-red-500/40 bg-red-500/10 text-red-300 text-sm p-4 mb-6">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
        @endif

        <div class="card p-6 md:p-8 mb-12 reveal">
            <div class="flex items-center gap-3 mb-8">
                <span class="flex h-11 w-11 items-center justify-center bg-gold/15 border border-gold/40 text-gold font-serif text-lg uppercase">{{ substr(auth()->user()->name, 0, 1) }}</span>
                <h2 class="font-serif text-xl text-cream">Account Details</h2>
            </div>
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
                    <div>
                        <label class="field-label" for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" required class="input-field">
                    </div>
                    <div>
                        <label class="field-label" for="phone">Phone</label>
                        <input type="tel" name="phone" id="phone" value="{{ old('phone', auth()->user()->phone) }}" class="input-field">
                    </div>
                </div>
                <div class="mb-7">
                    <label class="field-label" for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required class="input-field">
                </div>
                <button type="submit" class="btn-gold">Save Changes</button>
            </form>
        </div>

        <div class="reveal">
            <div class="flex items-center gap-3 mb-6">
                <h2 class="font-serif text-2xl text-cream">My Reservations</h2>
                <span class="text-gold text-xs uppercase tracking-widest">{{ $reservations->count() }} total</span>
            </div>

            @if($reservations->isEmpty())
            <p class="text-cream/50">You haven't made any reservations yet. <a href="{{ route('reservation') }}" class="text-gold hover:underline">Book a table</a>.</p>
            @else
            <div class="space-y-4">
                @foreach($reservations as $r)
                <div class="card card-hover p-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div class="flex items-center gap-4">
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center border border-gold/30 text-gold">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </span>
                        <div>
                            <p class="text-cream font-medium">#{{ $r->booking_ref }} — {{ $r->reservation_date->format('d M Y') }} at {{ \Carbon\Carbon::parse($r->reservation_time)->format('g:i A') }}</p>
                            <p class="text-cream/50 text-sm">{{ $r->guests }} guests · Table {{ $r->table->table_number ?? '-' }}</p>
                        </div>
                    </div>
                    <span @class([
                        'badge-status self-start sm:self-center',
                        'border-yellow-500/40 text-yellow-400' => $r->status === 'pending',
                        'border-green-500/40 text-green-400' => $r->status === 'confirmed',
                        'border-red-500/40 text-red-400' => in_array($r->status, ['rejected', 'cancelled']),
                        'border-cream/30 text-cream/60' => $r->status === 'completed',
                    ])>{{ $r->status }}</span>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
