<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Payment Details') }}
            </h2>
            <a href="{{ route('dashboard.payments.index') }}"
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Back to Payments
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Payment Details Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-white">Payment Details</h1>
                            <p class="text-blue-100 mt-1">Payment ID: #{{ $payment->id }}</p>
                        </div>
                        <div class="text-right">
                            @php
                                $statusClass = match ($payment->status) {
                                    'paid' => 'bg-green-100 text-green-800',
                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                    'failed' => 'bg-red-100 text-red-800',
                                    default => 'bg-gray-100 text-gray-800',
                                };
                            @endphp
                            <span class="inline-flex px-3 py-1 rounded-full text-sm font-medium {{ $statusClass }}">
                                {{ ucfirst($payment->status) }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <!-- Payment Info -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-gray-900">Payment Information</h3>

                            <div class="space-y-3">
                                <div class="flex justify-between py-2 border-b border-gray-100">
                                    <span class="text-gray-600">Amount:</span>
                                    <span class="font-semibold text-lg text-green-600">
                                        Rp {{ number_format($payment->amount, 0, ',', '.') }}
                                    </span>
                                </div>

                                <div class="flex justify-between py-2 border-b border-gray-100">
                                    <span class="text-gray-600">Payment Method:</span>
                                    <span class="font-medium text-gray-900">
                                        {{ $payment->payment_method ?? 'Midtrans' }}
                                    </span>
                                </div>

                                <div class="flex justify-between py-2 border-b border-gray-100">
                                    <span class="text-gray-600">Transaction ID:</span>
                                    <span class="font-medium text-gray-900 text-sm">
                                        {{ $payment->transaction_id ?? '-' }}
                                    </span>
                                </div>

                                <div class="flex justify-between py-2 border-b border-gray-100">
                                    <span class="text-gray-600">Created:</span>
                                    <span class="font-medium text-gray-900">
                                        {{ $payment->created_at->format('d M Y, H:i') }}
                                    </span>
                                </div>

                                @if ($payment->updated_at != $payment->created_at)
                                    <div class="flex justify-between py-2 border-b border-gray-100">
                                        <span class="text-gray-600">Last Updated:</span>
                                        <span class="font-medium text-gray-900">
                                            {{ $payment->updated_at->format('d M Y, H:i') }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-gray-900">Donation Information</h3>

                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="space-y-3">
                                    <div>
                                        <span class="text-sm text-gray-600">Campaign:</span>
                                        <p class="font-semibold text-gray-900">
                                            {{ $payment->donation->campaign->title }}</p>
                                    </div>

                                    <div>
                                        <span class="text-sm text-gray-600">Description:</span>
                                        <p class="text-gray-700 text-sm">
                                            {{ Str::limit($payment->donation->campaign->description, 150) }}
                                        </p>
                                    </div>

                                    <div class="flex justify-between">
                                        <span class="text-sm text-gray-600">Campaign Status:</span>
                                        <span
                                            class="text-sm font-medium {{ $payment->donation->campaign->status === 'active' ? 'text-green-600' : 'text-red-600' }}">
                                            {{ ucfirst($payment->donation->campaign->status) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Donor Information -->
                    <div class="border-t pt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Donor Information</h3>

                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center">
                                    <span class="text-white font-semibold text-lg">
                                        {{ strtoupper(substr($payment->donation->user->name, 0, 1)) }}
                                    </span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">{{ $payment->donation->user->name }}</p>
                                    <p class="text-gray-600 text-sm">{{ $payment->donation->user->email }}</p>
                                    <p class="text-gray-500 text-xs">
                                        Member since {{ $payment->donation->user->created_at->format('M Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Campaign Progress -->
                    <div class="border-t pt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Campaign Progress</h3>

                        @php
                            $campaign = $payment->donation->campaign;
                            $progress =
                                $campaign->target_amount > 0
                                    ? ($campaign->collected_amount / $campaign->target_amount) * 100
                                    : 0;
                        @endphp

                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-green-600">
                                        Rp {{ number_format($campaign->collected_amount, 0, ',', '.') }}
                                    </div>
                                    <div class="text-sm text-gray-600">Collected</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-blue-600">
                                        Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}
                                    </div>
                                    <div class="text-sm text-gray-600">Target</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-purple-600">
                                        {{ $campaign->donations_count ?? 0 }}
                                    </div>
                                    <div class="text-sm text-gray-600">Donors</div>
                                </div>
                            </div>

                            <div class="mb-2">
                                <div class="flex justify-between text-sm text-gray-600 mb-1">
                                    <span>Progress</span>
                                    <span>{{ round($progress, 1) }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-3">
                                    <div class="bg-gradient-to-r from-blue-500 to-green-500 h-3 rounded-full transition-all duration-500"
                                        style="width: {{ min($progress, 100) }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="border-t pt-6">
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('home.campaigns.show', $payment->donation->campaign) }}"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center">
                                View Campaign
                            </a>

                            @if ($payment->status === 'pending')
                                <button
                                    class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                    Retry Payment
                                </button>
                            @endif

                            <button onclick="window.print()"
                                class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Print Receipt
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
