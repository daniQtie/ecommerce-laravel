@extends('layouts.admin')

@section('content')
<div class="max-w-5xl mx-auto bg-white rounded-3xl shadow-xl p-6">
    <h2 class="text-3xl font-bold text-[#2ECCB0] mb-6 text-center">Customer Messages</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-6 text-center font-medium animate-pulse">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-6">
        @foreach($messages as $message)
            <div class="border border-gray-200 rounded-2xl p-5 shadow-sm hover:shadow-md transition duration-200">
                <div class="flex justify-between items-center mb-2">
                    <div>
                        <p class="font-semibold text-lg">{{ $message->senderName() }}</p>
                        <p class="text-gray-500 text-sm">{{ $message->senderEmail() }}</p>
                        <p class="text-gray-400 text-xs">{{ $message->created_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>

                <p class="mt-2 text-gray-800">{{ $message->message }}</p>

                @if($message->reply)
                    <div class="mt-4 p-3 bg-[#DFF9F3] rounded-xl text-gray-900 border-l-4 border-[#2ECCB0]">
                        <strong>Reply:</strong> {{ $message->reply }}
                    </div>
                @else
                    <form action="{{ route('admin.messages.reply', $message->id) }}" method="POST" class="mt-4 flex flex-col sm:flex-row gap-3">
                        @csrf
                        <input type="text" name="reply" placeholder="Type your reply..."
                               class="flex-1 border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#2ECCB0] transition" required>
                        <button type="submit"
                                class="bg-[#2ECCB0] hover:bg-[#27b79b] text-white font-semibold px-6 py-3 rounded-xl shadow-lg transition transform hover:scale-105">
                            Send Reply
                        </button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
