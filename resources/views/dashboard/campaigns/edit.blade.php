<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Campaign') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('campaigns.show', $campaign) }}"
                    class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                    View Campaign
                </a>
                <a href="{{ route('campaigns.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back to Campaigns
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('campaigns.update', $campaign) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-6">
                            <!-- Title -->
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                    Campaign Title *
                                </label>
                                <input type="text" name="title" id="title"
                                    value="{{ old('title', $campaign->title) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror"
                                    placeholder="Enter campaign title" required>
                                @error('title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                    Description *
                                </label>
                                <textarea name="description" id="description" rows="5"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror"
                                    placeholder="Describe your campaign..." required>{{ old('description', $campaign->description) }}</textarea>
                                @error('description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Target Amount -->
                            <div>
                                <label for="target_amount" class="block text-sm font-medium text-gray-700 mb-2">
                                    Target Amount (Rp) *
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">Rp</span>
                                    </div>
                                    <input type="number" name="target_amount" id="target_amount"
                                        value="{{ old('target_amount', $campaign->target_amount) }}" min="1"
                                        step="1000"
                                        class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('target_amount') border-red-500 @enderror"
                                        placeholder="1000000" required>
                                </div>
                                @error('target_amount')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Collected Amount (Read Only) -->
                            <div>
                                <label for="collected_amount" class="block text-sm font-medium text-gray-700 mb-2">
                                    Collected Amount (Rp)
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">Rp</span>
                                    </div>
                                    <input type="number" name="collected_amount" id="collected_amount"
                                        value="{{ $campaign->collected_amount }}"
                                        class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50"
                                        readonly>
                                </div>
                                <p class="mt-1 text-sm text-gray-500">
                                    Progress:
                                    {{ $campaign->target_amount > 0 ? round(($campaign->collected_amount / $campaign->target_amount) * 100, 1) : 0 }}%
                                </p>
                            </div>

                            <!-- Status -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                    Status
                                </label>
                                <select name="status" id="status"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('status') border-red-500 @enderror">
                                    <option value="active"
                                        {{ old('status', $campaign->status) == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="closed"
                                        {{ old('status', $campaign->status) == 'closed' ? 'selected' : '' }}>Closed
                                    </option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Campaign Info -->
                        <div class="mt-6 p-4 bg-gray-50 rounded-md">
                            <h3 class="text-sm font-medium text-gray-900 mb-2">Campaign Information</h3>
                            <div class="grid grid-cols-2 gap-4 text-sm text-gray-600">
                                <div>
                                    <span class="font-medium">Created:</span>
                                    {{ $campaign->created_at->format('M d, Y H:i') }}
                                </div>
                                <div>
                                    <span class="font-medium">Last Updated:</span>
                                    {{ $campaign->updated_at->format('M d, Y H:i') }}
                                </div>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="flex items-center justify-end space-x-3 mt-8">
                            <a href="{{ route('campaigns.show', $campaign) }}"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                Cancel
                            </a>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update Campaign
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
