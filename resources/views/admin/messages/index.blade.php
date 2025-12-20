@extends('layouts.admin')

@section('content')
    <x-slot name="header">Messages</x-slot>

    <!-- Desktop Table View -->
    <div class="hidden lg:block bg-white rounded-2xl shadow-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Subject</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Message</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-4 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($messages as $message)
                <tr class="hover:bg-gray-50 transition-colors {{ !$message->is_read ? 'bg-blue-50' : '' }}">
                    <td class="px-6 py-4">
                        @if($message->is_read)
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-600">Read</span>
                        @else
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-600 animate-pulse">New</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $message->name }}</div>
                        <div class="text-sm text-gray-500">{{ $message->phone }}</div>
                    </td>
                    <td class="px-6 py-4">
                        @if($message->subject)
                            <div class="text-sm font-medium text-gray-900 max-w-xs truncate" title="{{ $message->subject }}">
                                {{ $message->subject }}
                            </div>
                        @else
                            <span class="text-xs text-gray-400 italic">No subject</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $message->email }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600 max-w-xs truncate">{{ $message->message }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $message->created_at->format('d M Y, H:i') }}</td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col gap-2">
                            <a href="{{ route('admin.messages.show', $message) }}" class="inline-flex items-center justify-center px-4 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors text-sm font-medium">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                View
                            </a>
                            <form id="delete-form-{{ $message->id }}" action="{{ route('admin.messages.destroy', $message) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete('delete-form-{{ $message->id }}')" class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors text-sm font-medium">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                        <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                        <p>No messages yet</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Mobile Card View -->
    <div class="lg:hidden space-y-4">
        @forelse($messages as $message)
        <div class="bg-white rounded-xl shadow-lg p-4 {{ !$message->is_read ? 'border-2 border-red-200' : '' }}">
            <div class="flex items-start justify-between mb-3">
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-1">
                        <h3 class="font-bold text-gray-900">{{ $message->name }}</h3>
                        @if(!$message->is_read)
                            <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-red-100 text-red-600">New</span>
                        @endif
                    </div>
                    @if($message->subject)
                        <p class="text-sm font-semibold text-[#004AAD] mb-1 line-clamp-1">
                            📋 {{ $message->subject }}
                        </p>
                    @endif
                    <p class="text-sm text-gray-600">{{ $message->email }}</p>
                    <p class="text-sm text-gray-600">{{ $message->phone }}</p>
                </div>
            </div>
            <p class="text-sm text-gray-700 mb-3 line-clamp-2">{{ $message->message }}</p>
            <div class="flex items-center justify-between text-xs text-gray-500 mb-3">
                <span>{{ $message->created_at->diffForHumans() }}</span>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('admin.messages.show', $message) }}" class="flex-1 text-center px-4 py-2 bg-blue-100 text-blue-700 rounded-lg font-medium hover:bg-blue-200 transition-colors">
                    View
                </a>
                <form id="delete-form-mobile-{{ $message->id }}" action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete('delete-form-mobile-{{ $message->id }}')" class="w-full px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg transition-colors">
                        Delete
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="bg-white rounded-xl shadow-lg p-12 text-center text-gray-500">
            <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
            </svg>
            <p>No messages yet</p>
        </div>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $messages->links() }}
    </div>
@endsection
