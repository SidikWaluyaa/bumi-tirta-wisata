@extends('layouts.admin')

@section('content')
    <x-slot name="header">General Settings</x-slot>

    <div class="max-w-4xl">
        <div class="bg-white rounded-2xl shadow-lg p-6 lg:p-8">
            <div class="flex items-center mb-6">
                <div class="bg-[#004AAD] p-3 rounded-xl mr-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Website Configuration</h2>
                    <p class="text-sm text-gray-500">Manage your website settings</p>
                </div>
            </div>

            <form action="{{ route('admin.settings.update_all') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                
                @foreach($settings as $setting)
                <div class="border-b border-gray-100 pb-6 last:border-0">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        {{ $setting->label ?? ucfirst(str_replace('_', ' ', $setting->key)) }}
                    </label>
                    
                    @if($setting->type === 'textarea')
                        <textarea 
                            name="{{ $setting->key }}" 
                            rows="4" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all resize-none"
                            placeholder="Enter {{ $setting->label }}"
                        >{{ $setting->value }}</textarea>
                    @elseif($setting->type === 'image')
                        @if($setting->value)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $setting->value) }}" class="h-24 w-24 object-cover rounded-lg border-2 border-gray-200">
                            </div>
                        @endif
                        <input 
                            type="file" 
                            name="{{ $setting->key }}" 
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-6 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#004AAD] file:text-white hover:file:bg-[#28769A] file:cursor-pointer transition-colors"
                        >
                        <p class="text-xs text-gray-500 mt-1">Max 10MB (JPG, PNG, WebP)</p>
                    @else
                        <input 
                            type="text" 
                            name="{{ $setting->key }}" 
                            value="{{ $setting->value }}" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all"
                            placeholder="Enter {{ $setting->label }}"
                        >
                    @endif
                </div>
                @endforeach

                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4">
                    <p class="text-sm text-gray-500">Changes will be reflected immediately on the website</p>
                    <button type="submit" class="w-full sm:w-auto bg-gradient-to-r from-[#004AAD] to-[#28769A] hover:shadow-xl text-white font-bold py-3 px-8 rounded-lg transition-all transform hover:-translate-y-0.5">
                        Save All Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
