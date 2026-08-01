@extends('layouts.app')

@section('title', 'Register — Jumma Gujjar Nihari')

@section('content')
<section class="relative pt-44 pb-24 px-6 lg:px-10 min-h-screen flex items-start justify-center overflow-hidden">
    <div class="absolute inset-0 opacity-[0.07]">
        <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=1600" alt="" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-b from-bg-dark/70 to-bg-dark"></div>

    <div class="relative w-full max-w-md">
        <div class="text-center mb-10 reveal">
            <p class="section-eyebrow">Join Us</p>
            <h1 class="font-serif text-4xl text-cream">Create an <span class="text-gold-gradient italic">Account</span></h1>
        </div>

        @if ($errors->any())
        <div class="border border-red-500/40 bg-red-500/10 text-red-300 text-sm p-4 mb-6 animate-fade-in">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="card p-6 md:p-8 reveal">
            @csrf
            <div class="mb-4">
                <label class="field-label" for="name">Full Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus class="input-field">
            </div>
            <div class="mb-4">
                <label class="field-label" for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="input-field">
            </div>
            <div class="mb-4">
                <label class="field-label" for="phone">Phone (optional)</label>
                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" class="input-field">
            </div>
            <div class="mb-4">
                <label class="field-label" for="password">Password</label>
                <input type="password" name="password" id="password" required class="input-field">
            </div>
            <div class="mb-6">
                <label class="field-label" for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required class="input-field">
            </div>
            <button type="submit" class="btn-gold w-full">Register</button>
        </form>

        <p class="text-center text-cream/60 text-sm mt-6 reveal">
            Already have an account? <a href="{{ route('login') }}" class="text-gold hover:underline">Login</a>
        </p>
    </div>
</section>
@endsection
