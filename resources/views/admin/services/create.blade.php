@extends('layouts.admin')

@section('content')
    <x-slot name="header">Add New Service</x-slot>

    <div class="max-w-4xl">
        <div class="bg-white rounded-2xl shadow-lg p-6 lg:p-8">
            <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Service Title *</label>
                    <input type="text" name="title" required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all"
                        placeholder="e.g., Event Management">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Subtitle (Optional)</label>
                    <input type="text" name="subtitle" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all"
                        placeholder="e.g., Corporate-Focused Event Planning & Execution">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Location (Optional)</label>
                        <input type="text" name="location" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all"
                            placeholder="e.g., Daerah Istimewa Yogyakarta">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Rating (Optional)</label>
                        <input type="number" name="rating" step="0.1" min="0" max="5" value="5.0"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all"
                            placeholder="5.0">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Category *</label>
                    <select name="category" required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all">
                        <option value="">Select Category</option>
                        <option value="paket">Package</option>
                        <option value="addon">Add-on</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Price (Optional)</label>
                        <input type="number" name="price" step="0.01" min="0"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all"
                            placeholder="e.g., 500000">
                        <p class="text-xs text-gray-500 mt-1">Leave empty for "Contact for price"</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Price Unit (Optional)</label>
                        <select name="price_unit" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all">
                            <option value="/ Orang">/ Orang</option>
                            <option value="/ Unit">/ Unit</option>
                            <option value="/ Paket">/ Paket</option>
                            <option value="/ Set">/ Set</option>
                            <option value="/ Hari">/ Hari</option>
                            <option value="">Tanpa Unit (Flat Price)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Description (Optional)</label>
                    <textarea name="description" rows="3" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all resize-none"
                        placeholder="Brief description about this service..."></textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Features / Inclusions</label>
                    <div id="features-container" class="space-y-2 mb-2">
                        <div class="flex gap-2 feature-item">
                            <input type="text" name="features[]" 
                                class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all"
                                placeholder="e.g., Corporate Gathering">
                            <button type="button" onclick="removeFeature(this)" class="px-4 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <button type="button" onclick="addFeature()" class="px-4 py-2 bg-green-100 text-green-700 rounded-lg hover:bg-green-200 transition-colors text-sm font-medium">
                        + Add Feature
                    </button>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Service Image</label>
                    <input type="file" name="image" accept="image/*"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-6 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#004AAD] file:text-white hover:file:bg-[#28769A] file:cursor-pointer transition-colors">
                    <p class="text-xs text-gray-500 mt-1">Max 10MB (JPG, PNG, WebP)</p>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 pt-4">
                    <a href="{{ route('admin.services.index') }}" class="flex-1 text-center px-6 py-3 bg-gray-100 text-gray-700 font-bold rounded-lg hover:bg-gray-200 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="flex-1 bg-gradient-to-r from-[#004AAD] to-[#28769A] hover:shadow-xl text-white font-bold py-3 px-6 rounded-lg transition-all transform hover:-translate-y-0.5">
                        Create Service
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function addFeature() {
            const container = document.getElementById('features-container');
            const newItem = document.createElement('div');
            newItem.className = 'flex gap-2 feature-item';
            newItem.innerHTML = `
                <input type="text" name="features[]" 
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all"
                    placeholder="e.g., Corporate Meeting">
                <button type="button" onclick="removeFeature(this)" class="px-4 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            `;
            container.appendChild(newItem);
        }

        function removeFeature(button) {
            const container = document.getElementById('features-container');
            if (container.children.length > 1) {
                button.closest('.feature-item').remove();
            }
        }
    </script>
@endsection
