@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-3xl shadow-lg border border-gray-100">

    <h2 class="text-2xl sm:text-3xl font-bold text-[#2ECCB0] mb-6 text-center">Contact Us</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 text-center font-medium animate-pulse">
            {{ session('success') }}
        </div>
    @endif

    <!-- Contact Form -->
    <form action="{{ route('contact.send') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label class="block text-gray-700 font-semibold mb-1">Name</label>
            <input type="text" name="name" placeholder="Your Name" value="{{ old('name') }}"
                   class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#2ECCB0] focus:border-transparent transition" required>
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label class="block text-gray-700 font-semibold mb-1">Email</label>
            <input type="email" name="email" placeholder="Your Email" value="{{ old('email') }}"
                   class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#2ECCB0] focus:border-transparent transition" required>
            @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Message -->
        <div>
            <label class="block text-gray-700 font-semibold mb-1">Message / Concern</label>
            <textarea name="message" rows="4" placeholder="Type your message here..." 
                      class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#2ECCB0] focus:border-transparent transition" required>{{ old('message') }}</textarea>
            @error('message')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit"
                    class="bg-[#2ECCB0] hover:bg-[#27b79e] text-[#05335f] font-semibold px-6 py-2 rounded-full shadow-md transition duration-300 transform hover:scale-105 w-full sm:w-auto">
                Send
            </button>
        </div>
    </form>

    <!-- Admin Reply (if any) -->
@if(session('adminReply') || $adminReply)
<div class="mt-6 p-4 bg-[#F0FDF4] border-l-4 border-[#2ECCB0] rounded-lg text-gray-900">
    <strong>Admin Reply:</strong>
    <p class="mt-1">{{ session('adminReply') ?? $adminReply }}</p>
</div>
@endif


    <!-- Footer Note -->
    <p class="mt-6 text-center text-gray-400 text-sm">We will get back to you within 24-48 hours.</p>
</div>
@endsection
