<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Donation Details') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('donations.edit', $donation) }}"
                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    Edit Donation
                </a>
                <a href="{{ route('donations.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back to Donations
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Donation Header -->
                    <div class="mb-8">
                        <div class="flex justify-between items-start">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900 mb-2">Donation #{{ $donation->id }}</h1>
                                <span
                                    class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full 
                                    @if ($donation->status === 'confirmed') bg-green-100 text-green-800 
                                    @elseif($donation->status === 'pending') bg-yellow-100 text-yellow-800 
                                    @else bg-red-100 text-red-800 @endif">
                                    {{ ucfirst($donation->status) }}
                                </span>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-500">Donation Amount</p>
                                <p class="text-2xl font-bold text-blue-600">Rp
                                    {{ number_format($donation->amount, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Donor and Campaign Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                        <!-- Donor Information -->
                        <div class="bg-gray-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Donor Information</h3>
                            <dl class="space-y-3">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Name</dt>
                                    <dd class="text-sm text-gray-900 font-medium">{{ $donation->user->name }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                                    <dd class="text-sm text-gray-900">{{ $donation->user->email }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Joined</dt>
                                    <dd class="text-sm text-gray-900">
                                        {{ $donation->user->created_at->format('F j, Y') }}</dd>
                                </div>
                            </dl>
                        </div>

                        <!-- Campaign Information -->
                        <div class="bg-blue-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Campaign Information</h3>
                            <dl class="space-y-3">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Campaign Title</dt>
                                    <dd class="text-sm text-gray-900 font-medium">{{ $donation->campaign->title }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Target Amount</dt>
                                    <dd class="text-sm text-gray-900">Rp
                                        {{ number_format($donation->campaign->target_amount, 0, ',', '.') }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Collected Amount</dt>
                                    <dd class="text-sm text-gray-900">Rp
                                        {{ number_format($donation->campaign->collected_amount, 0, ',', '.') }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Campaign Status</dt>
                                    <dd class="text-sm">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $donation->campaign->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ ucfirst($donation->campaign->status) }}
                                        </span>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <!-- Donation Impact -->
                    <div class="bg-green-50 rounded-lg p-6 mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Donation Impact</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="text-center">
                                <p class="text-sm font-medium text-gray-500">Contribution Percentage</p>
                                <p class="text-2xl font-bold text-green-600">
                                    {{ $donation->campaign->target_amount > 0 ? round(($donation->amount / $donation->campaign->target_amount) * 100, 2) : 0 }}%
                                </p>
                                <p class="text-xs text-gray-500">of campaign target</p>
                            </div>
                            <div class="text-center">
                                <p class="text-sm font-medium text-gray-500">Campaign Progress</p>
                                <p class="text-2xl font-bold text-blue-600">
                                    {{ $donation->campaign->target_amount > 0 ? round(($donation->campaign->collected_amount / $donation->campaign->target_amount) * 100, 1) : 0 }}%
                                </p>
                                <p class="text-xs text-gray-500">total progress</p>
                            </div>
                            <div class="text-center">
                                <p class="text-sm font-medium text-gray-500">Remaining to Goal</p>
                                <p class="text-lg font-bold text-purple-600">
                                    Rp
                                    {{ number_format(max(0, $donation->campaign->target_amount - $donation->campaign->collected_amount), 0, ',', '.') }}
                                </p>
                                <p class="text-xs text-gray-500">still needed</p>
                            </div>
                        </div>
                    </div>

                    <!-- Campaign Description -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Campaign Description</h3>
                        <div class="prose max-w-none">
                            <p class="text-gray-700 whitespace-pre-line">{{ $donation->campaign->description }}</p>
                        </div>
                    </div>

                    <!-- Donation Timeline -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Timeline</h3>
                        <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Donation Created</dt>
                                <dd class="text-sm text-gray-900">
                                    {{ $donation->created_at->format('F j, Y \a\t g:i A') }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                                <dd class="text-sm text-gray-900">
                                    {{ $donation->updated_at->format('F j, Y \a\t g:i A') }}</dd>
                            </div>
                        </dl>
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('campaigns.show', $donation->campaign) }}"
                            class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                            View Campaign
                        </a>
                        <a href="{{ route('donations.edit', $donation) }}"
                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Edit Donation
                        </a>
                        <form action="{{ route('donations.destroy', $donation) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                onclick="return confirm('Are you sure you want to delete this donation? This action cannot be undone.')">
                                Delete Donation
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
