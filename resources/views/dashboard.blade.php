<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-8 text-white">
                    <h1 class="text-3xl font-bold mb-2">Welcome back, {{ auth()->user()->name }}!</h1>
                    <p class="text-blue-100">Here's your donation activity overview</p>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <!-- Total Donations -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <div class="text-2xl font-bold text-gray-900">{{ auth()->user()->donations()->count() }}
                                </div>
                                <div class="text-sm text-gray-600">Total Donations</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Amount -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <div class="text-2xl font-bold text-gray-900">
                                    Rp
                                    {{ number_format(auth()->user()->donations()->where('status', 'confirmed')->sum('amount'), 0, ',', '.') }}
                                </div>
                                <div class="text-sm text-gray-600">Total Contributed</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Campaigns -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <div class="text-2xl font-bold text-gray-900">
                                    {{ auth()->user()->donations()->whereHas('campaign', function ($q) {$q->where('status', 'active');})->distinct('campaign_id')->count() }}
                                </div>
                                <div class="text-sm text-gray-600">Supported Campaigns</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- This Month -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m0 0V7a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V9a2 2 0 012-2m0 0h8m-8 0V3a2 2 0 012-2h4a2 2 0 012 2v4">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <div class="text-2xl font-bold text-gray-900">
                                    Rp
                                    {{ number_format(auth()->user()->donations()->where('status', 'confirmed')->whereMonth('created_at', date('m'))->sum('amount'), 0, ',', '.') }}
                                </div>
                                <div class="text-sm text-gray-600">This Month</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Donations -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-gray-50 px-6 py-4 border-b">
                        <h3 class="text-lg font-semibold text-gray-900">Recent Donations</h3>
                    </div>
                    <div class="p-6">
                        @php
                            $recentDonations = auth()->user()->donations()->with('campaign')->latest()->limit(5)->get();
                        @endphp

                        @forelse($recentDonations as $donation)
                            <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-0">
                                <div class="flex-1">
                                    <h4 class="font-medium text-gray-900">
                                        {{ Str::limit($donation->campaign->title, 40) }}</h4>
                                    <p class="text-sm text-gray-500">{{ $donation->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="text-right">
                                    <div class="font-semibold text-green-600">
                                        Rp {{ number_format($donation->amount, 0, ',', '.') }}
                                    </div>
                                    <span
                                        class="text-xs px-2 py-1 rounded-full 
                                        {{ $donation->status === 'confirmed' ? 'bg-green-100 text-green-800' : ($donation->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                        {{ ucfirst($donation->status) }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                    </path>
                                </svg>
                                <p class="text-gray-500">No donations yet</p>
                                <a href="{{ route('home.campaigns.index') }}"
                                    class="text-blue-600 hover:text-blue-800 font-medium">Start donating</a>
                            </div>
                        @endforelse

                        @if ($recentDonations->count() > 0)
                            <div class="mt-4 pt-4 border-t">
                                <a href="{{ route('home.donations.index') }}"
                                    class="text-blue-600 hover:text-blue-800 font-medium">
                                    View all donations →
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-gray-50 px-6 py-4 border-b">
                        <h3 class="text-lg font-semibold text-gray-900">Quick Actions</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <a href="{{ route('home.campaigns.index') }}"
                            class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">
                            <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-gray-900">Browse Campaigns</h4>
                                <p class="text-sm text-gray-600">Find campaigns to support</p>
                            </div>
                        </a>

                        <a href="{{ route('payments.index') }}"
                            class="flex items-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-colors">
                            <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-gray-900">View Payments</h4>
                                <p class="text-sm text-gray-600">Check payment history</p>
                            </div>
                        </a>

                        <a href="{{ route('home.about') }}"
                            class="flex items-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors">
                            <div class="w-10 h-10 bg-purple-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-gray-900">About BantuAja</h4>
                                <p class="text-sm text-gray-600">Learn more about our mission</p>
                            </div>
                        </a>

                        <a href="{{ route('home.contact') }}"
                            class="flex items-center p-4 bg-orange-50 rounded-lg hover:bg-orange-100 transition-colors">
                            <div class="w-10 h-10 bg-orange-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-gray-900">Contact Support</h4>
                                <p class="text-sm text-gray-600">Get help when you need it</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
