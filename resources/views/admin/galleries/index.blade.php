@extends('layouts.admin')

@section('content')
    <x-slot name="header">Gallery</x-slot>

    <div class="mb-6">
        <a href="{{ route('admin.galleries.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white font-bold rounded-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Upload Image
        </a>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
        @forelse($galleries as $gallery)
        <div class="group relative bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all transform hover:-translate-y-1">
            <div class="aspect-square">
                <img src="{{ asset('storage/' . $gallery->image) }}" class="w-full h-full object-cover">
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                <div class="absolute bottom-0 left-0 right-0 p-4">
                    @if($gallery->title)
                        <p class="text-white font-semibold text-sm mb-2 truncate">{{ $gallery->title }}</p>
                    @endif
                    @if($gallery->category)
                        <span class="inline-block px-2 py-1 bg-white/20 backdrop-blur-sm text-white text-xs rounded-full mb-3">{{ $gallery->category }}</span>
                    @endif
                    <div class="flex gap-2">
                        <a href="{{ route('admin.galleries.edit', $gallery) }}" class="flex-1 text-center px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white text-xs font-semibold rounded-lg transition-colors">
                            Edit
                        </a>
                        <form id="delete-form-{{ $gallery->id }}" action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete('delete-form-{{ $gallery->id }}')" class="w-full px-3 py-2 bg-red-500 hover:bg-red-600 text-white text-xs font-semibold rounded-lg transition-colors">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full bg-white rounded-xl shadow-lg p-12 text-center text-gray-500">
            <svg class="w-20 h-20 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <p class="text-lg font-medium">No images in gallery</p>
            <p class="text-sm mt-1">Upload your first image to get started</p>
        </div>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $galleries->links() }}
    </div>
@endsection
