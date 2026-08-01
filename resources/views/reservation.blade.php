@extends('layouts.app')

@section('title', 'Reserve a Table — Jumma Gujjar Nihari')

@section('content')

{{-- Page header --}}
<section class="relative pt-44 pb-16 px-6 lg:px-10 text-center overflow-hidden">
    <div class="absolute inset-0 opacity-[0.08]">
        <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=1600" alt="" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-b from-bg-dark/60 to-bg-dark"></div>
    <div class="relative z-10">
        <p class="section-eyebrow">Book Your Spot</p>
        <h1 class="font-serif text-4xl md:text-6xl text-cream leading-tight">Reserve a <span class="text-gold-gradient italic">Table</span></h1>
        <div class="ornament-divider mt-8"></div>
    </div>
</section>

<section class="px-6 lg:px-10 pb-28">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-5 gap-10">

        {{-- Info panel --}}
        <aside class="lg:col-span-2 space-y-6">
            <div class="card p-8 reveal">
                <p class="section-eyebrow justify-start before:hidden" style="justify-content:flex-start">Visit Us</p>
                <ul class="space-y-5 text-sm">
                    <li class="flex gap-4">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center border border-gold/30 text-gold">&#9783;</span>
                        <div>
                            <p class="text-cream/50 text-xs uppercase tracking-widest mb-1">Location</p>
                            <p class="text-cream">Liaquatabad (B Area), Karachi</p>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center border border-gold/30 text-gold">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </span>
                        <div>
                            <p class="text-cream/50 text-xs uppercase tracking-widest mb-1">Call Us</p>
                            <a href="tel:+923041300535" class="text-cream hover:text-gold transition-colors">+92 304 1300535</a>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center border border-gold/30 text-gold">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </span>
                        <div>
                            <p class="text-cream/50 text-xs uppercase tracking-widest mb-1">Hours</p>
                            <p class="text-cream">7:00 PM – 1:00 AM · Daily</p>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="card p-8 reveal">
                <p class="section-eyebrow justify-start before:hidden" style="justify-content:flex-start">Good to Know</p>
                <ul class="space-y-3 text-sm text-cream/65 leading-relaxed">
                    <li class="flex gap-3"><span class="text-gold">&#9679;</span> Evenings fill up fast — book ahead, especially weekends.</li>
                    <li class="flex gap-3"><span class="text-gold">&#9679;</span> Family & group seating available on request.</li>
                    <li class="flex gap-3"><span class="text-gold">&#9679;</span> Walk-ins welcome, subject to availability.</li>
                </ul>
            </div>
        </aside>

        {{-- Booking form --}}
        <div class="lg:col-span-3">
            @if ($errors->any())
            <div class="border border-red-500/40 bg-red-500/10 text-red-300 text-sm p-5 mb-8 animate-fade-in">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- Step 1: Date / Time / Guests --}}
            <div class="card p-6 md:p-9 mb-8 reveal">
                <div class="flex items-center gap-4 mb-8">
                    <span class="flex h-10 w-10 items-center justify-center bg-gold text-bg-dark font-serif text-lg">1</span>
                    <div>
                        <h2 class="font-serif text-2xl text-cream">When & How Many?</h2>
                        <p class="text-cream/45 text-xs uppercase tracking-widest mt-1">Select date, time and guest count</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-7">
                    <div>
                        <label class="field-label" for="reservation_date">Date</label>
                        <input type="date" id="reservation_date" min="{{ date('Y-m-d') }}" class="input-field">
                    </div>
                    <div>
                        <label class="field-label" for="reservation_time">Time</label>
                        <input type="time" id="reservation_time" class="input-field">
                    </div>
                    <div>
                        <label class="field-label" for="guests">Guests</label>
                        <input type="number" id="guests" min="1" max="20" value="2" class="input-field">
                    </div>
                </div>

                <button type="button" id="check-availability-btn" class="btn-gold w-full">
                    Check Availability
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7M5 5l7 7-7 7"/></svg>
                </button>

                <div id="availability-result" class="mt-7 hidden"></div>
            </div>

            {{-- Step 2: Guest Details (revealed after a table is picked) --}}
            <form id="reservation-form" action="{{ route('reservation.store') }}" method="POST" class="card p-6 md:p-9 hidden reveal">
                @csrf
                <div class="flex items-center gap-4 mb-8">
                    <span class="flex h-10 w-10 items-center justify-center bg-gold text-bg-dark font-serif text-lg">2</span>
                    <div>
                        <h2 class="font-serif text-2xl text-cream">Your Details</h2>
                        <p class="text-cream/45 text-xs uppercase tracking-widest mt-1">Tell us who's joining us</p>
                    </div>
                </div>

                <input type="hidden" name="table_id" id="table_id">
                <input type="hidden" name="reservation_date" id="form_reservation_date">
                <input type="hidden" name="reservation_time" id="form_reservation_time">
                <input type="hidden" name="guests" id="form_guests">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
                    <div>
                        <label class="field-label" for="name">Full Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name ?? '') }}" required class="input-field">
                    </div>
                    <div>
                        <label class="field-label" for="phone">Phone</label>
                        <input type="tel" name="phone" id="phone" value="{{ old('phone', auth()->user()->phone ?? '') }}" required placeholder="03XXXXXXXXX" class="input-field">
                    </div>
                </div>

                <div class="mb-5">
                    <label class="field-label" for="email">Email (optional)</label>
                    <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email ?? '') }}" class="input-field">
                </div>

                <div class="mb-7">
                    <label class="field-label" for="special_request">Special Request (optional)</label>
                    <textarea name="special_request" id="special_request" rows="3" class="input-field" placeholder="Birthday? Window seat? Anything we should know…"></textarea>
                </div>

                <button type="submit" class="btn-gold w-full">Confirm Booking</button>
            </form>
        </div>

    </div>
