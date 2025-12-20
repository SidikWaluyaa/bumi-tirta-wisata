@extends('layouts.admin')

@section('content')
    <x-slot name="header">Edit Gallery Image</x-slot>

    <div class="max-w-2xl">
        <div class="bg-white rounded-2xl shadow-lg p-6 lg:p-8">
            <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Current Image</label>
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $gallery->image) }}" class="w-full max-w-md h-64 object-cover rounded-xl border-2 border-gray-200">
                    </div>
                    <input type="file" name="image" accept="image/*"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-6 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#004AAD] file:text-white hover:file:bg-[#28769A] file:cursor-pointer transition-colors">
                    <p class="text-xs text-gray-500 mt-1">Max 10MB (JPG, PNG, WebP) - Leave empty to keep current image</p>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Title (Optional)</label>
                    <input type="text" name="title" value="{{ $gallery->title }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Category (Optional)</label>
                    <input type="text" name="category" value="{{ $gallery->category }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all">
                </div>

                <div class="flex flex-col sm:flex-row gap-3 pt-4">
                    <a href="{{ route('admin.galleries.index') }}" class="flex-1 text-center px-6 py-3 bg-gray-100 text-gray-700 font-bold rounded-lg hover:bg-gray-200 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="flex-1 bg-gradient-to-r from-[#004AAD] to-[#28769A] hover:shadow-xl text-white font-bold py-3 px-6 rounded-lg transition-all transform hover:-translate-y-0.5">
                        Update Image
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
