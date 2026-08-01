@extends('layouts.app')

@section('title', 'Jumma Gujjar Nihari — Liaquatabad, Karachi')

@section('content')

{{-- ============ HERO ============ --}}
<section class="relative min-h-screen flex items-center justify-center text-center overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1631452180519-c014fe946bc7?w=1600"
             alt="Jumma Gujjar Nihari signature dish"
             class="w-full h-full object-cover animate-zoom-slow"
             fetchpriority="high">
        <div class="absolute inset-0 bg-gradient-to-b from-bg-dark/70 via-bg-dark/60 to-bg-dark"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,transparent_0%,rgba(10,9,8,0.55)_100%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,rgba(201,162,75,0.14)_0%,transparent_55%)]"></div>
    </div>

    <div class="relative z-10 px-6 max-w-4xl py-32">
        <p class="text-gold uppercase tracking-[0.4em] text-[11px] md:text-xs mb-6 animate-fade-in flex items-center justify-center gap-4">
            <span class="h-px w-10 bg-gold/50"></span>
            Liaquatabad · Karachi
            <span class="h-px w-10 bg-gold/50"></span>
        </p>

        <h1 class="font-serif text-5xl md:text-7xl lg:text-8xl text-cream leading-[1.05] mb-8 animate-fade-up" style="animation-delay: 120ms">
            The Overnight<br>
            <span class="text-gold-gradient italic">Nihari</span>
        </h1>

        <p class="text-cream/75 text-base md:text-lg mb-12 max-w-xl mx-auto leading-relaxed animate-fade-up" style="animation-delay: 260ms">
            Slow-cooked through the night, finished with desi ghee ka tarka —
            a taste passed down through generations in the heart of Karachi.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-up" style="animation-delay: 380ms">
            <a href="{{ route('reservation') }}" class="btn-gold">
                Reserve a Table
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="{{ route('menu') }}" class="btn-outline">Explore the Menu</a>
        </div>

        {{-- Hero stats strip --}}
        <div class="grid grid-cols-3 gap-6 max-w-lg mx-auto mt-16 border-t border-gold/20 pt-8 animate-fade-in" style="animation-delay: 520ms">
            <div>
                <p class="font-serif text-2xl md:text-3xl text-gold-gradient">50+</p>
                <p class="text-cream/50 text-[11px] uppercase tracking-widest mt-1">Years of Legacy</p>
            </div>
            <div>
                <p class="font-serif text-2xl md:text-3xl text-gold-gradient">1</p>
                <p class="text-cream/50 text-[11px] uppercase tracking-widest mt-1">Pot, Every Night</p>
            </div>
            <div>
                <p class="font-serif text-2xl md:text-3xl text-gold-gradient">100%</p>
                <p class="text-cream/50 text-[11px] uppercase tracking-widest mt-1">Desi Ghee</p>
            </div>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 text-gold/70 flex flex-col items-center gap-2 animate-fade-in" style="animation-delay: 700ms">
        <span class="text-[10px] uppercase tracking-[0.3em]">Scroll</span>
        <div class="w-px h-10 bg-gold/40 overflow-hidden">
            <div class="w-px h-4 bg-gold animate-scroll-hint"></div>
        </div>
    </div>
</section>

{{-- ============ MARQUEE RIBBON ============ --}}
<div class="marquee bg-gold text-bg-dark py-4 border-y border-gold-light/40 relative z-10">
    <div class="marquee-track font-serif text-lg md:text-xl tracking-wide">
        @foreach(range(1, 8) as $i)
        <span class="inline-flex items-center gap-10">
            Nihari
            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0l2.5 9.5L24 12l-9.5 2.5L12 24l-2.5-9.5L0 12l9.5-2.5z"/></svg>
            Qorma
            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0l2.5 9.5L24 12l-9.5 2.5L12 24l-2.5-9.5L0 12l9.5-2.5z"/></svg>
            Paya
            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0l2.5 9.5L24 12l-9.5 2.5L12 24l-2.5-9.5L0 12l9.5-2.5z"/></svg>
            Kabab
            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0l2.5 9.5L24 12l-9.5 2.5L12 24l-2.5-9.5L0 12l9.5-2.5z"/></svg>
            Desi Ghee Ka Tarka
            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0l2.5 9.5L24 12l-9.5 2.5L12 24l-2.5-9.5L0 12l9.5-2.5z"/></svg>
        </span>
        @endforeach
    </div>
</div>

