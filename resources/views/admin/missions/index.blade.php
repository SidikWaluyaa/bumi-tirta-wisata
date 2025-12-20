@extends('layouts.admin')

@section('content')
    <x-slot name="header">Manage Company Missions</x-slot>

    <div class="max-w-4xl">
        <!-- Add New Mission Button -->
        <div class="mb-6">
            <a href="{{ route('admin.missions.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white font-bold rounded-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add New Mission
            </a>
        </div>

        <!-- Missions List -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-gray-900">Company Missions ({{ $missions->count() }})</h3>
                    <p class="text-sm text-gray-500">Drag to reorder</p>
                </div>

                @if($missions->count() > 0)
                    <div id="missions-list" class="space-y-3">
                        @foreach($missions as $mission)
                            <div class="mission-item bg-gray-50 border-2 border-gray-200 rounded-xl p-4 hover:border-[#004AAD] transition-all cursor-move" data-id="{{ $mission->id }}">
                                <div class="flex items-start justify-between">
                                    <!-- Drag Handle & Content -->
                                    <div class="flex items-start flex-1">
                                        <div class="drag-handle mr-4 mt-1 cursor-move">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center mb-2">
                                                <span class="text-sm font-bold text-gray-500 mr-3">#{{ $mission->order }}</span>
                                                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $mission->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                                    {{ $mission->is_active ? 'Active' : 'Inactive' }}
                                                </span>
                                            </div>
                                            <p class="text-gray-900">{{ $mission->mission_text }}</p>
                                        </div>
                                    </div>

                                    <!-- Actions -->
                                    <div class="flex items-center space-x-2 ml-4">
                                        <!-- Toggle Active -->
                                        <button onclick="toggleMission({{ $mission->id }})" 
                                            class="p-2 rounded-lg {{ $mission->is_active ? 'bg-green-100 text-green-600 hover:bg-green-200' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }} transition-colors"
                                            title="{{ $mission->is_active ? 'Deactivate' : 'Activate' }}">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </button>

                                        <!-- Edit -->
                                        <a href="{{ route('admin.missions.edit', $mission) }}" 
                                            class="p-2 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('admin.missions.destroy', $mission) }}" method="POST" class="inline-block" onsubmit="return confirmDelete()">
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
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No missions</h3>
                        <p class="mt-1 text-sm text-gray-500">Get started by creating a new mission.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        // Initialize Sortable for drag & drop
        const el = document.getElementById('missions-list');
        if (el) {
            const sortable = Sortable.create(el, {
                handle: '.drag-handle',
                animation: 150,
                onEnd: function (evt) {
                    const order = [];
                    document.querySelectorAll('.mission-item').forEach((item, index) => {
                        order.push(item.dataset.id);
                    });

                    // Send AJAX request to update order
                    fetch('{{ route("admin.missions.reorder") }}', {
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
                            // Update order numbers
                            document.querySelectorAll('.mission-item').forEach((item, index) => {
                                item.querySelector('.text-gray-500').textContent = '#' + (index + 1);
                            });
                        }
                    });
                }
            });
        }

        // Toggle mission active status
        function toggleMission(id) {
            fetch(`/admin/missions/${id}/toggle`, {
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

        // Confirm delete
        function confirmDelete() {
            return confirm('Are you sure you want to delete this mission?');
        }
    </script>
    @endpush
@endsection
