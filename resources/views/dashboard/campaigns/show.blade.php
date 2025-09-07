<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Campaign Details') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('campaigns.edit', $campaign) }}"
                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    Edit Campaign
                </a>
                <a href="{{ route('campaigns.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back to Campaigns
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Campaign Header -->
                    <div class="mb-8">
                        <div class="flex justify-between items-start">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $campaign->title }}</h1>
                                <span
                                    class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full 
                                    {{ $campaign->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ ucfirst($campaign->status) }}
                                </span>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-500">Campaign ID</p>
                                <p class="text-lg font-semibold">#{{ $campaign->id }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Progress Section -->
                    <div class="bg-gray-50 rounded-lg p-6 mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Campaign Progress</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="text-center">
                                <p class="text-sm font-medium text-gray-500">Target Amount</p>
                                <p class="text-2xl font-bold text-blue-600">Rp
                                    {{ number_format($campaign->target_amount, 0, ',', '.') }}</p>
                            </div>
                            <div class="text-center">
                                <p class="text-sm font-medium text-gray-500">Collected Amount</p>
                                <p class="text-2xl font-bold text-green-600">Rp
                                    {{ number_format($campaign->collected_amount, 0, ',', '.') }}</p>
                            </div>
                            <div class="text-center">
                                <p class="text-sm font-medium text-gray-500">Progress</p>
                                <p class="text-2xl font-bold text-purple-600">
                                    {{ $campaign->target_amount > 0 ? round(($campaign->collected_amount / $campaign->target_amount) * 100, 1) : 0 }}%
                                </p>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div class="mt-4">
                            <div class="bg-gray-200 rounded-full h-4">
                                <div class="bg-blue-600 h-4 rounded-full transition-all duration-300"
                                    style="width: {{ $campaign->target_amount > 0 ? min(($campaign->collected_amount / $campaign->target_amount) * 100, 100) : 0 }}%">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description Section -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Description</h3>
                        <div class="prose max-w-none">
                            <p class="text-gray-700 whitespace-pre-line">{{ $campaign->description }}</p>
                        </div>
                    </div>

                    <!-- Campaign Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Campaign Information</h3>
                            <dl class="space-y-2">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Created Date</dt>
                                    <dd class="text-sm text-gray-900">
                                        {{ $campaign->created_at->format('F j, Y \a\t g:i A') }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                                    <dd class="text-sm text-gray-900">
                                        {{ $campaign->updated_at->format('F j, Y \a\t g:i A') }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Remaining Amount</dt>
                                    <dd class="text-sm text-gray-900">
                                        Rp
                                        {{ number_format(max(0, $campaign->target_amount - $campaign->collected_amount), 0, ',', '.') }}
                                    </dd>
                                </div>
                            </dl>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Statistics</h3>
                            <dl class="space-y-2">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Total Donations</dt>
                                    <dd class="text-sm text-gray-900">{{ $campaign->donations->count() }} donations
                                    </dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Average Donation</dt>
                                    <dd class="text-sm text-gray-900">
                                        @if ($campaign->donations->count() > 0)
                                            Rp
                                            {{ number_format($campaign->collected_amount / $campaign->donations->count(), 0, ',', '.') }}
                                        @else
                                            Rp 0
                                        @endif
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('campaigns.edit', $campaign) }}"
                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Edit Campaign
                        </a>
                        <form action="{{ route('campaigns.destroy', $campaign) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                onclick="return confirm('Are you sure you want to delete this campaign? This action cannot be undone.')">
                                Delete Campaign
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
