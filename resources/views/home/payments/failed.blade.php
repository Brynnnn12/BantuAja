<x-layouts.home :title="'Pembayaran Gagal'" :bodyClass="'bg-red-50'">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <!-- Failed Animation -->
            <div class="text-center mb-8">
                <div class="mx-auto flex items-center justify-center h-24 w-24 rounded-full bg-red-100 mb-6">
                    <svg class="h-16 w-16 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 48 48">
                        <circle cx="24" cy="24" r="20" stroke="currentColor" stroke-width="2" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                            d="M18 18l12 12M30 18L18 30" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Pembayaran Gagal</h1>
                <p class="text-gray-600">Maaf, pembayaran Anda tidak dapat diproses. Silakan coba lagi.</p>
            </div>

            <!-- Error Details -->
            <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Detail Pembayaran</h2>

                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">ID Pembayaran:</span>
                        <span class="font-medium">#{{ $payment->id }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Kampanye:</span>
                        <span class="font-medium">{{ Str::limit($payment->donation->campaign->title, 30) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Jumlah Donasi:</span>
                        <span class="font-bold text-gray-900">Rp
                            {{ number_format($payment->amount, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Metode Pembayaran:</span>
                        <span class="font-medium capitalize">{{ $payment->payment_method }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Status:</span>
                        <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full font-medium">
                            Gagal
                        </span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Waktu:</span>
                        <span class="font-medium">{{ $payment->updated_at->format('d M Y, H:i') }}</span>
                    </div>
                </div>

                @if (isset($error_message))
                    <div class="mt-4 p-3 bg-red-50 border border-red-200 rounded-lg">
                        <p class="text-sm text-red-800">
                            <strong>Alasan:</strong> {{ $error_message }}
                        </p>
                    </div>
                @endif
            </div>

            <!-- Possible Reasons -->
            <div class="bg-red-50 border border-red-200 rounded-lg p-6 mb-8">
                <div class="flex items-start">
                    <svg class="h-6 w-6 text-red-600 mt-1 mr-3" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <h3 class="text-lg font-semibold text-red-900 mb-2">Kemungkinan Penyebab</h3>
                        <ul class="text-red-800 text-sm space-y-1">
                            <li>• Saldo atau limit kartu tidak mencukupi</li>
                            <li>• Informasi kartu yang dimasukkan tidak benar</li>
                            <li>• Koneksi internet tidak stabil</li>
                            <li>• Kartu diblokir oleh bank</li>
                            <li>• Transaksi ditolak oleh sistem keamanan</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- What to do next -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-8">
                <div class="flex items-start">
                    <svg class="h-6 w-6 text-blue-600 mt-1 mr-3" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <h3 class="text-lg font-semibold text-blue-900 mb-2">Apa yang bisa dilakukan?</h3>
                        <ul class="text-blue-800 text-sm space-y-1">
                            <li>• Periksa kembali informasi pembayaran</li>
                            <li>• Pastikan saldo atau limit kartu mencukupi</li>
                            <li>• Coba gunakan metode pembayaran lain</li>
                            <li>• Hubungi bank jika kartu diblokir</li>
                            <li>• Coba lagi dalam beberapa menit</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-4">
                <a href="{{ route('home.campaigns.show', $payment->donation->campaign) }}"
                    class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg font-semibold hover:bg-blue-700 transition-colors text-center block">
                    Coba Donasi Lagi
                </a>

                <a href="{{ route('home.campaigns.index') }}"
                    class="w-full bg-white border border-gray-300 text-gray-700 py-3 px-4 rounded-lg font-semibold hover:bg-gray-50 transition-colors text-center block">
                    Lihat Kampanye Lain
                </a>

                <button onclick="contactSupport()"
                    class="w-full bg-gray-600 text-white py-3 px-4 rounded-lg font-semibold hover:bg-gray-700 transition-colors">
                    Hubungi Customer Service
                </button>

                <a href="{{ route('home.index') }}"
                    class="w-full text-center text-blue-600 hover:text-blue-800 font-medium block py-2">
                    Kembali ke Beranda
                </a>
            </div>
            </a>
        </div>

        <!-- Support Information -->
        <div class="mt-8 text-center p-4 bg-gray-100 rounded-lg">
            <h4 class="font-semibold text-gray-900 mb-2">Butuh Bantuan?</h4>
            <p class="text-gray-600 text-sm mb-3">Tim support kami siap membantu Anda</p>
            <div class="space-y-1 text-sm text-gray-600">
                <p>📧 support@bantuaja.com</p>
                <p>📞 0800-1234-5678</p>
                <p>🕐 24/7 Customer Support</p>
            </div>
        </div>
    </div>
    </div>

    <!-- Contact Support Modal -->
    <div id="support-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Hubungi Customer Service</h3>
                    <button onclick="closeSupportModal()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="space-y-4">
                    <div class="text-center">
                        <p class="text-gray-600 mb-4">Pilih cara menghubungi kami:</p>
                    </div>
                    <a href="mailto:support@bantuaja.com?subject=Bantuan Pembayaran Gagal&body=ID Transaksi: {{ isset($donation) ? $donation->id : '' }}"
                        class="block w-full bg-blue-600 text-white py-3 px-4 rounded-lg text-center hover:bg-blue-700 transition-colors">
                        📧 Email Support
                    </a>
                    <a href="tel:08001234567"
                        class="block w-full bg-green-600 text-white py-3 px-4 rounded-lg text-center hover:bg-green-700 transition-colors">
                        📞 Telepon
                    </a>
                    <a href="https://wa.me/628001234567" target="_blank"
                        class="block w-full bg-green-500 text-white py-3 px-4 rounded-lg text-center hover:bg-green-600 transition-colors">
                        💬 WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function contactSupport() {
            document.getElementById('support-modal').classList.remove('hidden');
        }

        function closeSupportModal() {
            document.getElementById('support-modal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('support-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeSupportModal();
            }
        });
    </script>
    </body>

    </html>
