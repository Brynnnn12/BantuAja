<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Donation') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('donations.show', $donation) }}"
                    class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                    View Donation
                </a>
                <a href="{{ route('donations.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back to Donations
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('donations.update', $donation) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-6">
                            <!-- User Selection (Read Only) -->
                            <div>
                                <label for="user_id" class="block text-sm font-medium text-gray-700 mb-2">
                                    Donor
                                </label>
                                <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                                    {{ $donation->user->name }} ({{ $donation->user->email }})
                                </div>
                                <input type="hidden" name="user_id" value="{{ $donation->user_id }}">
                                <p class="mt-1 text-sm text-gray-500">Donor cannot be changed after donation is created
                                </p>
                            </div>

                            <!-- Campaign Selection (Read Only) -->
                            <div>
                                <label for="campaign_id" class="block text-sm font-medium text-gray-700 mb-2">
                                    Campaign
                                </label>
                                <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                                    {{ $donation->campaign->title }}
                                </div>
                                <input type="hidden" name="campaign_id" value="{{ $donation->campaign_id }}">
                                <p class="mt-1 text-sm text-gray-500">Campaign cannot be changed after donation is
                                    created</p>
                            </div>

                            <!-- Amount -->
                            <div>
                                <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">
                                    Donation Amount (Rp) *
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">Rp</span>
                                    </div>
                                    <input type="number" name="amount" id="amount"
                                        value="{{ old('amount', $donation->amount) }}" min="1000" step="1000"
                                        class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('amount') border-red-500 @enderror"
                                        placeholder="50000" required>
                                </div>
                                <p class="mt-1 text-sm text-gray-500">Minimum donation amount is Rp 1,000</p>
                                @error('amount')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                    Status *
                                </label>
                                <select name="status" id="status"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('status') border-red-500 @enderror">
                                    <option value="pending"
                                        {{ old('status', $donation->status) == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="confirmed"
                                        {{ old('status', $donation->status) == 'confirmed' ? 'selected' : '' }}>
                                        Confirmed</option>
                                    <option value="failed"
                                        {{ old('status', $donation->status) == 'failed' ? 'selected' : '' }}>Failed
                                    </option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Donation Info -->
                        <div class="mt-6 p-4 bg-gray-50 rounded-md">
                            <h3 class="text-sm font-medium text-gray-900 mb-2">Donation Information</h3>
                            <div class="grid grid-cols-2 gap-4 text-sm text-gray-600">
                                <div>
                                    <span class="font-medium">Created:</span>
                                    {{ $donation->created_at->format('M d, Y H:i') }}
                                </div>
                                <div>
                                    <span class="font-medium">Last Updated:</span>
                                    {{ $donation->updated_at->format('M d, Y H:i') }}
                                </div>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="flex items-center justify-end space-x-3 mt-8">
                            <a href="{{ route('donations.show', $donation) }}"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                Cancel
                            </a>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update Donation
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
