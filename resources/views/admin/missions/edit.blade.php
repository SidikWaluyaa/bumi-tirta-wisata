@extends('layouts.admin')

@section('content')
    <x-slot name="header">Edit Mission</x-slot>

    <div class="max-w-2xl">
        <div class="bg-white rounded-2xl shadow-lg p-6 lg:p-8">
            <form action="{{ route('admin.missions.update', $mission) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Mission Statement *</label>
                    <textarea name="mission_text" rows="4" required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all resize-none">{{ old('mission_text', $mission->mission_text) }}</textarea>
                    @error('mission_text')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Status</p>
                            <p class="text-xs text-gray-500">Current order: #{{ $mission->order }}</p>
                        </div>
                        <span class="px-4 py-2 text-sm font-semibold rounded-full {{ $mission->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $mission->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.missions.index') }}" class="text-gray-600 hover:text-gray-900 font-medium">
                        ← Back to Missions
                    </a>
                    <button type="submit" class="bg-gradient-to-r from-[#004AAD] to-[#28769A] hover:shadow-xl text-white font-bold py-3 px-8 rounded-lg transition-all transform hover:-translate-y-0.5">
                        💾 Update Mission
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
