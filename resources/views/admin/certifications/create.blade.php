@extends('layouts.admin')

@section('header', 'Add New Certification')

@section('content')
<div class="max-w-3xl">
    <div class="bg-white rounded-2xl shadow-lg p-8">
        <form action="{{ route('admin.certifications.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Type Selection -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-3">Certification Type *</label>
                <div class="grid grid-cols-3 gap-4">
                    <label class="relative cursor-pointer">
                        <input type="radio" name="type" value="company" 
                               {{ old('type', request('type')) === 'company' ? 'checked' : '' }}
                               class="peer sr-only" required>
                        <div class="p-4 border-2 border-gray-200 rounded-xl text-center peer-checked:border-[#004AAD] peer-checked:bg-blue-50 transition-all">
                            <div class="text-3xl mb-2">🏢</div>
                            <div class="font-semibold text-gray-700 peer-checked:text-[#004AAD]">Company</div>
                        </div>
                    </label>
                    <label class="relative cursor-pointer">
                        <input type="radio" name="type" value="guide" 
                               {{ old('type', request('type')) === 'guide' ? 'checked' : '' }}
                               class="peer sr-only">
                        <div class="p-4 border-2 border-gray-200 rounded-xl text-center peer-checked:border-[#004AAD] peer-checked:bg-blue-50 transition-all">
                            <div class="text-3xl mb-2">🧭</div>
                            <div class="font-semibold text-gray-700 peer-checked:text-[#004AAD]">Guide</div>
                        </div>
                    </label>
                    <label class="relative cursor-pointer">
                        <input type="radio" name="type" value="instructor" 
                               {{ old('type', request('type')) === 'instructor' ? 'checked' : '' }}
                               class="peer sr-only">
                        <div class="p-4 border-2 border-gray-200 rounded-xl text-center peer-checked:border-[#004AAD] peer-checked:bg-blue-50 transition-all">
                            <div class="text-3xl mb-2">👨‍🏫</div>
                            <div class="font-semibold text-gray-700 peer-checked:text-[#004AAD]">Instructor</div>
                        </div>
                    </label>
                </div>
                @error('type')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Team Member (for Guide/Instructor) -->
            <div id="team-member-field" style="display: none;">
                <label class="block text-sm font-bold text-gray-700 mb-2">Team Member</label>
                <select name="team_member_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent">
                    <option value="">Select Team Member (Optional)</option>
                    @foreach($teamMembers as $member)
                        <option value="{{ $member->id }}" {{ old('team_member_id') == $member->id ? 'selected' : '' }}>
                            {{ $member->name }} - {{ $member->role }}
                        </option>
                    @endforeach
                </select>
                @error('team_member_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Title -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Certification Title *</label>
                <input type="text" name="title" value="{{ old('title') }}" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent"
                       placeholder="e.g., Wilderness First Responder">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Description</label>
                <textarea name="description" rows="4"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent resize-none"
                          placeholder="Brief description of the certification">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Certificate Image -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Certificate Image/PDF *</label>
                <input type="file" name="certificate_image" accept="image/*,.pdf" required
                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-6 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#004AAD] file:text-white hover:file:bg-[#28769A] file:cursor-pointer transition-colors">
                <p class="text-xs text-gray-500 mt-1">Max 10MB (JPG, PNG, PDF)</p>
                @error('certificate_image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Issued By -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Issued By</label>
                <input type="text" name="issued_by" value="{{ old('issued_by') }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent"
                       placeholder="e.g., National Outdoor Leadership School">
                @error('issued_by')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Dates -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Issued Date</label>
                    <input type="date" name="issued_date" value="{{ old('issued_date') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent">
                    @error('issued_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Expiry Date</label>
                    <input type="date" name="expiry_date" value="{{ old('expiry_date') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent">
                    @error('expiry_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Actions -->
            <div class="flex gap-4 pt-4">
                <button type="submit" 
                        class="flex-1 px-6 py-3 bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white font-bold rounded-xl hover:shadow-xl transform hover:scale-105 transition-all">
                    Create Certification
                </button>
                <a href="{{ route('admin.certifications.index', ['type' => old('type', request('type', 'company'))]) }}" 
                   class="px-6 py-3 bg-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-300 transition-all">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    // Show/hide team member field based on type selection
    document.querySelectorAll('input[name="type"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const teamMemberField = document.getElementById('team-member-field');
            if (this.value === 'guide' || this.value === 'instructor') {
                teamMemberField.style.display = 'block';
            } else {
                teamMemberField.style.display = 'none';
            }
        });
    });

    // Trigger on page load
    const checkedType = document.querySelector('input[name="type"]:checked');
    if (checkedType && (checkedType.value === 'guide' || checkedType.value === 'instructor')) {
        document.getElementById('team-member-field').style.display = 'block';
    }
</script>
@endsection
