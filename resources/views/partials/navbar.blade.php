<header id="site-header" class="fixed top-0 left-0 right-0 z-50">
    <nav class="max-w-7xl mx-auto px-6 lg:px-10 flex items-center justify-between h-20">
        <a href="{{ route('home') }}" class="flex items-center gap-3 group">
            <span class="flex h-11 w-11 items-center justify-center border border-gold/50 text-gold font-serif text-lg group-hover:bg-gold group-hover:text-bg-dark transition-colors duration-300">JG</span>
            <span class="leading-tight">
                <span class="block font-serif text-lg md:text-xl text-cream tracking-wide group-hover:text-gold transition-colors">Jumma Gujjar</span>
                <span class="block text-[10px] uppercase tracking-[0.35em] text-gold">Nihari</span>
            </span>
        </a>

        <ul class="hidden md:flex items-center gap-8 font-medium text-sm uppercase tracking-widest">
            <li><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active text-gold' : 'text-cream/80 hover:text-gold' }}">Home</a></li>
            <li><a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active text-gold' : 'text-cream/80 hover:text-gold' }}">About</a></li>
            <li><a href="{{ route('menu') }}" class="nav-link {{ request()->routeIs('menu') ? 'active text-gold' : 'text-cream/80 hover:text-gold' }}">Menu</a></li>

            @auth
                @if(auth()->user()->isAdmin())
                <li><a href="{{ route('admin.dashboard') }}" class="nav-link text-cream/80 hover:text-gold">Admin</a></li>
                @else
                <li><a href="{{ route('profile.show') }}" class="nav-link {{ request()->routeIs('profile.show') ? 'active text-gold' : 'text-cream/80 hover:text-gold' }}">My Reservations</a></li>
                @endif
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link text-cream/80 hover:text-gold">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}" class="nav-link {{ request()->routeIs('login') ? 'active text-gold' : 'text-cream/80 hover:text-gold' }}">Login</a></li>
            @endauth

            <li>
                <a href="{{ route('reservation') }}" class="inline-flex items-center gap-2 border border-gold bg-gold text-bg-dark px-5 py-2.5 text-xs font-semibold uppercase tracking-widest hover:bg-gold-light hover:shadow-[0_10px_30px_-10px_rgba(201,162,75,0.6)] transition-all duration-300">
                    Reserve a Table
                </a>
            </li>
        </ul>

        <button id="menu-toggle" class="md:hidden text-gold p-2 -mr-2" aria-label="Toggle menu">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </nav>

    <div id="mobile-menu" class="md:hidden bg-bg-dark/95 backdrop-blur border-b border-gold/25">
        <ul class="flex flex-col px-6 py-5 gap-5 font-medium uppercase text-sm tracking-widest">
            <li><a href="{{ route('home') }}" class="block py-1 hover:text-gold {{ request()->routeIs('home') ? 'text-gold' : 'text-cream/80' }}">Home</a></li>
            <li><a href="{{ route('about') }}" class="block py-1 hover:text-gold {{ request()->routeIs('about') ? 'text-gold' : 'text-cream/80' }}">About</a></li>
            <li><a href="{{ route('menu') }}" class="block py-1 hover:text-gold {{ request()->routeIs('menu') ? 'text-gold' : 'text-cream/80' }}">Menu</a></li>
            <li><a href="{{ route('reservation') }}" class="block py-1 text-gold">Reserve a Table</a></li>

            @auth
                @if(auth()->user()->isAdmin())
                <li><a href="{{ route('admin.dashboard') }}" class="block py-1 hover:text-gold text-cream/80">Admin Panel</a></li>
                @else
                <li><a href="{{ route('profile.show') }}" class="block py-1 hover:text-gold text-cream/80">My Reservations</a></li>
                @endif
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block py-1 hover:text-gold text-cream/80">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}" class="block py-1 hover:text-gold text-cream/80">Login</a></li>
                <li><a href="{{ route('register') }}" class="block py-1 hover:text-gold text-cream/80">Register</a></li>
            @endauth
        </ul>
    </div>
</header>
