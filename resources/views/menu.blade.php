@extends('layouts.app')

@section('title', 'Digital Menu — Jumma Gujjar Nihari')

@section('content')

{{-- Page header --}}
<section class="relative pt-44 pb-16 px-6 lg:px-10 text-center overflow-hidden">
    <div class="absolute inset-0 opacity-[0.08]">
        <img src="https://images.unsplash.com/photo-1631452180519-c014fe946bc7?w=1600" alt="" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-b from-bg-dark/60 to-bg-dark"></div>
    <div class="relative z-10">
        <p class="section-eyebrow">Taste the Legacy</p>
        <h1 class="font-serif text-4xl md:text-6xl text-cream leading-tight">The <span class="text-gold-gradient italic">Menu</span></h1>
        <div class="ornament-divider mt-8"></div>
    </div>
</section>

<section class="px-6 lg:px-10 pb-28">
    <div class="max-w-6xl mx-auto">

        {{-- Category Tabs --}}
        <div class="flex flex-wrap justify-center gap-3 mb-16 reveal" id="category-tabs">
            @foreach($categories as $index => $category)
            <button
                class="category-tab px-5 py-3 border text-xs uppercase tracking-[0.2em] transition-all duration-300 cursor-pointer {{ $index === 0 ? 'bg-gold text-bg-dark border-gold shadow-[0_10px_30px_-10px_rgba(201,162,75,0.6)]' : 'border-gold/40 text-gold hover:bg-gold/10' }}"
                data-target="cat-{{ $category->slug }}">
                {{ $category->name }}
            </button>
            @endforeach
        </div>

        {{-- Category Sections --}}
        @foreach($categories as $index => $category)
        <div id="cat-{{ $category->slug }}" class="category-panel {{ $index === 0 ? '' : 'hidden' }} mb-20 reveal">
            <div class="flex items-center gap-4 mb-10">
                <span class="font-serif text-gold-gradient text-2xl">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                <h2 class="font-serif text-2xl md:text-3xl text-cream">{{ $category->name }}</h2>
                <span class="flex-1 h-px bg-gradient-to-r from-gold/40 to-transparent"></span>
            </div>

            @if($category->menuItems->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 stagger">
                @foreach($category->menuItems as $item)
                <div class="card card-hover group flex flex-col overflow-hidden reveal">
                    <div class="relative h-44 overflow-hidden">
                        <img src="{{ $item->image }}" alt="{{ $item->name }}" loading="lazy"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-[1100ms]">
                        <div class="absolute inset-0 bg-gradient-to-t from-bg-dark/80 via-transparent to-transparent"></div>
                        @if(!$item->is_available)
                        <span class="absolute top-3 right-3 badge-status border-red-500/60 bg-bg-dark/80 text-red-400 backdrop-blur">Sold Out</span>
                        @elseif($item->is_featured)
                        <span class="absolute top-3 left-3 badge-status border-gold/60 bg-bg-dark/80 text-gold backdrop-blur">&#9733; Featured</span>
                        @endif
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <div class="flex items-start justify-between gap-3 mb-2">
                            <h3 class="font-serif text-lg text-cream group-hover:text-gold transition-colors leading-snug">{{ $item->name }}</h3>
                            <span class="font-serif text-lg text-gold whitespace-nowrap shrink-0">Rs. {{ number_format($item->price) }}</span>
                        </div>
                        @if($item->description)
                        <p class="text-cream/55 text-sm leading-relaxed flex-1">{{ $item->description }}</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <p class="text-center text-cream/40">No items available in this category yet.</p>
            @endif
        </div>
        @endforeach

        {{-- Bottom CTA --}}
        <div class="text-center mt-8 reveal">
            <p class="text-cream/50 mb-6">Hungry already?</p>
            <a href="{{ route('reservation') }}" class="btn-gold">Reserve a Table</a>
        </div>

    </div>
</section>

@endsection
