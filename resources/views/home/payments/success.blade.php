<x-layouts.home :title="'Pembayaran Berhasil'" :bodyClass="'bg-green-50'">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl w-full space-y-8">
            <!-- Success Icon -->
            <div class="text-center">
                <div
                    class="mx-auto h-24 w-24 bg-green-500 rounded-full flex items-center justify-center mb-6 animate-pulse">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Pembayaran Berhasil!</h1>
                <p class="text-gray-600 text-lg">Terima kasih atas donasi Anda</p>
            </div>

            <!-- Payment Success Card -->
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-green-500 to-emerald-600 p-6 text-white text-center">
                    <h2 class="text-2xl font-bold mb-2">Donasi Anda Telah Diterima</h2>
                    <p class="text-green-100">ID Pembayaran: #{{ $payment->id }}</p>
                </div>

                <div class="p-8 space-y-6">
                    <!-- Payment Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-gray-900">Detail Donasi</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Jumlah:</span>
                                    <span class="font-bold text-2xl text-green-600">
                                        Rp {{ number_format($payment->amount, 0, ',', '.') }}
                                    </span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Tanggal:</span>
                                    <span class="font-medium">{{ $payment->updated_at->format('d F Y, H:i') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Status:</span>
                                    <span class="font-medium text-green-600">✓ Berhasil</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-gray-900">Donatur</h3>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                                        <span class="text-white font-bold text-lg">
                                            {{ strtoupper(substr($payment->donation->user->name, 0, 1)) }}
                                        </span>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">{{ $payment->donation->user->name }}
                                        </h4>
                                        <p class="text-gray-600 text-sm">{{ $payment->donation->user->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Campaign Info -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Kampanye yang Didukung</h3>

                        <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                            <div class="flex items-start space-x-4">
                                @if ($payment->donation->campaign->image)
                                    <img src="{{ asset('storage/' . $payment->donation->campaign->image) }}"
                                        alt="{{ $payment->donation->campaign->title }}"
                                        class="w-20 h-20 object-cover rounded-lg flex-shrink-0">
                                @else
                                    <div
                                        class="w-20 h-20 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif

                                <div class="flex-1">
                                    <h4 class="text-xl font-semibold text-gray-900 mb-2">
                                        {{ $payment->donation->campaign->title }}
                                    </h4>
                                    <p class="text-gray-600 text-sm mb-3">
                                        {{ Str::limit($payment->donation->campaign->description, 100) }}
                                    </p>

                                    <!-- Progress Bar -->
                                    @php
                                        $percentage =
                                            ($payment->donation->campaign->collected_amount /
                                                $payment->donation->campaign->target_amount) *
                                            100;
                                    @endphp
                                    <div class="space-y-2">
                                        <div class="flex justify-between text-sm">
                                            <span>Progress: {{ number_format($percentage, 1) }}%</span>
                                            <span>Rp
                                                {{ number_format($payment->donation->campaign->collected_amount, 0, ',', '.') }}
                                                / Rp
                                                {{ number_format($payment->donation->campaign->target_amount, 0, ',', '.') }}</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="bg-green-500 h-2 rounded-full transition-all duration-500"
                                                style="width: {{ min($percentage, 100) }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($payment->donation->message)
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <h4 class="font-semibold text-blue-900 mb-2">Pesan Anda:</h4>
                            <p class="text-blue-800">"{{ $payment->donation->message }}"</p>
                        </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('home.campaigns.show', $payment->donation->campaign->id) }}"
                            class="flex-1 inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-lg shadow-sm text-base font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                            Lihat Kampanye
                        </a>

                        <a href="{{ route('dashboard') }}"
                            class="flex-1 inline-flex items-center justify-center px-6 py-3 border border-gray-300 rounded-lg shadow-sm text-base font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2H3z"></path>
                            </svg>
                            Dashboard
                        </a>
                    </div>

                    <!-- Share Section -->
                    <div class="bg-gray-50 rounded-lg p-4 text-center">
                        <p class="text-gray-700 font-medium mb-3">Bantu sebarkan kampanye ini!</p>
                        <div class="flex justify-center space-x-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('home.campaigns.show', $payment->donation->campaign->id)) }}"
                                target="_blank"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode('Saya baru saja berdonasi untuk: ' . $payment->donation->campaign->title) }}&url={{ urlencode(route('home.campaigns.show', $payment->donation->campaign->id)) }}"
                                target="_blank"
                                class="inline-flex items-center px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition-colors">
                                Twitter
                            </a>
                            <a href="https://wa.me/?text={{ urlencode('Lihat kampanye donasi ini: ' . $payment->donation->campaign->title . ' ' . route('home.campaigns.show', $payment->donation->campaign->id)) }}"
                                target="_blank"
                                class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                                WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Thank You Message -->
            <div class="text-center">
                <p class="text-gray-600">
                    Setiap donasi Anda membuat perbedaan. Terima kasih telah menjadi bagian dari kebaikan ini! 💚
                </p>
            </div>
        </div>
    </div>

    <!-- Confetti Animation (optional) -->
    <div id="confetti-container" class="fixed inset-0 pointer-events-none z-40"></div>

    @push('styles')
        <style>
            /* Confetti Animation */
            .confetti {
                position: absolute;
                width: 10px;
                height: 10px;
                background: #f0f;
                animation: confetti-fall 3s linear infinite;
            }

            @keyframes confetti-fall {
                to {
                    transform: translateY(100vh) rotate(360deg);
                }
            }

            .confetti:nth-child(1) {
                left: 10%;
                animation-delay: 0s;
                background: #ff6b6b;
            }

            .confetti:nth-child(2) {
                left: 20%;
                animation-delay: 0.5s;
                background: #4ecdc4;
            }

            .confetti:nth-child(3) {
                left: 30%;
                animation-delay: 1s;
                background: #45b7d1;
            }

            .confetti:nth-child(4) {
                left: 40%;
                animation-delay: 1.5s;
                background: #f9ca24;
            }

            .confetti:nth-child(5) {
                left: 50%;
                animation-delay: 0.25s;
                background: #f0932b;
            }

            .confetti:nth-child(6) {
                left: 60%;
                animation-delay: 0.75s;
                background: #eb4d4b;
            }

            .confetti:nth-child(7) {
                left: 70%;
                animation-delay: 1.25s;
                background: #6c5ce7;
            }

            .confetti:nth-child(8) {
                left: 80%;
                animation-delay: 1.75s;
                background: #a29bfe;
            }

            .confetti:nth-child(9) {
                left: 90%;
                animation-delay: 2s;
                background: #fd79a8;
            }

            .confetti:nth-child(10) {
                left: 85%;
                animation-delay: 0.1s;
                background: #00b894;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Create confetti animation
                function createConfetti() {
                    const container = document.getElementById('confetti-container');
                    for (let i = 0; i < 50; i++) {
                        const confetti = document.createElement('div');
                        confetti.className = 'confetti';
                        confetti.style.left = Math.random() * 100 + '%';
                        confetti.style.animationDelay = Math.random() * 3 + 's';
                        confetti.style.backgroundColor = getRandomColor();
                        container.appendChild(confetti);

                        // Remove confetti after animation
                        setTimeout(() => {
                            if (confetti.parentNode) {
                                confetti.parentNode.removeChild(confetti);
                            }
                        }, 3000);
                    }
                }

                function getRandomColor() {
                    const colors = ['#ff6b6b', '#4ecdc4', '#45b7d1', '#f9ca24', '#f0932b', '#eb4d4b', '#6c5ce7',
                        '#a29bfe', '#fd79a8', '#00b894'
                    ];
                    return colors[Math.floor(Math.random() * colors.length)];
                }

                // Start confetti animation
                createConfetti();

                // Repeat confetti every 5 seconds for the first 15 seconds
                let confettiCount = 0;
                const confettiInterval = setInterval(() => {
                    confettiCount++;
                    if (confettiCount < 3) {
                        createConfetti();
                    } else {
                        clearInterval(confettiInterval);
                    }
                }, 5000);
            });
        </script>
    @endpush
</x-layouts.home>