{{-- ============ OUR STORY ============ --}}
<section id="our-story" class="py-24 md:py-32 px-6 lg:px-10">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-20 items-center">

        <div class="relative reveal">
            <div class="frame-corner h-[420px] md:h-[520px] overflow-hidden">
                <img src="/nihari/nalli_nihari.jpg"
                     alt="A pot of slow-cooked nihari" loading="lazy"
                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-[1200ms]">
            </div>
            <div class="absolute -bottom-8 -right-4 md:-right-8 w-40 md:w-56 h-40 md:h-56 border-4 border-bg-dark overflow-hidden shadow-2xl">
                <img src="/bread/naan.jpg"
                     alt="Freshly baked naan" loading="lazy" class="w-full h-full object-cover">
            </div>
            <div class="absolute -top-6 -left-4 md:-left-6 bg-bg-dark border border-gold/30 px-5 py-4 text-center animate-float">
                <p class="font-serif text-gold-gradient text-2xl">Since</p>
                <p class="font-serif text-3xl text-cream">Generations</p>
            </div>
        </div>

        <div class="reveal">
            <p class="section-eyebrow justify-start before:hidden !pl-0" style="justify-content:flex-start">Our Story</p>
            <h2 class="section-heading mb-6">A Legacy Simmered <span class="text-gold-gradient italic">Overnight</span></h2>
            <div class="w-16 h-px bg-gold/50 mb-8"></div>
            <p class="text-cream/70 leading-relaxed text-lg mb-5">
                What began as a humble Nihari stall in Liaquatabad has grown into one of Karachi's most
                beloved food landmarks. Every pot is slow-cooked through the night, so the meat falls off
                the bone and every spoonful carries that deep, unhurried flavour.
            </p>
            <p class="text-cream/70 leading-relaxed mb-8">
                Finished with a generous splash of desi ghee ka tarka, our recipe has stayed unchanged
                across generations — rich, honest, and never rushed.
            </p>

            <blockquote class="border-l-2 border-gold pl-6 mb-10">
                <p class="font-serif italic text-cream/85 text-xl leading-relaxed">
                    "Great taste can't be rushed. It simmers overnight, like patience itself."
                </p>
            </blockquote>

            <div class="flex flex-wrap items-center gap-8">
                <div>
                    <p class="font-serif text-4xl text-gold-gradient tabular-nums"><span class="stat-counter" data-count="50">0</span>+</p>
                    <p class="text-cream/50 text-xs uppercase tracking-widest mt-1">Years of Taste</p>
                </div>
                <div class="w-px h-10 bg-gold/20"></div>
                <div>
                    <p class="font-serif text-4xl text-gold-gradient tabular-nums"><span class="stat-counter" data-count="1500">0</span>+</p>
                    <p class="text-cream/50 text-xs uppercase tracking-widest mt-1">Bowls a Week</p>
                </div>
                <div class="w-px h-10 bg-gold/20"></div>
                <div>
                    <p class="font-serif text-4xl text-gold-gradient tabular-nums">4.9</p>
                    <p class="text-cream/50 text-xs uppercase tracking-widest mt-1">Guest Rating</p>
                </div>
            </div>

            <a href="{{ route('about') }}" class="btn-outline mt-10">
                More About Us
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

    </div>
</section>

{{-- ============ SIGNATURE DISHES ============ --}}
@if($featuredDishes->count())
<section class="py-24 md:py-32 px-6 lg:px-10 bg-bg-dark-2 border-y border-gold/10">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 reveal">
            <p class="section-eyebrow">Signature Selection</p>
            <h2 class="section-heading mb-4">Dishes That Made Us <span class="text-gold-gradient italic">Legendary</span></h2>
            <p class="text-cream/50 max-w-lg mx-auto">A few of the plates our guests travel across Karachi for.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 stagger">
            @foreach($featuredDishes as $index => $dish)
            <div class="card card-hover group reveal overflow-hidden">
                <div class="relative h-72 overflow-hidden">
                    <img src="{{ $dish->image }}" alt="{{ $dish->name }}" loading="lazy"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-[1100ms]">
                    <div class="absolute inset-0 bg-gradient-to-t from-bg-dark via-transparent to-transparent"></div>
                    <span class="absolute top-5 left-5 dish-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                </div>
                <div class="p-7">
                    <div class="flex items-start justify-between gap-3 mb-3">
                        <h3 class="font-serif text-2xl text-cream group-hover:text-gold-gradient transition-all">{{ $dish->name }}</h3>
                        <span class="text-gold font-semibold font-serif text-2xl whitespace-nowrap shrink-0">Rs. {{ number_format($dish->price) }}</span>
                    </div>
                    <p class="text-cream/60 text-sm leading-relaxed mb-5">{{ $dish->description }}</p>
                    <a href="{{ route('menu') }}" class="inline-flex items-center gap-2 text-xs uppercase tracking-[0.2em] text-gold group-hover:gap-3 transition-all">
                        Order This
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-14 reveal">
            <a href="{{ route('menu') }}" class="btn-gold">View Full Menu</a>
        </div>
    </div>
</section>
@endif

