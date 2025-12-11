@extends('layouts.customer')

@section('content')
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />

<!-- NAVBAR -->
<nav class="bg-white shadow-md rounded-b-3xl mb-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-4">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-12 h-12 rounded-full">
    <h1 class="text-4xl font-bold tracking-wide text-[#2E2E2E]"></h1>
</div>

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

<!-- SCRIPT FOR MOBILE MENU -->
<script>
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>

<!-- SEARCH / FILTER BAR -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-12 bg-[#DFF9F3] text-[#2E2E2E]">
    <div data-aos="fade-up" data-aos-duration="800"
         class="rounded-3xl p-6 sm:p-8 shadow-[0_0_20px_rgba(46,204,176,0.15)]">
        <form method="GET" action="{{ route('store.index') }}"
              class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 sm:gap-5">

            <!-- SEARCH -->
            <div class="relative">
                <input type="text" name="search" placeholder="Search products..."
                       value="{{ request('search') }}"
                       class="w-full p-3 sm:p-4 rounded-2xl bg-white border border-[#2ECCB0] text-[#2E2E2E]
                              placeholder-[#6B6B6B] focus:ring-2 focus:ring-[#2ECCB0] outline-none
                              shadow-[0_0_6px_rgba(46,204,176,0.3)] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-1/2 -translate-y-1/2 h-5 w-5 text-[#2ECCB0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M16.65 16.65a7.5 7.5 0 10-10.6-10.6 7.5 7.5 0 0010.6 10.6z"/>
                </svg>
            </div>

            <!-- CATEGORY -->
            <select name="category" class="w-full p-3 sm:p-4 rounded-2xl bg-white border border-[#2ECCB0] text-[#2E2E2E] shadow-[0_0_6px_rgba(46,204,176,0.3)]">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <!-- SORT -->
            <select name="sort" class="w-full p-3 sm:p-4 rounded-2xl bg-white border border-[#2ECCB0] text-[#2E2E2E] shadow-[0_0_6px_rgba(46,204,176,0.3)]">
                <option value="">Sort By</option>
                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Popularity</option>
            </select>

            <!-- APPLY BTN -->
            <button type="submit" class="w-full bg-[#2ECCB0] hover:bg-[#27b79e] text-white font-bold py-3 sm:py-4 rounded-2xl shadow-[0_0_12px_rgba(46,204,176,0.8)] hover:shadow-[0_0_24px_rgba(46,204,176,1)] transition-all duration-300 flex items-center justify-center gap-2">
                Apply
            </button>
        </form>
    </div>

    <!-- PRODUCTS GRID -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 sm:gap-8 lg:gap-10">
        @forelse($products as $product)
            <div data-aos="fade-up" data-aos-duration="800" class="bg-white border border-[#2ECCB0] rounded-3xl overflow-hidden shadow-xl hover:shadow-[0_0_25px_rgba(46,204,176,0.6)] hover:scale-[1.03] transition-all duration-300">
                <!-- IMAGE -->
                <div class="h-48 sm:h-56 md:h-64 lg:h-72 w-full flex items-center justify-center overflow-hidden relative group">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="object-cover h-full w-full hover:scale-110 transition-all duration-500 rounded-2xl">
                    @else
                        <span class="text-[#2ECCB0] font-bold">No Image</span>
                    @endif

                    <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 flex items-center justify-center gap-2 transition-opacity rounded-2xl">
                        <a href="{{ route('store.show', $product->id) }}" class="bg-[#2ECCB0] text-white px-3 py-2 rounded-2xl font-semibold flex items-center gap-2 hover:bg-[#27b79e] transition">
                            View
                        </a>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button class="bg-[#2ECCB0] text-white px-3 py-2 rounded-2xl font-semibold flex items-center gap-2 hover:bg-[#27b79e] transition">
                                Add
                            </button>
                        </form>
                    </div>
                </div>

                <!-- INFO -->
                <div class="p-4 sm:p-5 space-y-3">
                    <h3 class="text-lg sm:text-xl font-extrabold text-[#1F1F1F] tracking-wide">{{ $product->name }}</h3>
                    <p class="text-[#6B6B6B] text-sm">{{ $product->category->name ?? 'Uncategorized' }}</p>
                    <p class="text-2xl sm:text-3xl font-black text-[#1F1F1F]">${{ number_format($product->price, 2) }}</p>
                    <a href="{{ route('store.show', $product->id) }}" class="block bg-[#2ECCB0] hover:bg-[#27b79e] text-white text-center font-semibold py-3 sm:py-3.5 rounded-2xl transition-all duration-300">
                        View Product
                    </a>
                </div>
            </div>
        @empty
            <p class="text-[#6B6B6B] col-span-4 text-center text-lg">No products found.</p>
        @endforelse
    </div>

    <!-- PAGINATION -->
    <div class="mt-8 sm:mt-10" data-aos="fade-up" data-aos-duration="800">
        {{ $products->links() }}
    </div>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

@endsection
