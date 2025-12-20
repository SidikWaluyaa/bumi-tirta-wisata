@extends('layouts.admin')

@section('content')
    <x-slot name="header">Edit Company Value</x-slot>

    <div class="max-w-2xl">
        <div class="bg-white rounded-2xl shadow-lg p-6 lg:p-8">
            <form action="{{ route('admin.company-values.update', $companyValue) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Icon (Emoji or Text)</label>
                    <input type="text" name="icon" value="{{ old('icon', $companyValue->icon) }}" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all"
                        placeholder="e.g., 🛡️ or shield-check">
                    @error('icon')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Title *</label>
                    <input type="text" name="title" value="{{ old('title', $companyValue->title) }}" required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Description *</label>
                    <textarea name="description" rows="4" required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all resize-none">{{ old('description', $companyValue->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Status</p>
                            <p class="text-xs text-gray-500">Current order: #{{ $companyValue->order }}</p>
                        </div>
                        <span class="px-4 py-2 text-sm font-semibold rounded-full {{ $companyValue->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $companyValue->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.company-values.index') }}" class="text-gray-600 hover:text-gray-900 font-medium">
                        ← Back to Values
                    </a>
                    <button type="submit" class="bg-gradient-to-r from-[#004AAD] to-[#28769A] hover:shadow-xl text-white font-bold py-3 px-8 rounded-lg transition-all transform hover:-translate-y-0.5">
                        💾 Update Value
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
