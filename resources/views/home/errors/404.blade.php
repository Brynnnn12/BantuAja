<x-layouts.home :title="'Halaman Tidak Ditemukan - ' . config('app.name', 'BantuAja')" :bodyClass="'bg-gray-50'" :breadcrumb="'<div class=\'flex items-center space-x-2 text-sm text-gray-600\'><a href=\'' .
    route('home.index') .
    '\' class=\'hover:text-blue-600\'>Beranda</a><svg class=\'w-4 h-4\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M9 5l7 7-7 7\'></path></svg><span class=\'text-gray-900 font-medium\'>404</span></div>'">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-lg w-full text-center">
            <!-- 404 Illustration -->
            <div class="mb-8">
                <div class="mx-auto flex items-center justify-center h-32 w-32 rounded-full bg-blue-100 mb-6">
                    <svg class="h-16 w-16 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6 4h6m-3-16C8.477 0 2 6.477 2 12s6.477 12 12 12 12-6.477 12-12S17.523 0 12 0z" />
                    </svg>
                </div>
                <div class="text-6xl font-bold text-gray-900 mb-4">404</div>
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Halaman Tidak Ditemukan</h1>
                <p class="text-gray-600 text-lg">
                    Maaf, halaman yang Anda cari tidak dapat ditemukan.
                    Mungkin halaman telah dipindahkan atau tidak tersedia.
                </p>
            </div>

            <!-- Suggestions -->
            <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Apa yang bisa Anda lakukan?</h2>
                <div class="space-y-4 text-left">
                    <div class="flex items-start">
                        <svg class="h-6 w-6 text-blue-600 mt-1 mr-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h3 class="font-semibold text-gray-900">Periksa URL</h3>
                            <p class="text-gray-600 text-sm">Pastikan alamat yang diketik sudah benar</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <svg class="h-6 w-6 text-blue-600 mt-1 mr-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                            </path>
                        </svg>
                        <div>
                            <h3 class="font-semibold text-gray-900">Gunakan Navigasi</h3>
                            <p class="text-gray-600 text-sm">Kembali ke beranda atau gunakan menu navigasi</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <svg class="h-6 w-6 text-blue-600 mt-1 mr-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <div>
                            <h3 class="font-semibold text-gray-900">Cari Kampanye</h3>
                            <p class="text-gray-600 text-sm">Temukan kampanye donasi yang Anda cari</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-4">
                <a href="{{ route('home.index') }}"
                    class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition-colors inline-block">
                    🏠 Kembali ke Beranda
                </a>

                <a href="{{ route('home.campaigns.index') }}"
                    class="w-full bg-white border border-gray-300 text-gray-700 py-3 px-6 rounded-lg font-semibold hover:bg-gray-50 transition-colors inline-block">
                    💝 Lihat Semua Kampanye
                </a>

                <button onclick="history.back()"
                    class="w-full bg-gray-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-gray-700 transition-colors">
                    ↶ Halaman Sebelumnya
                </button>
            </div>

            <!-- Popular Campaigns -->
            @if (isset($popularCampaigns) && $popularCampaigns->count() > 0)
                <div class="mt-12">
                    <h3 class="text-xl font-semibold text-gray-900 mb-6">Kampanye Popular</h3>
                    <div class="space-y-4">
                        @foreach ($popularCampaigns->take(3) as $campaign)
                            <a href="{{ route('home.campaigns.show', $campaign) }}"
                                class="block bg-white p-4 rounded-lg shadow hover:shadow-md transition-shadow">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1 mr-4">
                                        <h4 class="font-medium text-gray-900 mb-1">
                                            {{ Str::limit($campaign->title, 60) }}</h4>
                                        <p class="text-sm text-gray-600 mb-2">
                                            {{ Str::limit($campaign->description, 100) }}</p>
                                        <div class="flex items-center text-sm text-gray-500">
                                            <span>Terkumpul: Rp
                                                {{ number_format($campaign->collected_amount, 0, ',', '.') }}</span>
                                            @php $progress = $campaign->target_amount > 0 ? ($campaign->collected_amount / $campaign->target_amount) * 100 : 0; @endphp
                                            <span
                                                class="ml-2 text-blue-600 font-medium">({{ round($progress, 1) }}%)</span>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span
                                            class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                                            {{ $campaign->donations_count ?? 0 }} donatur
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Contact Information -->
            <div class="mt-12 text-center p-6 bg-gray-100 rounded-lg">
                <h4 class="font-semibold text-gray-900 mb-2">Masih Butuh Bantuan?</h4>
                <p class="text-gray-600 text-sm mb-4">Tim support kami siap membantu Anda</p>
                <div class="flex justify-center space-x-6 text-sm">
                    <a href="mailto:support@bantuaja.com" class="text-blue-600 hover:text-blue-800">
                        📧 Email
                    </a>
                    <a href="tel:08001234567" class="text-blue-600 hover:text-blue-800">
                        📞 Telepon
                    </a>
                    <a href="https://wa.me/628001234567" target="_blank" class="text-blue-600 hover:text-blue-800">
                        💬 WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer otomatis dari layout -->
</x-layouts.home>
