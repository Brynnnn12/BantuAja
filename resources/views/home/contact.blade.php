<x-layouts.home :title="'Hubungi Kami - ' . config('app.name', 'BantuAja')" :breadcrumb="'<div class=\'flex items-center space-x-2 text-sm text-gray-600\'><a href=\'' .
    route('home.index') .
    '\' class=\'hover:text-blue-600\'>Beranda</a><svg class=\'w-4 h-4\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M9 5l7 7-7 7\'></path></svg><span class=\'text-gray-900 font-medium\'>Hubungi Kami</span></div>'">
    <div class="bg-gradient-to-b from-blue-50 to-white">
        <!-- Hero Section -->
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6">
                    Hubungi <span class="text-blue-600">Kami</span>
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Punya pertanyaan, saran, atau butuh bantuan? Tim kami siap membantu Anda 24/7.
                    Jangan ragu untuk menghubungi kami melalui berbagai cara di bawah ini.
                </p>
            </div>
        </section>

        <!-- Contact Methods -->
        <section class="py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                    <!-- Email -->
                    <div class="bg-white rounded-2xl p-8 text-center shadow-lg hover:shadow-xl transition-shadow">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Email</h3>
                        <p class="text-gray-600 mb-4">Kirimkan pertanyaan detail Anda via email</p>
                        <a href="mailto:info@bantuaja.com"
                            class="text-blue-600 hover:text-blue-800 font-semibold text-lg">
                            info@bantuaja.com
                        </a>
                        <div class="mt-4">
                            <span class="text-sm text-gray-500">Respon dalam {{ $averageResponseTime }} jam</span>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="bg-white rounded-2xl p-8 text-center shadow-lg hover:shadow-xl transition-shadow">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Telepon</h3>
                        <p class="text-gray-600 mb-4">Hubungi langsung untuk bantuan segera</p>
                        <a href="tel:+628001234567" class="text-green-600 hover:text-green-800 font-semibold text-lg">
                            0800-1234-567
                        </a>
                        <div class="mt-4">
                            <span class="text-sm text-gray-500">Senin-Jumat 08:00-17:00</span>
                        </div>
                    </div>

                    <!-- WhatsApp -->
                    <div class="bg-white rounded-2xl p-8 text-center shadow-lg hover:shadow-xl transition-shadow">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-green-600" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.472 3.488" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">WhatsApp</h3>
                        <p class="text-gray-600 mb-4">Chat langsung untuk respon cepat</p>
                        <a href="https://wa.me/628001234567" target="_blank"
                            class="text-green-600 hover:text-green-800 font-semibold text-lg">
                            0800-1234-567
                        </a>
                        <div class="mt-4">
                            <span class="text-sm text-gray-500">Online 24/7</span>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="max-w-4xl mx-auto">
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-6">
                            <h2 class="text-3xl font-bold text-white">Kirim Pesan</h2>
                            <p class="text-blue-100 mt-2">Isi form di bawah ini dan kami akan segera menghubungi Anda
                            </p>
                        </div>

                        <form class="p-8 space-y-6">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama
                                        Lengkap *</label>
                                    <input type="text" id="name" name="name" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email
                                        *</label>
                                    <input type="email" id="email" name="email" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor
                                        Telepon</label>
                                    <input type="tel" id="phone" name="phone"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                </div>
                                <div>
                                    <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subjek
                                        *</label>
                                    <select id="subject" name="subject" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                        <option value="">Pilih Subjek</option>
                                        <option value="question">Pertanyaan Umum</option>
                                        <option value="donation">Bantuan Donasi</option>
                                        <option value="campaign">Buat Kampanye</option>
                                        <option value="technical">Masalah Teknis</option>
                                        <option value="partnership">Kerjasama</option>
                                        <option value="other">Lainnya</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan
                                    *</label>
                                <textarea id="message" name="message" rows="6" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Tulis pesan Anda di sini..."></textarea>
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" id="privacy" name="privacy" required
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="privacy" class="ml-2 text-sm text-gray-700">
                                    Saya setuju dengan <a href="#"
                                        class="text-blue-600 hover:text-blue-800">Kebijakan Privasi</a>
                                    dan <a href="#" class="text-blue-600 hover:text-blue-800">Syarat &
                                        Ketentuan</a>
                                </label>
                            </div>

                            <div class="pt-6">
                                <button type="submit"
                                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-4 px-6 rounded-lg font-semibold hover:from-blue-700 hover:to-indigo-700 transition-all transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                    Kirim Pesan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Trust Indicators -->
        <section class="py-16 bg-blue-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Mengapa Memilih BantuAja?</h2>
                    <p class="text-lg text-gray-600">Kepercayaan Anda adalah prioritas utama kami</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="text-4xl font-bold text-blue-600 mb-2">{{ $totalCampaigns }}+</div>
                        <div class="text-gray-700 font-medium">Kampanye Aktif</div>
                        <p class="text-sm text-gray-600 mt-2">Berbagai pilihan kampanye untuk didukung</p>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-green-600 mb-2">{{ number_format($totalUsers) }}+</div>
                        <div class="text-gray-700 font-medium">Pengguna Terdaftar</div>
                        <p class="text-sm text-gray-600 mt-2">Komunitas yang terus berkembang</p>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-purple-600 mb-2">{{ $averageResponseTime }}</div>
                        <div class="text-gray-700 font-medium">Jam Respons Rata-rata</div>
                        <p class="text-sm text-gray-600 mt-2">Support yang responsif dan cepat</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Pertanyaan yang Sering Diajukan</h2>
                    <p class="text-xl text-gray-600">Temukan jawaban untuk pertanyaan umum</p>
                </div>

                <div class="max-w-4xl mx-auto">
                    <div class="space-y-4">
                        <!-- FAQ Item 1 -->
                        <div class="bg-white rounded-lg shadow-lg">
                            <button
                                class="w-full px-6 py-4 text-left flex justify-between items-center focus:outline-none"
                                onclick="toggleFAQ(this)">
                                <span class="text-lg font-semibold text-gray-900">Bagaimana cara berdonasi di
                                    BantuAja?</span>
                                <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="hidden px-6 pb-4">
                                <p class="text-gray-600">Anda bisa berdonasi dengan mudah melalui website kami. Pilih
                                    kampanye yang ingin didukung, tentukan nominal donasi, dan lakukan pembayaran
                                    melalui berbagai metode yang tersedia seperti transfer bank, e-wallet, atau kartu
                                    kredit.</p>
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="bg-white rounded-lg shadow-lg">
                            <button
                                class="w-full px-6 py-4 text-left flex justify-between items-center focus:outline-none"
                                onclick="toggleFAQ(this)">
                                <span class="text-lg font-semibold text-gray-900">Apakah donasi saya aman?</span>
                                <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="hidden px-6 pb-4">
                                <p class="text-gray-600">Ya, sangat aman. Kami menggunakan sistem keamanan berlapis dan
                                    bekerja sama dengan payment gateway terpercaya. Semua transaksi dienkripsi dan data
                                    pribadi Anda dilindungi sesuai standar keamanan internasional.</p>
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="bg-white rounded-lg shadow-lg">
                            <button
                                class="w-full px-6 py-4 text-left flex justify-between items-center focus:outline-none"
                                onclick="toggleFAQ(this)">
                                <span class="text-lg font-semibold text-gray-900">Bagaimana saya bisa membuat kampanye
                                    donasi?</span>
                                <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="hidden px-6 pb-4">
                                <p class="text-gray-600">Untuk membuat kampanye, Anda perlu mendaftar akun terlebih
                                    dahulu. Setelah itu, lengkapi proposal kampanye dengan dokumentasi yang diperlukan.
                                    Tim kami akan melakukan verifikasi sebelum kampanye dipublikasikan.</p>
                            </div>
                        </div>

                        <!-- FAQ Item 4 -->
                        <div class="bg-white rounded-lg shadow-lg">
                            <button
                                class="w-full px-6 py-4 text-left flex justify-between items-center focus:outline-none"
                                onclick="toggleFAQ(this)">
                                <span class="text-lg font-semibold text-gray-900">Apakah ada biaya administrasi?</span>
                                <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="hidden px-6 pb-4">
                                <p class="text-gray-600">Kami mengenakan biaya platform sebesar 5% dari total donasi
                                    untuk operasional dan pemeliharaan sistem. Biaya ini sudah termasuk biaya payment
                                    gateway dan memastikan platform tetap berjalan optimal.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Office Location -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Kunjungi Kantor Kami</h2>
                    <p class="text-xl text-gray-600">Tim kami siap menerima Anda langsung</p>
                </div>

                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="grid grid-cols-1 lg:grid-cols-2">
                        <!-- Map Placeholder -->
                        <div class="h-96 bg-gray-200 flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <p class="text-gray-500">Google Maps Integration</p>
                            </div>
                        </div>

                        <!-- Office Info -->
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-6">Kantor Pusat BantuAja</h3>

                            <div class="space-y-6">
                                <div class="flex items-start space-x-4">
                                    <div
                                        class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Alamat</h4>
                                        <p class="text-gray-600">Jl. Sudirman No. 123<br>Jakarta Pusat, DKI Jakarta
                                            10220</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-4">
                                    <div
                                        class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Jam Operasional</h4>
                                        <p class="text-gray-600">Senin - Jumat: 08:00 - 17:00<br>Sabtu: 09:00 -
                                            14:00<br>Minggu: Tutup</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-4">
                                    <div
                                        class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m0 8v2a2 2 0 01-2 2h-4a2 2 0 01-2-2v-2m0 0V7a2 2 0 012-2h4a2 2 0 012 2v8m-8 0V9a2 2 0 012-2h4a2 2 0 012 2v6">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Transportasi</h4>
                                        <p class="text-gray-600">5 menit jalan kaki dari Stasiun MRT Bundaran
                                            HI<br>Tersedia parkir gratis</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @push('scripts')
        <script>
            function toggleFAQ(button) {
                const content = button.nextElementSibling;
                const icon = button.querySelector('svg');

                if (content.classList.contains('hidden')) {
                    content.classList.remove('hidden');
                    icon.style.transform = 'rotate(180deg)';
                } else {
                    content.classList.add('hidden');
                    icon.style.transform = 'rotate(0deg)';
                }
            }
        </script>
    @endpush
</x-layouts.home>