</section>

<script>
    const checkBtn = document.getElementById('check-availability-btn');
    const resultBox = document.getElementById('availability-result');
    const form = document.getElementById('reservation-form');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    checkBtn.addEventListener('click', async () => {
        const date = document.getElementById('reservation_date').value;
        const time = document.getElementById('reservation_time').value;
        const guests = document.getElementById('guests').value;

        if (!date || !time || !guests) {
            resultBox.classList.remove('hidden');
            resultBox.innerHTML = '<p class="text-red-300 text-sm">Please select date, time and guests first.</p>';
            form.classList.add('hidden');
            return;
        }

        checkBtn.disabled = true;
        checkBtn.textContent = 'Checking...';

        try {
            const response = await fetch('{{ route("reservation.check") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ reservation_date: date, reservation_time: time, guests: guests }),
            });

            const data = await response.json();
            resultBox.classList.remove('hidden');

            if (!data.success) {
                resultBox.innerHTML = '<p class="text-red-300 text-sm">Please check your date/time/guest inputs.</p>';
                form.classList.add('hidden');
                return;
            }

            const formattedDate = new Date(date).toLocaleDateString('en-GB', { day: 'numeric', month: 'long', year: 'numeric' });
            const formattedTime = new Date('1970-01-01T' + time).toLocaleTimeString('en-US', { hour: 'numeric', minute: '2-digit', hour12: true });

            if (data.available && data.tables.length > 0) {
                const table = data.tables[0];

                resultBox.innerHTML = `
                    <div class="border border-gold/40 bg-gold/5 p-6 text-sm space-y-3 animate-fade-in">
                        <p class="font-serif text-gold text-lg mb-3 flex items-center gap-3">
                            <span class="flex h-8 w-8 items-center justify-center bg-gold text-bg-dark">&#10003;</span>
                            Table ${table.table_number} is available
                        </p>
                        <div class="grid grid-cols-2 gap-3">
                            <p><span class="text-cream/50">Date:</span> <span class="text-cream">${formattedDate}</span></p>
                            <p><span class="text-cream/50">Time:</span> <span class="text-cream">${formattedTime}</span></p>
                            <p><span class="text-cream/50">Guests:</span> <span class="text-cream">${guests}</span></p>
                            <p><span class="text-cream/50">Seats:</span> <span class="text-cream">${table.capacity}</span></p>
                        </div>
                    </div>
                `;

                document.getElementById('table_id').value = table.id;
                document.getElementById('form_reservation_date').value = date;
                document.getElementById('form_reservation_time').value = time;
                document.getElementById('form_guests').value = guests;
                form.classList.remove('hidden');
                form.classList.add('reveal');
                requestAnimationFrame(() => form.classList.add('reveal-visible'));
                form.scrollIntoView({ behavior: 'smooth', block: 'center' });
            } else {
                resultBox.innerHTML = `
                    <div class="border border-red-500/40 bg-red-500/10 p-6 text-sm">
                        <p class="text-red-300">No tables available for this date/time/guest count. Please try a different slot.</p>
                    </div>
                `;
                form.classList.add('hidden');
            }
        } catch (e) {
            resultBox.classList.remove('hidden');
            resultBox.innerHTML = '<p class="text-red-300 text-sm">Something went wrong. Please try again.</p>';
        } finally {
            checkBtn.disabled = false;
            checkBtn.textContent = 'Check Availability';
        }
    });
</script>

@endsection
