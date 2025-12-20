@extends('layouts.admin')

@section('content')
    <x-slot name="header">Add New Mission</x-slot>

    <div class="max-w-2xl">
        <div class="bg-white rounded-2xl shadow-lg p-6 lg:p-8">
            <form action="{{ route('admin.missions.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Mission Statement *</label>
                    <textarea name="mission_text" rows="4" required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all resize-none"
                        placeholder="e.g., Mengutamakan keamanan dan keselamatan peserta dalam setiap kegiatan">{{ old('mission_text') }}</textarea>
                    @error('mission_text')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-500 mt-1">Describe one of your company's core missions</p>
                </div>

                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.missions.index') }}" class="text-gray-600 hover:text-gray-900 font-medium">
                        ← Back to Missions
                    </a>
                    <button type="submit" class="bg-gradient-to-r from-[#004AAD] to-[#28769A] hover:shadow-xl text-white font-bold py-3 px-8 rounded-lg transition-all transform hover:-translate-y-0.5">
                        💾 Save Mission
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
