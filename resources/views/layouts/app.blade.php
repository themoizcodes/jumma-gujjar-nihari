<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#0A0908">
    <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Crect width='64' height='64' rx='12' fill='%230A0908'/%3E%3Crect x='6' y='6' width='52' height='52' rx='9' fill='none' stroke='%23C9A24B' stroke-opacity='0.5'/%3E%3Ctext x='32' y='44' font-family='Georgia,serif' font-size='32' fill='%23C9A24B' text-anchor='middle'%3EJG%3C/text%3E%3C/svg%3E">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>@yield('title', 'Jumma Gujjar Nihari — Liaquatabad, Karachi')</title>
    <meta name="description" content="@yield('meta_description', 'Jumma Gujjar Nihari — Karachi\'s legendary Nihari with authentic Desi Ghee ka Tarka. Located in Liaquatabad. Dine-in, outdoor seating & table reservations.')">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-bg-dark text-cream font-sans antialiased">

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>
