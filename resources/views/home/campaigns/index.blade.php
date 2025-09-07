<x-layouts.home :title="'Semua Kampanye'" :bodyClass="'bg-gray-50'" :breadcrumb="view('home.campaigns._breadcrumb')">
    <div class="min-h-screen">
        <!-- Page Header -->
        <section class="bg-gradient-to-r from-blue-600 to-indigo-600 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center text-white">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">Semua Kampanye Donasi</h1>
                    <p class="text-xl opacity-90">Temukan kampanye yang sesuai dengan hati Anda</p>
                </div>
            </div>
        </section>

        <!-- Filters -->
        <section class="py-8 bg-white border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row gap-4 justify-between items-center">
                    <div class="flex flex-wrap gap-2">
                        <span class="text-gray-600 font-medium">Filter:</span>
                        <a href="{{ request()->fullUrlWithQuery(['filter' => null]) }}"
                            class="px-4 py-2 rounded-full text-sm font-medium transition-colors
                                  {{ !request('filter') ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                            Semua
                        </a>
                        <a href="{{ request()->fullUrlWithQuery(['filter' => 'urgent']) }}"
                            class="px-4 py-2 rounded-full text-sm font-medium transition-colors
                                  {{ request('filter') === 'urgent' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                            Mendesak
                        </a>
                        <a href="{{ request()->fullUrlWithQuery(['filter' => 'almost']) }}"
                            class="px-4 py-2 rounded-full text-sm font-medium transition-colors
                                  {{ request('filter') === 'almost' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                            Hampir Tercapai
                        </a>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-gray-600 text-sm">{{ $campaigns->total() }} kampanye ditemukan</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Campaigns Grid -->
        <section class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @if ($campaigns->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($campaigns as $campaign)
                            <div
                                class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                <div class="p-6">
                                    <!-- Campaign Status -->
                                    <div class="flex items-center justify-between mb-4">
                                        <span
                                            class="px-3 py-1 text-xs font-semibold rounded-full
                                            {{ $campaign->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $campaign->status === 'active' ? 'Aktif' : 'Ditutup' }}
                                        </span>
                                        @php
                                            $progress =
                                                $campaign->target_amount > 0
                                                    ? ($campaign->collected_amount / $campaign->target_amount) * 100
                                                    : 0;
                                        @endphp
                                        @if ($progress > 80)
                                            <span
                                                class="px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">
                                                Hampir Tercapai
                                            </span>
                                        @endif
                                    </div>

                                    <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                                        {{ $campaign->title }}</h3>
                                    <p class="text-gray-600 mb-4 line-clamp-3">
                                        {{ Str::limit($campaign->description, 120) }}</p>

                                    <!-- Progress Section -->
                                    <div class="mb-6">
                                        <div class="flex justify-between text-sm text-gray-600 mb-2">
                                            <span>Terkumpul</span>
                                            <span>{{ round($progress, 1) }}%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-3 mb-3">
                                            <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-3 rounded-full transition-all duration-300"
                                                style="width: {{ min($progress, 100) }}%"></div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4 text-sm">
                                            <div>
                                                <span class="text-gray-500">Terkumpul</span>
                                                <div class="font-bold text-green-600">Rp
                                                    {{ number_format($campaign->collected_amount, 0, ',', '.') }}</div>
                                            </div>
                                            <div class="text-right">
                                                <span class="text-gray-500">Target</span>
                                                <div class="font-bold text-gray-900">Rp
                                                    {{ number_format($campaign->target_amount, 0, ',', '.') }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Stats -->
                                    <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                                        <span>{{ $campaign->donations_count ?? 0 }} donatur</span>
                                        <span>{{ $campaign->created_at->diffForHumans() }}</span>
                                    </div>

                                    <!-- Action Button -->
                                    <a href="{{ route('home.campaigns.show', $campaign) }}"
                                        class="block w-full bg-blue-600 text-white text-center py-3 rounded-lg hover:bg-blue-700 transition-colors font-semibold">
                                        {{ $campaign->status === 'active' ? 'Donasi Sekarang' : 'Lihat Detail' }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12">
                        {{ $campaigns->links() }}
                    </div>
                @else
                    <div class="text-center py-16">
                        <div class="bg-gray-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Kampanye</h3>
                        <p class="text-gray-600 mb-6">Belum ada kampanye yang sesuai dengan filter yang dipilih</p>
                        <a href="{{ route('home.index') }}"
                            class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                            Kembali ke Beranda
                        </a>
                    </div>
                @endif
            </div>
        </section>
    </div>

    <!-- Footer otomatis dari layout -->
</x-layouts.home>
