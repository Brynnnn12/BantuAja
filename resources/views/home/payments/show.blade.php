<x-layouts.home :title="'Detail Pembayaran'" :breadcrumb="view('home.payments._breadcrumb', ['payment' => $payment])">
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-white">Detail Pembayaran</h1>
                        <p class="text-blue-100 mt-1">ID Pembayaran: #{{ $payment->id }}</p>
                    </div>
                    <div class="text-right">
                        @php
                            $statusClass = match ($payment->status) {
                                'paid' => 'bg-green-100 text-green-800',
                                'pending' => 'bg-yellow-100 text-yellow-800',
                                'failed' => 'bg-red-100 text-red-800',
                                default => 'bg-gray-100 text-gray-800',
                            };
                        @endphp
                        <span class="inline-flex px-3 py-1 rounded-full text-sm font-medium {{ $statusClass }}">
                            {{ ucfirst($payment->status) }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <!-- Payment Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-900">Informasi Pembayaran</h3>

                        <div class="space-y-3">
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600">Jumlah Donasi:</span>
                                <span class="font-semibold text-lg text-green-600">
                                    Rp {{ number_format($payment->amount, 0, ',', '.') }}
                                </span>
                            </div>

                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600">Tanggal Pembayaran:</span>
                                <span class="font-medium">{{ $payment->created_at->format('d F Y, H:i') }}</span>
                            </div>

                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600">Status:</span>
                                <span class="font-medium">
                                    @switch($payment->status)
                                        @case('paid')
                                            <span class="text-green-600">✓ Berhasil</span>
                                        @break

                                        @case('pending')
                                            <span class="text-yellow-600">⏳ Menunggu</span>
                                        @break

                                        @case('failed')
                                            <span class="text-red-600">✗ Gagal</span>
                                        @break

                                        @default
                                            <span class="text-gray-600">{{ ucfirst($payment->status) }}</span>
                                    @endswitch
                                </span>
                            </div>

                            @if ($payment->updated_at != $payment->created_at)
                                <div class="flex justify-between py-2 border-b border-gray-100">
                                    <span class="text-gray-600">Terakhir Diupdate:</span>
                                    <span class="font-medium">{{ $payment->updated_at->format('d F Y, H:i') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-900">Donatur</h3>

                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold text-lg">
                                        {{ strtoupper(substr($payment->donation->user->name, 0, 1)) }}
                                    </span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">{{ $payment->donation->user->name }}</h4>
                                    <p class="text-gray-600 text-sm">{{ $payment->donation->user->email }}</p>
                                </div>
                            </div>

                            @if ($payment->donation->message)
                                <div class="mt-4 pt-4 border-t border-gray-200">
                                    <p class="text-gray-600 text-sm font-medium">Pesan:</p>
                                    <p class="text-gray-800 mt-1">"{{ $payment->donation->message }}"</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Campaign Info -->
                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Kampanye yang Didukung</h3>

                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <div class="flex items-start space-x-4">
                            @if ($payment->donation->campaign->image)
                                <img src="{{ asset('storage/' . $payment->donation->campaign->image) }}"
                                    alt="{{ $payment->donation->campaign->title }}"
                                    class="w-24 h-24 object-cover rounded-lg flex-shrink-0">
                            @else
                                <div
                                    class="w-24 h-24 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            @endif

                            <div class="flex-1 min-w-0">
                                <h4 class="text-xl font-semibold text-gray-900 mb-2">
                                    {{ $payment->donation->campaign->title }}
                                </h4>
                                <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                                    {{ Str::limit($payment->donation->campaign->description, 150) }}
                                </p>

                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                                    <div>
                                        <span class="text-gray-500">Target:</span>
                                        <p class="font-semibold text-blue-600">
                                            Rp
                                            {{ number_format($payment->donation->campaign->target_amount, 0, ',', '.') }}
                                        </p>
                                    </div>
                                    <div>
                                        <span class="text-gray-500">Terkumpul:</span>
                                        <p class="font-semibold text-green-600">
                                            Rp
                                            {{ number_format($payment->donation->campaign->collected_amount, 0, ',', '.') }}
                                        </p>
                                    </div>
                                    <div>
                                        <span class="text-gray-500">Berakhir:</span>
                                        <p class="font-semibold">
                                            {{ $payment->donation->campaign->end_date->format('d M Y') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-between items-center mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ route('dashboard') }}"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Dashboard
                    </a>

                    @if ($payment->status === 'pending')
                        <a href="{{ route('home.payments.process', $payment->id) }}"
                            class="inline-flex items-center px-6 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            Lanjutkan Pembayaran
                        </a>
                    @endif

                    @if ($payment->status === 'paid')
                        <a href="{{ route('home.campaigns.show', $payment->donation->campaign->id) }}"
                            class="inline-flex items-center px-6 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                            Lihat Kampanye
                        </a>
                    @endif

                    @if ($payment->status === 'failed')
                        <a href="{{ route('home.donations.store') }}"
                            class="inline-flex items-center px-6 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                </path>
                            </svg>
                            Coba Lagi
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endpush
