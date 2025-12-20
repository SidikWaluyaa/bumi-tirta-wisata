@extends('layouts.admin')

@section('content')
    <x-slot name="header">Manage Team Members</x-slot>

    <div class="max-w-6xl">
        <!-- Add New Member Button -->
        <div class="mb-6">
            <a href="{{ route('admin.team-members.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white font-bold rounded-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add New Member
            </a>
        </div>

        <!-- Team Members Grid -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-gray-900">Team Members ({{ $members->count() }})</h3>
                    <p class="text-sm text-gray-500">Drag to reorder</p>
                </div>

                @if($members->count() > 0)
                    <div id="members-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($members as $member)
                            <div class="member-item bg-white border-2 border-gray-200 rounded-xl overflow-hidden hover:border-[#004AAD] transition-all cursor-move" data-id="{{ $member->id }}">
                                <!-- Photo -->
                                <div class="relative h-48 bg-gradient-to-br from-[#004AAD] to-[#28769A]">
                                    @if($member->photo)
                                        <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <svg class="w-20 h-20 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                    
                                    <!-- Drag Handle -->
                                    <div class="drag-handle absolute top-2 left-2 p-2 bg-black/30 backdrop-blur-sm rounded-lg cursor-move">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"></path>
                                        </svg>
                                    </div>

                                    <!-- Status Badges -->
                                    <div class="absolute top-2 right-2 flex flex-col space-y-1">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $member->is_active ? 'bg-green-500 text-white' : 'bg-gray-500 text-white' }}">
                                            {{ $member->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                        @if($member->is_certified)
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-500 text-white">
                                                ✓ Certified
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Order Number -->
                                    <div class="absolute bottom-2 left-2">
                                        <span class="px-3 py-1 bg-black/50 backdrop-blur-sm text-white text-xs font-bold rounded-full order-number">
                                            #{{ $member->order }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Info -->
                                <div class="p-4">
                                    <h4 class="font-bold text-gray-900 text-lg mb-1">{{ $member->name }}</h4>
                                    <p class="text-sm text-gray-600 mb-3">{{ $member->role }}</p>
                                    
                                    @if($member->bio)
                                        <p class="text-xs text-gray-500 line-clamp-2 mb-4">{{ $member->bio }}</p>
                                    @endif

                                    <!-- Actions -->
                                    <div class="flex items-center justify-between pt-3 border-t border-gray-200">
                                        <!-- Toggle -->
                                        <button onclick="toggleMember({{ $member->id }})" 
                                            class="p-2 rounded-lg {{ $member->is_active ? 'bg-green-100 text-green-600 hover:bg-green-200' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }} transition-colors"
                                            title="{{ $member->is_active ? 'Deactivate' : 'Activate' }}">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </button>

                                        <div class="flex space-x-2">
                                            <!-- Edit -->
                                            <a href="{{ route('admin.team-members.edit', $member) }}" 
                                                class="p-2 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>

                                            <!-- Delete -->
                                            <form action="{{ route('admin.team-members.destroy', $member) }}" method="POST" class="inline-block" onsubmit="return confirmDelete()">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition-colors">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No team members</h3>
                        <p class="mt-1 text-sm text-gray-500">Get started by adding a new team member.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        const el = document.getElementById('members-list');
        if (el) {
            const sortable = Sortable.create(el, {
                handle: '.drag-handle',
                animation: 150,
                onEnd: function (evt) {
                    const order = [];
                    document.querySelectorAll('.member-item').forEach((item) => {
                        order.push(item.dataset.id);
                    });

                    fetch('{{ route("admin.team-members.reorder") }}', {
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
                            document.querySelectorAll('.member-item').forEach((item, index) => {
                                item.querySelector('.order-number').textContent = '#' + (index + 1);
                            });
                        }
                    });
                }
            });
        }

        function toggleMember(id) {
            fetch(`/admin/team-members/${id}/toggle`, {
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
            return confirm('Are you sure you want to delete this team member?');
        }
    </script>
    @endpush
@endsection