{{-- ============ THE KITCHEN (CHEF) ============ --}}
@if($chef)
<section class="relative py-24 md:py-32 px-6 lg:px-10 overflow-hidden">
    <div class="absolute inset-0 opacity-[0.07]">
        <img src="{{ $chef->image }}" alt="" loading="lazy" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-b from-bg-dark via-bg-dark/80 to-bg-dark"></div>

    <div class="relative max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">
        <div class="reveal">
            <div class="frame-corner h-[440px] md:h-[560px] overflow-hidden">
                <img src="{{ $chef->image }}" alt="{{ $chef->name }}" loading="lazy"
                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-[1200ms]">
            </div>
        </div>
        <div class="reveal">
            <p class="section-eyebrow justify-start before:hidden" style="justify-content:flex-start">The Kitchen</p>
            <h2 class="section-heading mb-4">{{ $chef->name }}</h2>
            <p class="text-gold text-xs uppercase tracking-[0.3em] mb-8">{{ $chef->role }}</p>
            <p class="text-cream/70 leading-relaxed text-lg mb-8">{{ $chef->bio }}</p>

            <div class="grid grid-cols-3 gap-6 border-t border-gold/15 pt-8">
                <div>
                    <p class="font-serif text-3xl text-gold-gradient">7pm</p>
                    <p class="text-cream/50 text-[11px] uppercase tracking-widest mt-1">Pot On</p>
                </div>
                <div>
                    <p class="font-serif text-3xl text-gold-gradient">12+</p>
                    <p class="text-cream/50 text-[11px] uppercase tracking-widest mt-1">Hours Simmer</p>
                </div>
                <div>
                    <p class="font-serif text-3xl text-gold-gradient">1</p>
                    <p class="text-cream/50 text-[11px] uppercase tracking-widest mt-1">Secret Recipe</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- ============ TESTIMONIALS ============ --}}
@if($reviews->count())
<section class="py-24 md:py-32 px-6 lg:px-10 bg-bg-dark-2 border-y border-gold/10">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 reveal">
            <p class="section-eyebrow">Testimonials</p>
            <h2 class="section-heading mb-4">What Karachi <span class="text-gold-gradient italic">Says</span></h2>
            <p class="text-cream/50 max-w-lg mx-auto">Real words from the people who keep coming back.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 stagger">
            @foreach($reviews as $review)
            <div class="card card-hover p-7 flex flex-col reveal relative">
                <span class="absolute top-4 right-6 font-serif text-7xl text-gold/15 leading-none">"</span>
                <div class="text-gold mb-4 text-sm tracking-[0.3em]">
                    @for($i = 0; $i < $review->rating; $i++) &#9733; @endfor
                </div>
                <p class="text-cream/70 text-sm leading-relaxed mb-6 flex-1">"{{ $review->comment }}"</p>
                <div class="flex items-center gap-3 border-t border-gold/10 pt-4">
                    <span class="h-9 w-9 rounded-full bg-gold/15 text-gold flex items-center justify-center font-serif text-sm uppercase">
                        {{ substr($review->customer_name, 0, 1) }}
                    </span>
                    <p class="text-cream font-medium text-sm">{{ $review->customer_name }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ============ GALLERY ============ --}}
@if($galleryImages->count())
<section class="py-24 md:py-32 px-6 lg:px-10">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 reveal">
            <p class="section-eyebrow">Gallery</p>
            <h2 class="section-heading mb-4">A Glimpse of the <span class="text-gold-gradient italic">Experience</span></h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 stagger">
            @foreach($galleryImages as $image)
            <div class="group relative overflow-hidden {{ $loop->first ? 'col-span-2 row-span-1 md:col-span-2 md:h-80' : 'h-56 md:h-64' }} {{ $loop->index === 4 ? 'hidden md:block' : '' }} reveal">
                <img src="{{ $image->image }}" alt="{{ $image->caption }}" loading="lazy"
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-[1100ms]">
                <div class="absolute inset-0 bg-gradient-to-t from-bg-dark/90 via-bg-dark/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="absolute bottom-0 left-0 right-0 p-5 translate-y-3 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                    <p class="text-gold uppercase tracking-[0.25em] text-[11px]">{{ $image->caption }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ============ RESERVATION BAND ============ --}}
<section class="relative py-24 md:py-32 px-6 lg:px-10 overflow-hidden border-t border-gold/10">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=1600" alt="" loading="lazy"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-bg-dark/85"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(201,162,75,0.12)_0%,transparent_60%)]"></div>
    </div>

    <div class="relative z-10 max-w-3xl mx-auto text-center reveal">
        <p class="section-eyebrow">Reservations</p>
        <h2 class="font-serif text-4xl md:text-6xl text-cream leading-tight mb-6">
            The Pot Is On. <span class="text-gold-gradient italic">Your Seat Awaits.</span>
        </h2>
        <p class="text-cream/70 text-lg mb-10 max-w-xl mx-auto">
            Book ahead — evenings in Liaquatabad fill up fast, especially weekends.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('reservation') }}" class="btn-gold">Reserve a Table</a>
            <a href="tel:+923041300535" class="btn-light">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                +92 304 1300535
            </a>
        </div>
    </div>
</section>

@endsection
