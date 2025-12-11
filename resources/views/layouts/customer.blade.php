<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mint Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AOS Animation -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #FFFFFF;
            color: #2E2E2E;
        }
        .nav-btn:hover { background-color: #DFF9F3; color: #2ECCB0; }
        .logout-btn:hover { background-color: #ff6b6b; color: #fff; }
    </style>
</head>
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<body class="flex flex-col min-h-screen">

<!-- HEADER -->
<!-- HEADER -->
<header class="p-4 flex justify-between items-center bg-white shadow-sm sticky top-0 z-50">

    <!-- LEFT SIDE BRAND -->
<div class="flex items-center space-x-4">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-12 h-12 rounded-full">
    <h1 class="text-4xl font-bold tracking-wide text-[#2E2E2E]">Mint Shop</h1>
</div>



    <!-- HAMBURGER (MOBILE ONLY) -->
    <button id="menuBtn" class="md:hidden p-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#2E2E2E]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    <!-- MOBILE + DESKTOP NAV -->
    <nav id="mobileMenu"
         class="hidden md:flex flex-col md:flex-row absolute md:static top-16 left-0 w-full md:w-auto bg-white md:bg-transparent shadow md:shadow-none p-4 md:p-0 space-y-3 md:space-y-0 md:space-x-2">

        @auth
        <div class="flex flex-col md:flex-row gap-3 md:gap-2">

            <!-- CART ICON -->
            <a href="{{ route('cart.view') }}" class="relative nav-btn flex items-center gap-2 px-3 py-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-7 h-7 text-[#2E2E2E]"
                     fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.35 2.7a1 1 0 001 1.3h12.1a1 1 0 001-1.3L17 13M7 13V6h10v7" />
                </svg>
              

                @php
                    $cart = session()->get('cart', []);
                    $count = count($cart);
                @endphp

                @if($count > 0)
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">
                        {{ $count }}
                    </span>
                @endif
            </a>

            <!-- HOME -->
            <a href="{{ route('dashboard') }}" class="nav-btn flex items-center gap-2 px-3 py-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                </svg>
                Home
            </a>

            <!-- PROFILE -->
            <!-- PROFILE DROPDOWN -->
<div class="relative" x-data="{ open: false }">

    <!-- BUTTON -->
    <button @click="open = !open" class="nav-btn flex items-center gap-2 px-3 py-2 rounded-lg">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-5 h-5"
             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M5.121 17.804A9 9 0 1116.88 6.195M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        Profile
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <!-- DROPDOWN MENU -->
    <div x-show="open"
         @click.away="open = false"
         x-transition
         class="absolute right-0 mt-2 w-40 bg-white shadow-lg rounded-lg border border-gray-200 z-50">

        <a href="{{ route('profile.edit') }}"
           class="flex items-center gap-2 px-4 py-2 hover:bg-[#DFF9F3] text-[#2E2E2E]">
            <svg xmlns="http://www.w3.org/

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5.121 17.804A9 9 0 1116.88 6.195M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Profile
            </a>

            <!-- SHOP -->
            <a href="{{ route('store.index') }}" class="nav-btn flex items-center gap-2 px-3 py-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.35 2.7a1 1 0 001 1.3h12.1a1 1 0 001-1.3L17 13M7 13V6h10v7" />
                </svg>
                Shop
            </a>
            

            <!-- CONTACT -->
            <a href="{{ route('contact.show') }}" class="nav-btn flex items-center gap-2 px-3 py-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 10c0 6-9 12-9 12s-9-6-9-12 9-12 9-12 9 6 9 12z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 12v.01"/>
                </svg>
                Contact Us
            </a>

            <!-- LOGOUT -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="logout-btn flex items-center gap-2 px-3 py-2 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                    </svg>
                    Logout
                </button>
            </form>

        </div>
        @endauth


        @guest
        <div class="flex flex-col md:flex-row gap-3 md:gap-2">

            <a href="{{ route('login') }}"
               class="px-4 py-2 rounded-lg bg-[#2ECCB0] text-white font-semibold shadow flex items-center gap-2">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15 12H3m12 0l-4-4m4 4l-4 4m6-9V5a2 2 0 00-2-2h-7" />
                </svg>

                Login
            </a>

            <a href="{{ route('register') }}"
               class="px-4 py-2 rounded-lg border-2 border-[#2ECCB0] text-[#2ECCB0] font-semibold hover:bg-[#DFF9F3] flex items-center gap-2">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 4v16m8-8H4" />
                </svg>

                Register
            </a>

        </div>
        @endguest
    </nav>
</header>

<script>
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>

<!-- CONTENT -->
<main class="flex-1 p-6 bg-[#DFF9F3]">
    @yield('content')
</main>

<!-- FOOTER -->
<footer class="p-4 text-center mt-auto shadow-inner bg-white">
    &copy; {{ date('Y') }} Mint Shop ni Daniel. Calm & Modern UI.
</footer>

<script>
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>

</body>
</html>
