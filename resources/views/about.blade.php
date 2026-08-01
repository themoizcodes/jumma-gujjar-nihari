@extends('layouts.app')

@section('title', 'About Us — Jumma Gujjar Nihari')

@section('content')

{{-- Page header --}}
<section class="relative pt-44 pb-20 px-6 lg:px-10 text-center overflow-hidden">
    <div class="absolute inset-0 opacity-[0.08]">
        <img src="https://images.unsplash.com/photo-1585937421612-70a008356fbe?w=1600" alt="" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-b from-bg-dark/60 to-bg-dark"></div>
    <div class="relative z-10">
        <p class="section-eyebrow">Our Journey</p>
        <h1 class="font-serif text-4xl md:text-6xl text-cream leading-tight">About <span class="text-gold-gradient italic">Jumma Gujjar</span></h1>
        <div class="ornament-divider mt-8"></div>
    </div>
</section>

{{-- Story --}}
<section class="py-20 md:py-28 px-6 lg:px-10">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div class="reveal">
            <p class="section-eyebrow justify-start before:hidden" style="justify-content:flex-start">From a Stall to a Landmark</p>
            <h2 class="section-heading mb-6">Humble Beginnings, <span class="text-gold-gradient italic">Unchanged Taste</span></h2>
            <div class="w-16 h-px bg-gold/50 mb-8"></div>
            <p class="text-cream/70 leading-relaxed text-lg mb-5">
                What started as a humble Nihari stall in Liaquatabad has grown into one of Karachi's most
                beloved food landmarks. Every pot of Nihari is slow-cooked overnight, following a recipe
                that has stayed unchanged across generations.
            </p>
            <p class="text-cream/70 leading-relaxed mb-8">
                Rich in flavour, finished with a generous desi ghee ka tarka that has become our signature —
                the same great taste that made us famous, served every single day.
            </p>
            <blockquote class="border-l-2 border-gold pl-6 mb-8">
                <p class="font-serif italic text-cream/85 text-xl leading-relaxed">
                    "We don't chase trends. We keep the fire burning and the recipe honest."
                </p>
            </blockquote>
        </div>

        <div class="relative reveal">
            <div class="frame-corner h-[420px] md:h-[540px] overflow-hidden">
                <img src="https://images.unsplash.com/photo-1631515243349-e0cb75fb8d3a?w=1000"
                     alt="Jumma Gujjar Nihari kitchen" loading="lazy"
                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-[1200ms]">
            </div>
            <div class="absolute -bottom-8 -left-4 md:-left-8 w-44 md:w-60 h-44 md:h-60 border-4 border-bg-dark overflow-hidden shadow-2xl">
                <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600"
                     alt="Desi restaurant ambience" loading="lazy" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</section>

{{-- Philosophy & History --}}
<section class="py-20 px-6 lg:px-10 bg-bg-dark-2 border-y border-gold/10">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 stagger">
        <div class="card card-hover p-10 reveal relative overflow-hidden">
            <span class="absolute -top-4 -right-2 font-serif text-8xl text-gold/10 leading-none">01</span>
            <h3 class="font-serif text-2xl text-cream mb-4">Our Philosophy</h3>
            <p class="text-cream/65 leading-relaxed">
                We believe great Nihari can't be rushed. Every dish is built on patience — slow cooking,
                honest ingredients, and desi ghee — never shortcuts, never compromise on taste.
            </p>
        </div>
        <div class="card card-hover p-10 reveal relative overflow-hidden">
            <span class="absolute -top-4 -right-2 font-serif text-8xl text-gold/10 leading-none">02</span>
            <h3 class="font-serif text-2xl text-cream mb-4">Restaurant History</h3>
            <p class="text-cream/65 leading-relaxed">
                Founded by Jumma in Liaquatabad, the restaurant has been passed down through the family,
                each generation preserving the original taste while welcoming new generations of food
                lovers from across Karachi.
            </p>
        </div>
    </div>
</section>

{{-- Chefs --}}
@if($chefs->count())
<section class="py-20 md:py-28 px-6 lg:px-10">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16 reveal">
            <p class="section-eyebrow">The People Behind It</p>
            <h2 class="section-heading">Our <span class="text-gold-gradient italic">Kitchen Team</span></h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 stagger">
            @foreach($chefs as $chef)
            <div class="card card-hover group p-6 md:p-8 flex flex-col sm:flex-row gap-7 reveal">
                <div class="w-full sm:w-44 h-44 shrink-0 overflow-hidden">
                    <img src="{{ $chef->image }}" alt="{{ $chef->name }}" loading="lazy"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <div>
                    <h3 class="font-serif text-2xl text-cream mb-1">{{ $chef->name }}</h3>
                    <p class="text-gold text-xs uppercase tracking-[0.3em] mb-4">{{ $chef->role }}</p>
                    <p class="text-cream/60 text-sm leading-relaxed">{{ $chef->bio }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Values & Awards --}}
<section class="py-20 px-6 lg:px-10 bg-bg-dark-2 border-y border-gold/10">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-14">
        <div class="reveal">
            <p class="section-eyebrow justify-start before:hidden" style="justify-content:flex-start">What We Stand For</p>
            <h3 class="font-serif text-3xl text-cream mb-8">Our Values</h3>
            <ul class="space-y-5 text-cream/70 leading-relaxed">
                <li class="flex gap-4"><span class="flex h-8 w-8 shrink-0 items-center justify-center border border-gold/40 text-gold text-sm mt-0.5">&#10003;</span> Authenticity — original recipes, no shortcuts</li>
                <li class="flex gap-4"><span class="flex h-8 w-8 shrink-0 items-center justify-center border border-gold/40 text-gold text-sm mt-0.5">&#10003;</span> Quality — fresh ingredients, desi ghee always</li>
                <li class="flex gap-4"><span class="flex h-8 w-8 shrink-0 items-center justify-center border border-gold/40 text-gold text-sm mt-0.5">&#10003;</span> Hospitality — every guest treated like family</li>
                <li class="flex gap-4"><span class="flex h-8 w-8 shrink-0 items-center justify-center border border-gold/40 text-gold text-sm mt-0.5">&#10003;</span> Consistency — the same great taste, every day</li>
            </ul>
        </div>
        <div class="reveal">
            <p class="section-eyebrow justify-start before:hidden" style="justify-content:flex-start">Recognition</p>
            <h3 class="font-serif text-3xl text-cream mb-8">Awards & Achievements</h3>
            <ul class="space-y-5 text-cream/70 leading-relaxed">
                <li class="flex gap-4"><span class="flex h-8 w-8 shrink-0 items-center justify-center border border-gold/40 text-gold text-sm mt-0.5">&#9733;</span> Recognized as one of Karachi's most popular Nihari spots by local food vloggers</li>
                <li class="flex gap-4"><span class="flex h-8 w-8 shrink-0 items-center justify-center border border-gold/40 text-gold text-sm mt-0.5">&#9733;</span> Featured across multiple street-food YouTube channels covering Liaquatabad</li>
                <li class="flex gap-4"><span class="flex h-8 w-8 shrink-0 items-center justify-center border border-gold/40 text-gold text-sm mt-0.5">&#9733;</span> Word-of-mouth favorite for over a generation</li>
            </ul>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20 px-6 lg:px-10 text-center reveal">
    <p class="font-serif text-3xl md:text-4xl text-cream mb-8">Taste the story yourself.</p>
    <a href="{{ route('reservation') }}" class="btn-gold">Reserve a Table</a>
</section>

@endsection
