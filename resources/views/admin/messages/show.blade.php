@extends('layouts.admin')

@section('content')
    <x-slot name="header">Message Details</x-slot>

    <div class="max-w-3xl">
        <div class="bg-white rounded-2xl shadow-lg p-6 lg:p-8">
            <!-- Header -->
            <div class="flex items-center justify-between mb-6 pb-6 border-b border-gray-200">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">{{ $message->name }}</h2>
                    <p class="text-sm text-gray-500 mt-1">{{ $message->created_at->format('d F Y, H:i') }} WIB</p>
                </div>
                @if(!$message->is_read)
                    <span class="px-4 py-2 bg-red-100 text-red-700 text-sm font-semibold rounded-full">New Message</span>
                @endif
            </div>

            <!-- Subject (if exists) -->
            @if($message->subject)
                <div class="mb-6 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border-l-4 border-[#004AAD]">
                    <p class="text-xs text-gray-500 font-semibold uppercase mb-1">Subject</p>
                    <p class="text-lg font-bold text-gray-900">{{ $message->subject }}</p>
                </div>
            @endif

            <!-- Contact Info -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                <div class="flex items-start p-4 bg-gray-50 rounded-xl">
                    <div class="bg-blue-100 p-3 rounded-lg mr-3">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-semibold uppercase">Email</p>
                        <a href="mailto:{{ $message->email }}" class="text-sm text-blue-600 hover:underline">{{ $message->email }}</a>
                    </div>
                </div>

                <div class="flex items-start p-4 bg-gray-50 rounded-xl">
                    <div class="bg-green-100 p-3 rounded-lg mr-3">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-semibold uppercase">Phone</p>
                        <a href="tel:{{ $message->phone }}" class="text-sm text-green-600 hover:underline">{{ $message->phone }}</a>
                    </div>
                </div>
            </div>

            <!-- Message Content -->
            <div class="mb-6">
                <h3 class="text-sm font-semibold text-gray-700 uppercase mb-3">Message</h3>
                <div class="bg-gray-50 rounded-xl p-6">
                    <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $message->message }}</p>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.messages.index') }}" class="flex-1 text-center px-6 py-3 bg-gray-100 text-gray-700 font-bold rounded-lg hover:bg-gray-200 transition-colors">
                    ← Back to Messages
                </a>
                <a href="mailto:{{ $message->email }}" class="flex-1 text-center px-6 py-3 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-600 transition-colors">
                    Reply via Email
                </a>
                <form id="delete-form-show-{{ $message->id }}" action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete('delete-form-show-{{ $message->id }}')" class="w-full px-6 py-3 bg-red-500 hover:bg-red-600 text-white font-bold rounded-lg transition-colors">
                        Delete Message
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
