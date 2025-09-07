<x-layouts.home :title="'Tentang Kami - ' . config('app.name', 'BantuAja')" :breadcrumb="'<div class=\'flex items-center space-x-2 text-sm text-gray-600\'><a href=\'' .
    route('home.index') .
    '\' class=\'hover:text-blue-600\'>Beranda</a><svg class=\'w-4 h-4\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M9 5l7 7-7 7\'></path></svg><span class=\'text-gray-900 font-medium\'>Tentang Kami</span></div>'">
    <div class="bg-gradient-to-b from-blue-50 to-white">
        <!-- Hero Section -->
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6">
                    Tentang <span class="text-blue-600">BantuAja</span>
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Platform donasi digital terpercaya yang menghubungkan kebaikan hati Anda dengan mereka yang
                    membutuhkan,
                    menciptakan dampak nyata untuk Indonesia yang lebih baik.
                </p>
            </div>
        </section>

        <!-- Mission & Vision -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8">
                        <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">Misi Kami</h2>
                        <p class="text-gray-700 leading-relaxed">
                            Mempermudah setiap orang untuk berbagi kebaikan dan membantu sesama melalui platform digital
                            yang
                            transparan, aman, dan terpercaya. Kami berkomitmen untuk memastikan setiap donasi sampai
                            tepat sasaran
                            dan memberikan dampak nyata bagi penerima manfaat.
                        </p>
                    </div>

                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-8">
                        <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">Visi Kami</h2>
                        <p class="text-gray-700 leading-relaxed">
                            Menjadi platform donasi terdepan di Indonesia yang menginspirasi budaya gotong royong
                            digital,
                            di mana setiap orang dapat berkontribusi dalam membangun masyarakat yang lebih sejahtera dan
                            saling peduli satu sama lain.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Values -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Nilai-Nilai Kami</h2>
                    <p class="text-xl text-gray-600">Prinsip yang menjadi fondasi dalam setiap langkah kami</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="bg-white rounded-xl p-8 text-center shadow-lg hover:shadow-xl transition-shadow">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Terpercaya</h3>
                        <p class="text-gray-600">Transparansi penuh dalam setiap proses donasi dan penggunaan dana</p>
                    </div>

                    <div class="bg-white rounded-xl p-8 text-center shadow-lg hover:shadow-xl transition-shadow">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Peduli</h3>
                        <p class="text-gray-600">Mengutamakan empati dan kepedulian dalam setiap tindakan</p>
                    </div>

                    <div class="bg-white rounded-xl p-8 text-center shadow-lg hover:shadow-xl transition-shadow">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Cepat</h3>
                        <p class="text-gray-600">Respon yang cepat untuk situasi darurat dan kebutuhan mendesak</p>
                    </div>

                    <div class="bg-white rounded-xl p-8 text-center shadow-lg hover:shadow-xl transition-shadow">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Inklusif</h3>
                        <p class="text-gray-600">Terbuka untuk semua kalangan tanpa diskriminasi</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Statistics -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Dampak yang Telah Kami Ciptakan</h2>
                    <p class="text-xl text-gray-600">Angka-angka yang menunjukkan komitmen kami</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="text-5xl font-bold text-blue-600 mb-2">{{ $completedCampaigns }}+</div>
                        <div class="text-gray-600 font-medium">Kampanye Selesai</div>
                    </div>
                    <div class="text-center">
                        <div class="text-5xl font-bold text-green-600 mb-2">
                            @if ($totalDonations >= 1000000000)
                                {{ number_format($totalDonations / 1000000000, 1) }}B+
                            @elseif($totalDonations >= 1000000)
                                {{ number_format($totalDonations / 1000000, 1) }}M+
                            @elseif($totalDonations >= 1000)
                                {{ number_format($totalDonations / 1000, 1) }}K+
                            @else
                                {{ number_format($totalDonations) }}
                            @endif
                        </div>
                        <div class="text-gray-600 font-medium">Dana Terkumpul</div>
                    </div>
                    <div class="text-center">
                        <div class="text-5xl font-bold text-purple-600 mb-2">{{ $activeDonors }}+</div>
                        <div class="text-gray-600 font-medium">Donatur Aktif</div>
                    </div>
                    <div class="text-center">
                        <div class="text-5xl font-bold text-orange-600 mb-2">{{ $peopleHelped }}+</div>
                        <div class="text-gray-600 font-medium">Orang Terbantu</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Tim Kami</h2>
                    <p class="text-xl text-gray-600">Orang-orang yang berdedikasi untuk kebaikan</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($teamMembers as $member)
                        <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">

                            <img src="https://i.pravatar.cc/300?u={{ urlencode($member->email) }}"
                                alt="{{ $member->name }}"
                                class="w-66 mx-auto mt-6 h-56 rounded-full object-cover hover:scale-105 transition-transform">

                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $member->name }}</h3>
                                <p class="text-blue-600 font-medium mb-3">{{ $member->email }}</p>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="py-20 bg-gradient-to-r from-blue-600 to-indigo-600">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-4xl font-bold text-white mb-6">Bergabunglah dengan Gerakan Kebaikan</h2>
                <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto">
                    Setiap donasi Anda adalah langkah nyata untuk menciptakan perubahan positif.
                    Mari bersama-sama membangun Indonesia yang lebih baik.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('home.campaigns.index') }}"
                        class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-50 transition-colors">
                        Mulai Berdonasi
                    </a>
                    <a href="{{ route('home.contact') }}"
                        class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </section>
    </div>
</x-layouts.home>
