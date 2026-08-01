<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#0D0D0D">
    <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Crect width='64' height='64' rx='12' fill='%230D0D0D'/%3E%3Ctext x='32' y='44' font-family='Georgia,serif' font-size='36' fill='%23C9A24B' text-anchor='middle'%3EJG%3C/text%3E%3C/svg%3E">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>@yield('title', 'Admin') — Jumma Gujjar Nihari</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-bg-dark text-cream font-sans antialiased min-h-screen md:flex">

    {{-- Desktop sidebar --}}
    <aside id="admin-sidebar" class="hidden md:flex w-64 shrink-0 bg-bg-dark-2 border-r border-gold/20 min-h-screen flex-col fixed inset-y-0 left-0 z-40">
        <div class="px-6 py-6 border-b border-gold/20 flex items-center gap-3">
            <span class="flex h-10 w-10 items-center justify-center border border-gold/50 text-gold font-serif text-base">JG</span>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="font-serif text-lg text-cream leading-tight block">Jumma Gujjar</a>
                <p class="text-cream/40 text-[10px] uppercase tracking-[0.3em] mt-0.5">Admin Panel</p>
            </div>
        </div>
        <nav class="flex-1 px-4 py-6 space-y-1.5 text-sm">
            <p class="px-3 pt-1 pb-2 text-[10px] uppercase tracking-[0.3em] text-cream/30">Overview</p>
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-gold text-bg-dark shadow-[0_8px_20px_-8px_rgba(201,162,75,0.6)]' : 'text-cream/70 hover:bg-gold/10 hover:text-gold' }}">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                Dashboard
            </a>
            <a href="{{ route('admin.reservations.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded transition-all duration-200 {{ request()->routeIs('admin.reservations.*') ? 'bg-gold text-bg-dark shadow-[0_8px_20px_-8px_rgba(201,162,75,0.6)]' : 'text-cream/70 hover:bg-gold/10 hover:text-gold' }}">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Reservations
            </a>
            <a href="{{ route('admin.menu.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded transition-all duration-200 {{ request()->routeIs('admin.menu.*') || request()->routeIs('admin.categories.*') ? 'bg-gold text-bg-dark shadow-[0_8px_20px_-8px_rgba(201,162,75,0.6)]' : 'text-cream/70 hover:bg-gold/10 hover:text-gold' }}">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                Menu
            </a>
            <a href="{{ route('admin.tables.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded transition-all duration-200 {{ request()->routeIs('admin.tables.*') ? 'bg-gold text-bg-dark shadow-[0_8px_20px_-8px_rgba(201,162,75,0.6)]' : 'text-cream/70 hover:bg-gold/10 hover:text-gold' }}">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h.01M11 15h.01M15 15h.01M5 19V5a2 2 0 012-2h10a2 2 0 012 2v14"/></svg>
                Tables
            </a>
            <a href="{{ route('admin.customers.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded transition-all duration-200 {{ request()->routeIs('admin.customers.*') ? 'bg-gold text-bg-dark shadow-[0_8px_20px_-8px_rgba(201,162,75,0.6)]' : 'text-cream/70 hover:bg-gold/10 hover:text-gold' }}">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Customers
            </a>
            <p class="px-3 pt-4 pb-2 text-[10px] uppercase tracking-[0.3em] text-cream/30">Account</p>
        </nav>
        <div class="px-4 py-6 border-t border-gold/20 space-y-1">
            <a href="{{ route('home') }}" class="flex items-center gap-3 px-3 py-2.5 text-cream/50 hover:text-gold text-sm rounded hover:bg-gold/5 transition-colors">← View Website</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex w-full items-center gap-3 px-3 py-2.5 text-cream/50 hover:text-gold text-sm rounded hover:bg-gold/5 transition-colors">Logout</button>
            </form>
        </div>
    </aside>

    {{-- Mobile top bar + drawer --}}
    <header class="md:hidden sticky top-0 z-40 bg-bg-dark-2/95 backdrop-blur border-b border-gold/20">
        <div class="flex items-center justify-between px-5 py-4">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 font-serif text-lg text-cream">
                <span class="flex h-9 w-9 items-center justify-center border border-gold/50 text-gold font-serif text-sm">JG</span>
                Jumma Gujjar
            </a>
            <button id="admin-menu-toggle" class="text-gold p-2 -mr-2" aria-label="Toggle admin menu">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
        <div id="admin-mobile-menu" class="hidden bg-bg-dark-2 border-t border-gold/20 px-5 py-4 space-y-1 text-sm">
            <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-gold text-bg-dark' : 'text-cream/70 hover:bg-gold/10' }}">Dashboard</a>
            <a href="{{ route('admin.reservations.index') }}" class="block px-3 py-2 rounded {{ request()->routeIs('admin.reservations.*') ? 'bg-gold text-bg-dark' : 'text-cream/70 hover:bg-gold/10' }}">Reservations</a>
            <a href="{{ route('admin.menu.index') }}" class="block px-3 py-2 rounded {{ request()->routeIs('admin.menu.*') || request()->routeIs('admin.categories.*') ? 'bg-gold text-bg-dark' : 'text-cream/70 hover:bg-gold/10' }}">Menu</a>
            <a href="{{ route('admin.tables.index') }}" class="block px-3 py-2 rounded {{ request()->routeIs('admin.tables.*') ? 'bg-gold text-bg-dark' : 'text-cream/70 hover:bg-gold/10' }}">Tables</a>
            <a href="{{ route('admin.customers.index') }}" class="block px-3 py-2 rounded {{ request()->routeIs('admin.customers.*') ? 'bg-gold text-bg-dark' : 'text-cream/70 hover:bg-gold/10' }}">Customers</a>
            <div class="border-t border-gold/10 mt-2 pt-2 space-y-1">
                <a href="{{ route('home') }}" class="block px-3 py-2 text-cream/50 hover:text-gold">← View Website</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-3 py-2 text-cream/50 hover:text-gold">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <main class="flex-1 min-w-0 md:ml-64">
        <div class="p-6 lg:p-10">
            @if (session('status'))
            <div class="flex items-center gap-3 border border-gold/40 bg-gold/10 text-gold text-sm p-4 mb-6 animate-fade-in">
                <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ session('status') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="border border-red-500/40 bg-red-500/10 text-red-300 text-sm p-4 mb-6">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                </ul>
            </div>
            @endif

            @yield('content')
        </div>
    </main>

</body>
</html>
