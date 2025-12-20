@extends('layouts.admin')

@section('header', 'Manage Certifications')

@section('content')
<div class="max-w-7xl">
    <!-- Tab Navigation -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.certifications.index', ['type' => 'company']) }}" 
               class="px-6 py-3 rounded-xl font-semibold transition-all {{ $type === 'company' ? 'bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white shadow-lg' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                🏢 Company Certifications
            </a>
            <a href="{{ route('admin.certifications.index', ['type' => 'guide']) }}" 
               class="px-6 py-3 rounded-xl font-semibold transition-all {{ $type === 'guide' ? 'bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white shadow-lg' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                🧭 Guide Certifications
            </a>
            <a href="{{ route('admin.certifications.index', ['type' => 'instructor']) }}" 
               class="px-6 py-3 rounded-xl font-semibold transition-all {{ $type === 'instructor' ? 'bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white shadow-lg' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                👨‍🏫 Instructor Certifications
            </a>
        </div>
    </div>

    <!-- Header Actions -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            @if($type === 'company') Company 
            @elseif($type === 'guide') Guide 
            @else Instructor 
            @endif Certifications
        </h2>
        <a href="{{ route('admin.certifications.create', ['type' => $type]) }}" 
           class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white font-bold rounded-xl hover:shadow-xl transform hover:scale-105 transition-all">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add Certification
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-r-xl">
            <p class="text-green-700 font-semibold">{{ session('success') }}</p>
        </div>
    @endif

    <!-- Certifications Grid -->
    @if($certifications->count() > 0)
        <div id="certifications-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($certifications as $certification)
                <div class="certification-item bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all border-2 border-gray-100" 
                     data-id="{{ $certification->id }}">
                    <!-- Drag Handle -->
                    <div class="drag-handle bg-gradient-to-r from-[#004AAD] to-[#28769A] p-2 cursor-move flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"></path>
                        </svg>
                    </div>

                    <!-- Certificate Image -->
                    <div class="relative h-48 bg-gray-100">
                        @if($certification->certificate_image)
                            @if(str_ends_with($certification->certificate_image, '.pdf'))
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-red-50 to-red-100">
                                    <svg class="w-20 h-20 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @else
                                <img src="{{ asset('storage/' . $certification->certificate_image) }}" 
                                     alt="{{ $certification->title }}" 
                                     class="w-full h-full object-cover">
                            @endif
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        @endif

                        <!-- Status Badge -->
                        <div class="absolute top-3 right-3">
                            <span class="px-3 py-1 rounded-full text-xs font-bold {{ $certification->is_active ? 'bg-green-500 text-white' : 'bg-gray-500 text-white' }}">
                                {{ $certification->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-1">{{ $certification->title }}</h3>
                        
                        @if($certification->issued_by)
                            <p class="text-sm text-gray-600 mb-2">
                                <span class="font-semibold">Issued by:</span> {{ $certification->issued_by }}
                            </p>
                        @endif

                        @if($certification->teamMember)
                            <p class="text-sm text-blue-600 mb-2">
                                👤 {{ $certification->teamMember->name }}
                            </p>
                        @endif

                        @if($certification->issued_date)
                            <p class="text-xs text-gray-500">
                                📅 {{ $certification->issued_date->format('M d, Y') }}
                                @if($certification->expiry_date)
                                    - {{ $certification->expiry_date->format('M d, Y') }}
                                @endif
                            </p>
                        @endif

                        <!-- Actions -->
                        <div class="flex gap-2 mt-4">
                            <!-- Toggle Active -->
                            <button onclick="toggleActive({{ $certification->id }})" 
                                    class="flex-1 px-4 py-2 rounded-lg font-semibold transition-all {{ $certification->is_active ? 'bg-yellow-100 text-yellow-700 hover:bg-yellow-200' : 'bg-green-100 text-green-700 hover:bg-green-200' }}">
                                {{ $certification->is_active ? 'Deactivate' : 'Activate' }}
                            </button>

                            <!-- Edit -->
                            <a href="{{ route('admin.certifications.edit', $certification) }}" 
                               class="px-4 py-2 bg-blue-100 text-blue-700 rounded-lg font-semibold hover:bg-blue-200 transition-all">
                                Edit
                            </a>

                            <!-- Delete -->
                            <form action="{{ route('admin.certifications.destroy', $certification) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Are you sure you want to delete this certification?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="px-4 py-2 bg-red-100 text-red-700 rounded-lg font-semibold hover:bg-red-200 transition-all">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Empty State -->
        <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
            <div class="w-24 h-24 bg-gradient-to-br from-[#BDDADB] to-[#28769A] rounded-full mx-auto mb-6 flex items-center justify-center">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-3">No Certifications Yet</h3>
            <p class="text-gray-600 mb-6">Start by adding your first {{ $type }} certification</p>
            <a href="{{ route('admin.certifications.create', ['type' => $type]) }}" 
               class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white font-bold rounded-xl hover:shadow-xl transform hover:scale-105 transition-all">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add First Certification
            </a>
        </div>
    @endif
</div>

<!-- SortableJS for Drag & Drop -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    // Initialize Sortable
    const el = document.getElementById('certifications-list');
    if (el) {
        const sortable = Sortable.create(el, {
            handle: '.drag-handle',
            animation: 150,
            onEnd: function (evt) {
                const order = [];
                document.querySelectorAll('.certification-item').forEach((item) => {
                    order.push(item.dataset.id);
                });

                // Send AJAX request to update order
                fetch('{{ route("admin.certifications.reorder") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ order: order })
                });
            }
        });
    }

    // Toggle Active Status
    function toggleActive(id) {
        fetch(`/admin/certifications/${id}/toggle`, {
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
</script>
@endsection
