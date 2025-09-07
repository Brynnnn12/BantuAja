<x-layouts.home :title="'Proses Pembayaran'" :bodyClass="'bg-gray-100'">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl w-full space-y-8">
            <!-- Header -->
            <div class="text-center">
                <div class="mx-auto h-16 w-16 bg-blue-600 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900">Pembayaran Donasi</h1>
                <p class="text-gray-600 mt-2">Selesaikan pembayaran untuk mendukung kampanye</p>
            </div>

            <!-- Payment Details Card -->
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
                <!-- Campaign Info -->
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-6 border-b border-gray-200">
                    <div class="flex items-start space-x-4">
                        @if ($payment->donation->campaign->image)
                            <img src="{{ asset('storage/' . $payment->donation->campaign->image) }}"
                                alt="{{ $payment->donation->campaign->title }}"
                                class="w-16 h-16 object-cover rounded-lg flex-shrink-0">
                        @else
                            <div
                                class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                        @endif

                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">
                                {{ $payment->donation->campaign->title }}
                            </h3>
                            <p class="text-sm text-gray-600 mb-2">
                                {{ Str::limit($payment->donation->campaign->description, 100) }}
                            </p>
                            <div class="text-xs text-gray-500">
                                ID Pembayaran: #{{ $payment->id }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Summary -->
                <div class="p-6 space-y-6">
                    <div class="space-y-4">
                        <h4 class="text-lg font-semibold text-gray-900">Ringkasan Donasi</h4>

                        <div class="space-y-3">
                            <div class="flex justify-between items-center py-2">
                                <span class="text-gray-600">Jumlah Donasi</span>
                                <span class="font-semibold text-xl text-green-600">
                                    Rp {{ number_format($payment->amount, 0, ',', '.') }}
                                </span>
                            </div>

                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-600">Donatur</span>
                                <span class="font-medium">{{ $payment->donation->user->name }}</span>
                            </div>

                            @if ($payment->donation->message)
                                <div class="bg-blue-50 rounded-lg p-4">
                                    <p class="text-sm font-medium text-gray-700 mb-1">Pesan Donatur:</p>
                                    <p class="text-gray-800">"{{ $payment->donation->message }}"</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Payment Button -->
                    <div class="space-y-4">
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h4 class="text-sm font-medium text-yellow-800">Informasi Penting</h4>
                                    <div class="mt-1 text-sm text-yellow-700">
                                        <ul class="list-disc list-inside space-y-1">
                                            <li>Pastikan koneksi internet Anda stabil</li>
                                            <li>Jangan menutup browser sampai pembayaran selesai</li>
                                            <li>Gunakan kartu kredit/debit atau e-wallet yang aktif</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Midtrans Payment Button -->
                        <div class="space-y-3">
                            <button id="pay-button"
                                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold py-4 px-6 rounded-lg hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-4 focus:ring-blue-200 transition-all duration-200 flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                                <span>Bayar Sekarang - Rp {{ number_format($payment->amount, 0, ',', '.') }}</span>
                            </button>

                            <p class="text-xs text-gray-500 text-center">
                                Pembayaran diproses secara aman oleh Midtrans
                            </p>
                        </div>
                    </div>

                    <!-- Alternative Actions -->
                    <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                        <a href="{{ route('home.payments.show', $payment->id) }}"
                            class="text-sm text-gray-600 hover:text-gray-800 transition-colors">
                            ← Kembali ke Detail
                        </a>

                        <a href="{{ route('dashboard') }}"
                            class="text-sm text-blue-600 hover:text-blue-800 transition-colors">
                            Dashboard →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Security Notice -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700">
                            <strong>Transaksi Aman:</strong> Data pembayaran Anda dilindungi dengan enkripsi SSL 256-bit
                            dan
                            standar keamanan PCI DSS Level 1.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Modal -->
    <div id="loading-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center">
        <div class="bg-white rounded-lg p-8 max-w-sm mx-4">
            <div class="text-center">
                <div
                    class="animate-spin rounded-full h-12 w-12 border-4 border-blue-600 border-t-transparent mx-auto mb-4">
                </div>
                <h3 class="text-lg font-semibold text-gray-900">Memproses Pembayaran</h3>
                <p class="text-gray-600 mt-2">Harap tunggu, jangan menutup halaman ini...</p>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Custom loading animation */
        @keyframes pulse-slow {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: .5;
            }
        }

        .animate-pulse-slow {
            animation: pulse-slow 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
    </style>
@endpush

@push('scripts')
    <!-- Midtrans Snap.js -->
    @if (config('midtrans.is_production'))
        <script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    @else
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const payButton = document.getElementById('pay-button');
            const loadingModal = document.getElementById('loading-modal');

            payButton.addEventListener('click', function(event) {
                event.preventDefault();

                // Show loading state
                payButton.disabled = true;
                payButton.innerHTML = `
            <div class="animate-spin rounded-full h-5 w-5 border-2 border-white border-t-transparent"></div>
            <span class="ml-2">Memproses...</span>
        `;

                // Initialize Midtrans Snap
                snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        // Hide loading
                        loadingModal.classList.add('hidden');

                        // Redirect to success page
                        window.location.href =
                            '{{ route('home.payments.success') }}?payment_id={{ $payment->id }}';
                    },
                    onPending: function(result) {
                        // Hide loading
                        loadingModal.classList.add('hidden');

                        // Redirect to pending page
                        window.location.href =
                            '{{ route('home.payments.pending') }}?payment_id={{ $payment->id }}&snap_token={{ $snapToken }}';
                    },
                    onError: function(result) {
                        // Hide loading
                        loadingModal.classList.add('hidden');

                        // Redirect to failed page
                        window.location.href =
                            '{{ route('home.payments.failed') }}?payment_id={{ $payment->id }}';
                    },
                    onClose: function() {
                        // User closed the popup without finishing payment
                        // Reset button state
                        payButton.disabled = false;
                        payButton.innerHTML = `
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    <span>Bayar Sekarang - Rp {{ number_format($payment->amount, 0, ',', '.') }}</span>
                `;

                        // Show notification
                        showNotification('Pembayaran dibatalkan. Anda dapat mencoba lagi.',
                            'warning');
                    }
                });
            });

            // Show loading modal when payment is processing
            function showLoading() {
                loadingModal.classList.remove('hidden');
                loadingModal.classList.add('flex');
            }

            // Hide loading modal
            function hideLoading() {
                loadingModal.classList.add('hidden');
                loadingModal.classList.remove('flex');
            }

            // Show notification
            function showNotification(message, type = 'info') {
                // Create notification element
                const notification = document.createElement('div');
                notification.className =
                    `fixed top-4 right-4 z-50 max-w-sm p-4 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full`;

                // Set notification style based on type
                switch (type) {
                    case 'success':
                        notification.classList.add('bg-green-500', 'text-white');
                        break;
                    case 'error':
                        notification.classList.add('bg-red-500', 'text-white');
                        break;
                    case 'warning':
                        notification.classList.add('bg-yellow-500', 'text-white');
                        break;
                    default:
                        notification.classList.add('bg-blue-500', 'text-white');
                }

                notification.innerHTML = `
            <div class="flex items-center">
                <div class="flex-1">
                    <p class="text-sm font-medium">${message}</p>
                </div>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-2 text-white hover:text-gray-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        `;

                document.body.appendChild(notification);

                // Animate in
                setTimeout(() => {
                    notification.classList.remove('translate-x-full');
                }, 100);

                // Auto remove after 5 seconds
                setTimeout(() => {
                    notification.classList.add('translate-x-full');
                    setTimeout(() => {
                        notification.remove();
                    }, 300);
                }, 5000);
            }
        });
    </script>
@endpush
