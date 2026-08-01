@extends('layouts.app')

@section('title', 'Login — Jumma Gujjar Nihari')

@section('content')
<section class="relative pt-44 pb-24 px-6 lg:px-10 min-h-screen flex items-start justify-center overflow-hidden">
    <div class="absolute inset-0 opacity-[0.07]">
        <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=1600" alt="" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-b from-bg-dark/70 to-bg-dark"></div>

    <div class="relative w-full max-w-md">
        <div class="text-center mb-10 reveal">
            <p class="section-eyebrow">Welcome Back</p>
            <h1 class="font-serif text-4xl text-cream">Login to <span class="text-gold-gradient italic">Your Account</span></h1>
        </div>

        @if ($errors->any())
        <div class="border border-red-500/40 bg-red-500/10 text-red-300 text-sm p-4 mb-6 animate-fade-in">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="card p-6 md:p-8 reveal">
            @csrf
            <div class="mb-4">
                <label class="field-label" for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus class="input-field">
            </div>
            <div class="mb-4">
                <label class="field-label" for="password">Password</label>
                <input type="password" name="password" id="password" required class="input-field">
            </div>
            <label class="flex items-center gap-2 text-sm text-cream/60 mb-6 cursor-pointer">
                <input type="checkbox" name="remember" class="accent-[color:var(--color-gold)] h-4 w-4"> Remember me
            </label>
            <button type="submit" class="btn-gold w-full">Login</button>
        </form>

        <p class="text-center text-cream/60 text-sm mt-6 reveal">
            Don't have an account? <a href="{{ route('register') }}" class="text-gold hover:underline">Register</a>
        </p>
    </div>
</section>
@endsection
