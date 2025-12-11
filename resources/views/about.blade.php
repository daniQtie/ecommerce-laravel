@extends('layouts.customer')

@section('content')

<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
<!-- NAVBAR -->
<nav class="bg-white shadow-md rounded-b-3xl mb-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <a href="{{ route('store.index') }}" class="text-2xl font-bold text-[#2ECCB0]">MyStore</a>

            <!-- Links -->
            <div class="hidden md:flex space-x-6 font-semibold text-[#2E2E2E]">
                <a href="{{ route('store.index') }}" class="hover:text-[#2ECCB0] transition">Home
                <a href="{{ route('contact.show') }}" class="hover:text-[#2ECCB0] transition">Contact</a>
                <a href="{{ route('about') }}" class="hover:text-[#2ECCB0] transition">About</a>

            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-btn" class="focus:outline-none text-[#2ECCB0]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden bg-white px-4 pt-2 pb-4 space-y-1">
        <a href="{{ route('store.index') }}" class="block py-2 text-[#2E2E2E] font-semibold hover:text-[#2ECCB0] transition">Products</a>
        <a href="{{ route('contact.show') }}" class="block py-2 text-[#2E2E2E] font-semibold hover:text-[#2ECCB0] transition">Contact</a>
        <a href="#" class="block py-2 text-[#2E2E2E] font-semibold hover:text-[#2ECCB0] transition">About</a>
    </div>
</nav>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- Title -->
    <h1 class="text-4xl font-bold text-center text-[#2ECCB0] mb-12" data-aos="fade-down">
        About Us
    </h1>

    <!-- DESCRIPTION -->
    <p class="text-center text-[#2E2E2E] max-w-3xl mx-auto text-lg mb-16" data-aos="fade-up">
        Welcome to our online store! Meet the passionate people behind this platform.
        We aim to provide smooth shopping experience, quality service, and continuous improvements.
    </p>

    <!-- TEAM SECTION -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

        <!-- CARD 1: CODER -->
        <div data-aos="fade-up" data-aos-duration="800"
             class="bg-white shadow-lg rounded-3xl overflow-hidden border border-[#2ECCB0] hover:shadow-[0_0_20px_rgba(46,204,176,0.5)] transition duration-300">
            
            <img src="{{ asset('images/about/pfp4.png') }}"
                 class="w-full h-64 object-cover">

            <div class="p-6 text-center">
                <h2 class="text-2xl font-bold text-[#2ECCB0]">Softdrinks</h2>
                <p class="text-[#6B6B6B] mt-2">
                   Coke, Royal, Mt.Dew
            </div>
        </div>

        <!-- CARD 2: DEVELOPER -->
        <div data-aos="fade-up" data-aos-duration="900"
             class="bg-white shadow-lg rounded-3xl overflow-hidden border border-[#2ECCB0] hover:shadow-[0_0_20px_rgba(46,204,176,0.5)] transition duration-300">
            
            <img src="{{ asset('images/about/pfp2.png') }}"
                 class="w-full h-64 object-cover">

            <div class="p-6 text-center">
                <h2 class="text-2xl font-bold text-[#2ECCB0]">The Coder-The Developer-The Designer</h2>
                <p class="text-[#6B6B6B] mt-2">
                    Builds features, improves UI/UX, and ensures everything runs perfectly.
                    Works on integrations, performance, and enhancements.
                </p>
            </div>
        </div>

        <!-- CARD 3: DESIGNER -->
        <div data-aos="fade-up" data-aos-duration="1000"
             class="bg-white shadow-lg rounded-3xl overflow-hidden border border-[#2ECCB0] hover:shadow-[0_0_20px_rgba(46,204,176,0.5)] transition duration-300">

            <img src="{{ asset('images/about/1x1.png') }}"
                 class="w-full h-64 object-cover">

            <div class="p-6 text-center">
                <h2 class="text-2xl font-bold text-[#2ECCB0]">Pansit canton</h2>
                <p class="text-[#6B6B6B] mt-2">
                   Chillimansi, Sweet and Spicy, Extra Spicy
                </p>
            </div>
        </div>

    </div>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

@endsection
