@extends('layouts.admin')

@section('content')
<div class="max-w-md mx-auto bg-[#DFF9F3] rounded-3xl shadow-lg p-6 mt-6">

    <h2 class="text-2xl font-bold text-[#2ECCB0] mb-6 text-center">User Details</h2>

    <!-- PROFILE PICTURE -->
    <div class="flex flex-col items-center mb-6">
        @if($user->profile_picture && file_exists(storage_path('app/public/profile_pictures/' . $user->profile_picture)))
            <img src="{{ asset('storage/profile_pictures/' . $user->profile_picture) }}"
                 alt="Profile Picture" class="w-24 h-24 object-cover rounded-full mb-2">
        @else
            <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mb-2">
                <span class="text-gray-400">No Picture</span>
            </div>
        @endif
    </div>

    <!-- NAME -->
    <div class="flex flex-col mb-4">
        <label class="mb-1 font-semibold text-[#2E2E2E]">Name</label>
        <p class="px-3 py-2 rounded-xl border border-[#2ECCB0] bg-white text-[#2E2E2E]">
            {{ $user->name }}
        </p>
    </div>

    <!-- EMAIL -->
    <div class="flex flex-col mb-4">
        <label class="mb-1 font-semibold text-[#2E2E2E]">Email</label>
        <p class="px-3 py-2 rounded-xl border border-[#2ECCB0] bg-white text-[#2E2E2E]">
            {{ $user->email }}
        </p>
    </div>

    <!-- ROLE -->
    <div class="flex flex-col mb-4">
        <label class="mb-1 font-semibold text-[#2E2E2E]">Role</label>
        <p class="px-3 py-2 rounded-xl border border-[#2ECCB0] bg-white text-[#2E2E2E]">
            {{ ucfirst($user->role) }}
        </p>
    </div>

    <!-- BACK BUTTON -->
    <div class="text-center mt-6">
        <a href="{{ route('admin.users.index') }}"
           class="bg-[#2ECCB0] hover:bg-[#26b696] text-[#2E2E2E] font-semibold px-6 py-2 rounded-2xl shadow-md transition">
            Back to Users
        </a>
    </div>
</div>
@endsection
