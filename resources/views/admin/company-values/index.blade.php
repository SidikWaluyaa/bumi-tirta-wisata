@extends('layouts.admin')

@section('content')
    <x-slot name="header">Manage Company Values</x-slot>

    <div class="max-w-5xl">
        <!-- Add New Value Button -->
        <div class="mb-6">
            <a href="{{ route('admin.company-values.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white font-bold rounded-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add New Value
            </a>
        </div>

        <!-- Values Grid -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-gray-900">Company Values ({{ $values->count() }})</h3>
                    <p class="text-sm text-gray-500">Drag to reorder</p>
                </div>

                @if($values->count() > 0)
                    <div id="values-list" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($values as $value)
                            <div class="value-item bg-white border-2 border-gray-200 rounded-xl p-5 hover:border-[#004AAD] hover:shadow-lg transition-all cursor-move" data-id="{{ $value->id }}">
                                <!-- Header with Drag Handle and Status -->
                                <div class="flex items-start justify-between mb-4">
                                    <div class="drag-handle cursor-move p-2 hover:bg-gray-100 rounded-lg transition-colors">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"></path>
                                        </svg>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-xs font-bold text-gray-500">#{{ $value->order }}</span>
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $value->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                            {{ $value->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Icon & Content -->
                                <div class="flex items-start space-x-4 mb-4">
                                    <!-- Icon -->
                                    <div class="flex-shrink-0">
                                        <div class="w-14 h-14 bg-gradient-to-br from-[#004AAD] to-[#28769A] rounded-xl flex items-center justify-center shadow-lg">
                                            @if($value->icon)
                                                @php
                                                    // Map icon names to emoji
                                                    $iconMap = [
                                                        'shield-check' => '🛡️',
                                                        'academic-cap' => '🎓',
                                                        'adjustments' => '⚙️',
                                                        'users' => '👥',
                                                        'camera' => '📸',
                                                        'home' => '🏠',
                                                    ];
                                                    $displayIcon = $iconMap[$value->icon] ?? $value->icon;
                                                @endphp
                                                <span class="text-3xl">{{ $displayIcon }}</span>
                                            @else
                                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                                </svg>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Text Content -->
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-bold text-gray-900 text-lg mb-2">{{ $value->title }}</h4>
                                        <p class="text-sm text-gray-600 line-clamp-3">{{ $value->description }}</p>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="flex items-center justify-end space-x-2 pt-4 border-t border-gray-200">
                                    <!-- Toggle -->
                                    <button onclick="toggleValue({{ $value->id }})" 
                                        class="p-2 rounded-lg {{ $value->is_active ? 'bg-green-100 text-green-600 hover:bg-green-200' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }} transition-colors"
                                        title="{{ $value->is_active ? 'Deactivate' : 'Activate' }}">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </button>

                                    <!-- Edit -->
                                    <a href="{{ route('admin.company-values.edit', $value) }}" 
                                        class="p-2 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('admin.company-values.destroy', $value) }}" method="POST" class="inline-block" onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No values</h3>
                        <p class="mt-1 text-sm text-gray-500">Get started by creating a new company value.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        const el = document.getElementById('values-list');
        if (el) {
            const sortable = Sortable.create(el, {
                handle: '.drag-handle',
                animation: 150,
                onEnd: function (evt) {
                    const order = [];
                    document.querySelectorAll('.value-item').forEach((item) => {
                        order.push(item.dataset.id);
                    });

                    fetch('{{ route("admin.company-values.reorder") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ order: order })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.querySelectorAll('.value-item').forEach((item, index) => {
                                item.querySelector('.text-gray-500').textContent = '#' + (index + 1);
                            });
                        }
                    });
                }
            });
        }

        function toggleValue(id) {
            fetch(`/admin/company-values/${id}/toggle`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
        }

        function confirmDelete() {
            return confirm('Are you sure you want to delete this value?');
        }
    </script>
    @endpush
@endsection
