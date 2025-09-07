<x-layouts.home :title="config('app.name', 'BantuAja') . ' - Platform Donasi Terpercaya'">
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">

        <!-- Hero Section -->
        <section class="relative py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
                        Berbagi Kebaikan,
                        <span class="text-blue-600">Wujudkan Impian</span>
                    </h1>
                    <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                        Platform donasi terpercaya yang menghubungkan hati dermawan dengan mereka yang membutuhkan.
                        Mari bersama-sama membangun Indonesia yang lebih baik.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="#campaigns"
                            class="bg-blue-600 text-white px-8 py-3 rounded-lg text-lg font-semibold hover:bg-blue-700 transition-colors">
                            Mulai Berdonasi
                        </a>
                        <a href="#about"
                            class="border-2 border-blue-600 text-blue-600 px-8 py-3 rounded-lg text-lg font-semibold hover:bg-blue-50 transition-colors">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                    <div class="p-6">
                        <div class="text-4xl font-bold text-blue-600 mb-2">{{ $totalCampaigns }}+</div>
                        <div class="text-gray-600">Kampanye Aktif</div>
                    </div>
                    <div class="p-6">
                        <div class="text-4xl font-bold text-green-600 mb-2">Rp
                            {{ number_format($totalDonations, 0, ',', '.') }}+</div>
                        <div class="text-gray-600">Total Donasi Terkumpul</div>
                    </div>
                    <div class="p-6">
                        <div class="text-4xl font-bold text-purple-600 mb-2">{{ $totalDonors }}+</div>
                        <div class="text-gray-600">Donatur Bergabung</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Active Campaigns -->
        <section id="campaigns" class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Kampanye Donasi Aktif</h2>
                    <p class="text-xl text-gray-600">Pilih kampanye yang ingin Anda dukung dan berikan kontribusi
                        terbaik Anda</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($campaigns as $campaign)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $campaign->title }}</h3>
                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    {{ Str::limit($campaign->description, 120) }}</p>

                                <!-- Progress Bar -->
                                <div class="mb-4">
                                    @php
                                        $progress =
                                            $campaign->target_amount > 0
                                                ? min(
                                                    ($campaign->collected_amount / $campaign->target_amount) * 100,
                                                    100,
                                                )
                                                : 0;
                                    @endphp
                                    <div class="flex justify-between text-sm text-gray-600 mb-2">
                                        <span>Terkumpul: Rp
                                            {{ number_format($campaign->collected_amount, 0, ',', '.') }}</span>
                                        <span>{{ round($progress, 1) }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-3">
                                        <div class="bg-blue-600 h-3 rounded-full transition-all duration-300"
                                            style="width: {{ $progress }}%"></div>
                                    </div>
                                </div>

                                <div class="flex justify-between items-center">
                                    <div>
                                        <div class="text-sm text-gray-500">Target</div>
                                        <div class="font-semibold text-gray-900">Rp
                                            {{ number_format($campaign->target_amount, 0, ',', '.') }}</div>
                                    </div>
                                    <a href="{{ route('home.campaigns.show', $campaign) }}"
                                        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                        Donasi Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <div class="text-gray-500 text-lg">Belum ada kampanye aktif</div>
                        </div>
                    @endforelse
                </div>

                @if ($campaigns->count() > 0)
                    <div class="text-center mt-12">
                        <a href="{{ route('home.campaigns.index') }}"
                            class="inline-flex items-center bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                            Lihat Semua Kampanye
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                    </div>
                @endif
            </div>
        </section>

        <!-- How it Works -->
        <section id="about" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Cara Kerja Platform</h2>
                    <p class="text-xl text-gray-600">Donasi mudah dan aman dalam 3 langkah sederhana</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-2xl font-bold text-blue-600">1</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Pilih Kampanye</h3>
                        <p class="text-gray-600">Temukan kampanye yang sesuai dengan hati Anda dan pelajari detail
                            kebutuhannya</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-green-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-2xl font-bold text-green-600">2</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Berdonasi</h3>
                        <p class="text-gray-600">Tentukan nominal donasi dan lakukan pembayaran dengan aman melalui
                            sistem terpercaya</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-purple-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-2xl font-bold text-purple-600">3</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Pantau Impact</h3>
                        <p class="text-gray-600">Lihat perkembangan kampanye dan dampak nyata dari kontribusi Anda</p>
                    </div>
                </div>
            </div>
        </section>

    </div>
</x-layouts.home>
