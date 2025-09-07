<x-layouts.home :title="'Donasi Saya - ' . config('app.name', 'BantuAja')" :breadcrumb="'<div class=\'flex items-center space-x-2 text-sm text-gray-600\'><a href=\'' .
    route('home.index') .
    '\' class=\'hover:text-blue-600\'>Beranda</a><svg class=\'w-4 h-4\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M9 5l7 7-7 7\'></path></svg><span class=\'text-gray-900 font-medium\'>Donasi Saya</span></div>'">
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Riwayat Donasi Anda</h1>
                <p class="text-xl text-gray-600">Pantau kontribusi dan dampak donasi yang telah Anda berikan</p>
            </div>

            @auth
                @php
                    $userDonations = auth()->user()->donations()->with('campaign')->latest()->get();
                    $totalDonations = $userDonations->count();
                    $totalAmount = $userDonations->where('status', 'confirmed')->sum('amount');
                    $supportedCampaigns = $userDonations->unique('campaign_id')->count();
                @endphp

                <!-- Donation Stats -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                    <div class="bg-white rounded-xl shadow-lg p-8 text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                </path>
                            </svg>
                        </div>
                        <div class="text-3xl font-bold text-blue-600 mb-2">{{ $totalDonations }}</div>
                        <div class="text-gray-600">Total Donasi</div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-8 text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-3xl font-bold text-green-600 mb-2">Rp
                            {{ number_format($totalAmount, 0, ',', '.') }}</div>
                        <div class="text-gray-600">Total Kontribusi</div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-8 text-center">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
                            </svg>
                        </div>
                        <div class="text-3xl font-bold text-purple-600 mb-2">{{ $supportedCampaigns }}</div>
                        <div class="text-gray-600">Kampanye Didukung</div>
                    </div>
                </div>

                <!-- Donation History -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Riwayat Donasi</h2>
                    </div>

                    <div class="p-8">
                        @if ($userDonations->count() > 0)
                            <div class="space-y-6">
                                @foreach ($userDonations->take(10) as $donation)
                                    <div class="border-b border-gray-200 pb-6 last:border-0">
                                        <div class="flex items-start justify-between">
                                            <div class="flex-1">
                                                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                                    {{ $donation->campaign->title }}
                                                </h3>
                                                <p class="text-gray-600 mb-3">
                                                    {{ Str::limit($donation->campaign->description, 100) }}
                                                </p>
                                                @if ($donation->message)
                                                    <p class="text-sm text-blue-600 mb-3 italic">
                                                        "{{ $donation->message }}"
                                                    </p>
                                                @endif
                                                <div class="flex items-center space-x-4 text-sm text-gray-500">
                                                    <span>{{ $donation->created_at->format('d F Y') }}</span>
                                                    <span class="w-1 h-1 bg-gray-400 rounded-full"></span>
                                                    <span
                                                        class="px-3 py-1 rounded-full font-medium
                                                        {{ $donation->status === 'confirmed'
                                                            ? 'bg-green-100 text-green-800'
                                                            : ($donation->status === 'pending'
                                                                ? 'bg-yellow-100 text-yellow-800'
                                                                : 'bg-red-100 text-red-800') }}">
                                                        {{ ucfirst(
                                                            $donation->status === 'confirmed' ? 'Berhasil' : ($donation->status === 'pending' ? 'Menunggu' : 'Gagal'),
                                                        ) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <div
                                                    class="text-2xl font-bold {{ $donation->status === 'confirmed' ? 'text-green-600' : 'text-gray-600' }}">
                                                    Rp {{ number_format($donation->amount, 0, ',', '.') }}
                                                </div>
                                                <a href="{{ route('home.campaigns.show', $donation->campaign) }}"
                                                    class="text-blue-600 hover:text-blue-800 text-sm font-medium mt-2 inline-block">
                                                    Lihat Kampanye
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @if ($userDonations->count() > 10)
                                    <div class="text-center py-8">
                                        <p class="text-gray-500">Menampilkan 10 dari {{ $totalDonations }} donasi</p>
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="text-center py-12">
                                <div
                                    class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-4">Belum Ada Donasi</h3>
                                <p class="text-gray-600 mb-6">Anda belum melakukan donasi apapun. Mulai berbagi kebaikan
                                    sekarang!</p>
                                <a href="{{ route('home.campaigns.index') }}"
                                    class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                                    Lihat Kampanye
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @else
                <!-- Not Logged In State -->
                <div class="bg-white rounded-xl shadow-lg p-12 text-center">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Masuk untuk Melihat Riwayat Donasi</h3>
                    <p class="text-gray-600 mb-6">Login terlebih dahulu untuk melihat semua donasi yang telah Anda berikan
                    </p>
                    <div class="space-y-4 max-w-sm mx-auto">
                        <a href="{{ route('login') }}"
                            class="block w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                            Masuk Sekarang
                        </a>
                        <a href="{{ route('register') }}"
                            class="block w-full border border-blue-600 text-blue-600 py-3 px-6 rounded-lg font-semibold hover:bg-blue-50 transition-colors">
                            Daftar Akun Baru
                        </a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</x-layouts.home>
