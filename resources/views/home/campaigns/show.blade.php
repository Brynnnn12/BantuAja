<x-layouts.home :title="Str::limit($campaign->title, 50)" :bodyClass="'bg-gray-50'" :breadcrumb="view('home.campaigns._breadcrumb', compact('campaign'))">
    <div class="min-h-screen">
        <!-- Campaign Content -->
        <div class="py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:grid lg:grid-cols-3 lg:gap-8">
                    <!-- Main Content -->
                    <div class="lg:col-span-2">
                        <!-- Campaign Header -->
                        <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                            <div class="flex items-start justify-between mb-6">
                                <div class="flex-1">
                                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $campaign->title }}
                                    </h1>
                                    <div class="flex items-center space-x-4">
                                        <span
                                            class="px-3 py-1 text-sm font-semibold rounded-full
                                            {{ $campaign->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $campaign->status === 'active' ? 'Kampanye Aktif' : 'Kampanye Ditutup' }}
                                        </span>
                                        <span class="text-gray-500">Dibuat
                                            {{ $campaign->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Progress Section -->
                            @php
                                $progress =
                                    $campaign->target_amount > 0
                                        ? ($campaign->collected_amount / $campaign->target_amount) * 100
                                        : 0;
                            @endphp

                            <div class="bg-gray-50 rounded-lg p-6 mb-6">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                                    <div class="text-center">
                                        <div class="text-3xl font-bold text-green-600">Rp
                                            {{ number_format($campaign->collected_amount, 0, ',', '.') }}</div>
                                        <div class="text-gray-600">Terkumpul</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-3xl font-bold text-blue-600">Rp
                                            {{ number_format($campaign->target_amount, 0, ',', '.') }}</div>
                                        <div class="text-gray-600">Target</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-3xl font-bold text-purple-600">
                                            {{ number_format($campaign->donations_count ?? 0) }}</div>
                                        <div class="text-gray-600">Donatur</div>
                                    </div>
                                </div>

                                <!-- Progress Bar -->
                                <div class="mb-4">
                                    <div class="flex justify-between text-sm text-gray-600 mb-2">
                                        <span>Progress</span>
                                        <span>{{ round($progress, 1) }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-4">
                                        <div class="bg-gradient-to-r from-blue-500 to-green-500 h-4 rounded-full transition-all duration-500"
                                            style="width: {{ min($progress, 100) }}%"></div>
                                    </div>
                                </div>

                                <!-- Remaining -->
                                <div class="text-center text-gray-600">
                                    <span class="font-medium">Sisa: Rp
                                        {{ number_format(max(0, $campaign->target_amount - $campaign->collected_amount), 0, ',', '.') }}</span>
                                </div>
                            </div>

                            <!-- Description -->
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900 mb-4">Deskripsi Kampanye</h2>
                                <div class="prose max-w-none text-gray-700">
                                    <p class="whitespace-pre-line text-lg leading-relaxed">{{ $campaign->description }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Donations -->
                        @if ($recentDonations && $recentDonations->count() > 0)
                            <div class="bg-white rounded-xl shadow-lg p-8">
                                <h2 class="text-2xl font-bold text-gray-900 mb-6">Donasi Terbaru</h2>
                                <div class="space-y-4">
                                    @foreach ($recentDonations as $donation)
                                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                            <div class="flex items-center space-x-4">
                                                <div
                                                    class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center">
                                                    <span class="text-white font-semibold text-sm">
                                                        {{ strtoupper(substr($donation->user->name, 0, 1)) }}
                                                    </span>
                                                </div>
                                                <div>
                                                    <div class="font-semibold text-gray-900">
                                                        {{ $donation->user->name }}</div>
                                                    <div class="text-sm text-gray-500">
                                                        {{ $donation->created_at->diffForHumans() }}</div>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <div class="font-bold text-green-600">Rp
                                                    {{ number_format($donation->amount, 0, ',', '.') }}</div>
                                                <div
                                                    class="text-xs px-2 py-1 rounded-full
                                                    {{ $donation->status === 'confirmed'
                                                        ? 'bg-green-100 text-green-800'
                                                        : ($donation->status === 'pending'
                                                            ? 'bg-yellow-100 text-yellow-800'
                                                            : 'bg-red-100 text-red-800') }}">
                                                    {{ ucfirst($donation->status) }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Sidebar -->
                    <div class="lg:col-span-1 mt-8 lg:mt-0">
                        <!-- Donation Form -->
                        <div class="bg-white rounded-xl shadow-lg p-8 sticky top-24">
                            <h3 class="text-2xl font-bold text-gray-900 mb-6">Donasi Sekarang</h3>

                            @if ($campaign->status === 'active')
                                <form id="donation-form">
                                    @csrf
                                    <input type="hidden" id="campaign_id" value="{{ $campaign->id }}">

                                    <!-- Quick Amount Buttons -->
                                    <div class="mb-6">
                                        <label class="block text-sm font-medium text-gray-700 mb-3">Pilih
                                            Nominal</label>
                                        <div class="grid grid-cols-2 gap-3 mb-4">
                                            <button type="button" onclick="setAmount(50000)"
                                                class="amount-btn p-3 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition-all">
                                                <span class="block text-sm text-gray-600">Rp</span>
                                                <span class="block font-bold">50.000</span>
                                            </button>
                                            <button type="button" onclick="setAmount(100000)"
                                                class="amount-btn p-3 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition-all">
                                                <span class="block text-sm text-gray-600">Rp</span>
                                                <span class="block font-bold">100.000</span>
                                            </button>
                                            <button type="button" onclick="setAmount(250000)"
                                                class="amount-btn p-3 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition-all">
                                                <span class="block text-sm text-gray-600">Rp</span>
                                                <span class="block font-bold">250.000</span>
                                            </button>
                                            <button type="button" onclick="setAmount(500000)"
                                                class="amount-btn p-3 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition-all">
                                                <span class="block text-sm text-gray-600">Rp</span>
                                                <span class="block font-bold">500.000</span>
                                            </button>
                                        </div>

                                        <!-- Custom Amount -->
                                        <div>
                                            <label for="amount"
                                                class="block text-sm font-medium text-gray-700 mb-2">Atau
                                                masukkan
                                                nominal lain</label>
                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <span class="text-gray-500">Rp</span>
                                                </div>
                                                <input type="number" id="amount" min="10000" step="5000"
                                                    class="block w-full pl-8 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                    placeholder="10000" required>
                                            </div>
                                            <p class="mt-1 text-sm text-gray-500">Minimal donasi Rp 10.000</p>
                                        </div>
                                    </div>

                                    @auth
                                        <button type="button" id="donate-button"
                                            class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-4 px-6 rounded-lg font-bold text-lg hover:from-blue-700 hover:to-blue-800 transition-all transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                            Donasi Sekarang
                                        </button>
                                    @else
                                        <div class="text-center">
                                            <p class="text-gray-600 mb-4">Silakan login terlebih dahulu untuk berdonasi
                                            </p>
                                            <a href="{{ route('login', ['redirect' => url()->current()]) }}"
                                                class="inline-block w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-4 px-6 rounded-lg font-bold text-lg hover:from-blue-700 hover:to-blue-800 transition-colors text-center">
                                                Login untuk Donasi
                                            </a>
                                        </div>
                                    @endauth
                                </form>
                            @else
                                <div class="text-center p-6 bg-gray-50 rounded-lg">
                                    <h4 class="text-lg font-semibold text-gray-900 mb-2">Kampanye Ditutup</h4>
                                    <p class="text-gray-600">Kampanye ini sudah tidak menerima donasi</p>
                                </div>
                            @endif

                            <!-- Share Campaign -->
                            <div class="mt-8 pt-6 border-t">
                                <h4 class="font-semibold text-gray-900 mb-4">Bagikan Kampanye</h4>
                                <div class="flex space-x-3">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                        target="_blank"
                                        class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg text-center hover:bg-blue-700 transition-colors">
                                        Facebook
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($campaign->title) }}"
                                        target="_blank"
                                        class="flex-1 bg-blue-400 text-white py-2 px-4 rounded-lg text-center hover:bg-blue-500 transition-colors">
                                        Twitter
                                    </a>
                                    <button onclick="copyLink()"
                                        class="flex-1 bg-gray-600 text-white py-2 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                                        Copy Link
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Midtrans Snap JS --}}
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>

    <script>
        function setAmount(amount) {
            document.getElementById('amount').value = amount;
            document.querySelectorAll('.amount-btn').forEach(btn => {
                btn.classList.remove('border-blue-500', 'bg-blue-50');
                btn.classList.add('border-gray-300');
            });
            event.target.classList.add('border-blue-500', 'bg-blue-50');
            event.target.classList.remove('border-gray-300');
        }

        function copyLink() {
            navigator.clipboard.writeText(window.location.href);
            const btn = event.target;
            const originalText = btn.textContent;
            btn.textContent = 'Copied!';
            btn.classList.add('bg-green-600');
            btn.classList.remove('bg-gray-600');
            setTimeout(() => {
                btn.textContent = originalText;
                btn.classList.remove('bg-green-600');
                btn.classList.add('bg-gray-600');
            }, 2000);
        }
        document.getElementById('amount').addEventListener('input', function() {
            document.querySelectorAll('.amount-btn').forEach(btn => {
                btn.classList.remove('border-blue-500', 'bg-blue-50');
                btn.classList.add('border-gray-300');
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const donateButton = document.getElementById('donate-button');
            if (donateButton) {
                donateButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    const campaignId = document.getElementById('campaign_id').value;
                    const amount = parseInt(document.getElementById('amount').value);
                    if (!amount || amount < 10000) {
                        alert('Minimal donasi Rp 10.000');
                        return;
                    }
                    donateButton.textContent = 'Memproses...';
                    donateButton.disabled = true;
                    fetch('{{ route('home.donations.store') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            },
                            body: JSON.stringify({
                                campaign_id: campaignId,
                                amount: amount
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            donateButton.textContent = 'Donasi Sekarang';
                            donateButton.disabled = false;
                            if (data.snap_token) {
                                if (typeof snap === 'undefined') {
                                    alert(
                                        'Midtrans Snap belum dimuat. Silakan refresh halaman dan coba lagi.'
                                        );
                                    return;
                                }
                                snap.pay(data.snap_token, {
                                    onSuccess: function(result) {
                                        window.location.href =
                                            '{{ route('home.payments.success') }}?payment_id=' +
                                            data.payment_id;
                                    },
                                    onPending: function(result) {
                                        window.location.href =
                                            '{{ route('home.payments.pending') }}?payment_id=' +
                                            data.payment_id;
                                    },
                                    onError: function(result) {
                                        window.location.href =
                                            '{{ route('home.payments.failed') }}?payment_id=' +
                                            data.payment_id;
                                    },
                                    onClose: function() {
                                        alert(
                                            'Anda menutup popup pembayaran tanpa menyelesaikan pembayaran.'
                                            );
                                    }
                                });
                            } else if (data.error) {
                                alert(data.error);
                            } else {
                                alert('Terjadi kesalahan. Silakan coba lagi.');
                            }
                        })
                        .catch(error => {
                            alert('Terjadi kesalahan pada server. Silakan coba lagi.');
                            donateButton.textContent = 'Donasi Sekarang';
                            donateButton.disabled = false;
                        });
                });
            }
        });
    </script>
</x-layouts.home>
