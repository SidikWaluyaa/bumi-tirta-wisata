@extends('layouts.admin')

@section('content')
    <x-slot name="header">Add New Team Member</x-slot>

    <div class="max-w-2xl">
        <div class="bg-white rounded-2xl shadow-lg p-6 lg:p-8">
            <form action="{{ route('admin.team-members.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Name *</label>
                    <input type="text" name="name" value="{{ old('name') }}" required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all"
                        placeholder="e.g., Budi Santoso">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Role/Position *</label>
                    <input type="text" name="role" value="{{ old('role') }}" required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all"
                        placeholder="e.g., Lead Guide & Instruktur Rafting">
                    @error('role')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Bio</label>
                    <textarea name="bio" rows="4" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all resize-none"
                        placeholder="Short biography about this team member...">{{ old('bio') }}</textarea>
                    @error('bio')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Photo</label>
                    <input type="file" name="photo" accept="image/*"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-6 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#004AAD] file:text-white hover:file:bg-[#28769A] file:cursor-pointer transition-colors">
                    @error('photo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-500 mt-1">Max 5MB (JPG, PNG, WebP). Recommended: 400x400px</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-4">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_certified" value="1" {{ old('is_certified') ? 'checked' : '' }}
                            class="w-5 h-5 text-[#004AAD] border-gray-300 rounded focus:ring-[#004AAD]">
                        <span class="ml-3">
                            <span class="text-sm font-semibold text-gray-900">Certified Professional</span>
                            <span class="block text-xs text-gray-500">Check if this member has professional certification</span>
                        </span>
                    </label>
                </div>

                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.team-members.index') }}" class="text-gray-600 hover:text-gray-900 font-medium">
                        ← Back to Team
                    </a>
                    <button type="submit" class="bg-gradient-to-r from-[#004AAD] to-[#28769A] hover:shadow-xl text-white font-bold py-3 px-8 rounded-lg transition-all transform hover:-translate-y-0.5">
                        💾 Save Member
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
