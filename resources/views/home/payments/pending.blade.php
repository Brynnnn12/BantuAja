<x-layouts.home :title="'Pembayaran Pending'" :bodyClass="'bg-yellow-50'">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <!-- Pending Animation -->
            <div class="text-center mb-8">
                <div class="mx-auto flex items-center justify-center h-24 w-24 rounded-full bg-yellow-100 mb-6">
                    <svg class="h-12 w-12 text-yellow-600 animate-spin" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-dasharray="60 40" />
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-gray-900 mb-2">Menunggu Pembayaran</h1>
                <p class="text-gray-600">Silakan selesaikan pembayaran Anda</p>
            </div>

            <!-- Payment Details Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
                <!-- Header -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4">
                    <h2 class="text-white text-lg font-semibold">Detail Pembayaran</h2>
                </div>

                <!-- Content -->
                <div class="px-6 py-4">
                    <div class="space-y-4">
                        <!-- Campaign Info -->
                        <div class="flex items-start space-x-3">
                            <div class="w-16 h-16 bg-gray-200 rounded-lg overflow-hidden flex-shrink-0">
                                @if ($payment->donation->campaign->image)
                                    <img src="{{ asset('storage/' . $payment->donation->campaign->image) }}"
                                        alt="{{ $payment->donation->campaign->title }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4zM3 8a2 2 0 00-2 2v6a2 2 0 002 2h14a2 2 0 002-2v-6a2 2 0 00-2-2H3zm5 4a2 2 0 114 0 2 2 0 01-4 0z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900">{{ $payment->donation->campaign->title }}
                                </p>
                                <p class="text-xs text-gray-500 mt-1">ID Pembayaran: #{{ $payment->id }}</p>
                            </div>
                        </div>

                        <!-- Amount -->
                        <div class="border-t pt-4">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Jumlah Donasi:</span>
                                <span class="font-semibold text-lg text-green-600">
                                    Rp {{ number_format($payment->amount, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="border-t pt-4">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Metode Pembayaran:</span>
                                <span class="font-medium capitalize">{{ $payment->payment_method }}</span>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="border-t pt-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Status:</span>
                                <span
                                    class="inline-flex px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    Menunggu Pembayaran
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Button -->
            <div class="space-y-4">
                <button id="pay-button"
                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 
                               text-white font-semibold py-4 px-6 rounded-lg shadow-lg transform transition-all duration-200 
                               hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300">
                    <div class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" />
                        </svg>
                        Bayar Sekarang
                    </div>
                </button>

                <!-- Alternative Actions -->
                <div class="flex space-x-3">
                    <a href="{{ route('home.campaigns.show', $payment->donation->campaign) }}"
                        class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-3 px-4 rounded-lg 
                              text-center transition-colors duration-200">
                        Kembali ke Kampanye
                    </a>
                    <a href="{{ route('home.index') }}"
                        class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-3 px-4 rounded-lg 
                              text-center transition-colors duration-200">
                        Beranda
                    </a>
                </div>
            </div>

            <!-- Info Box -->
            <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    <div class="ml-3">
                        <p class="text-sm text-blue-800">
                            <strong>Informasi:</strong> Halaman ini akan otomatis diperbarui setelah pembayaran
                            berhasil.
                            Jika mengalami kendala, silakan hubungi customer service kami.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Midtrans Snap -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script>
        document.getElementById('pay-button').addEventListener('click', function() {
            snap.pay('{{ $payment->snap_token }}', {
                onSuccess: function(result) {
                    window.location.href =
                        '{{ route('home.payments.success', ['payment' => $payment->id]) }}';
                },
                onPending: function(result) {
                    console.log('Payment pending:', result);
                },
                onError: function(result) {
                    window.location.href =
                        '{{ route('home.payments.failed', ['payment' => $payment->id]) }}';
                },
                onClose: function() {
                    console.log('Payment popup closed');
                }
            });
        });

        // Auto refresh every 30 seconds to check payment status
        setInterval(function() {
            fetch('{{ route('home.payments.callback') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        payment_id: {{ $payment->id }},
                        check_status: true
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success' || data.status === 'completed') {
                        window.location.href =
                            '{{ route('home.payments.success', ['payment' => $payment->id]) }}';
                    } else if (data.status === 'failed') {
                        window.location.href =
                            '{{ route('home.payments.failed', ['payment' => $payment->id]) }}';
                    }
                })
                .catch(error => console.log('Status check failed:', error));
        }, 30000);
    </script>
    </body>

    </html>
