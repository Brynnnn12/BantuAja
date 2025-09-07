<footer class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="col-span-1 md:col-span-2">
                <h3 class="text-2xl font-bold mb-4">{{ config('app.name', 'BantuAja') }}</h3>
                <p class="text-gray-400 mb-6 max-w-md">
                    Platform donasi terpercaya yang menghubungkan hati dermawan dengan mereka yang membutuhkan bantuan.
                    Bersama-sama membangun Indonesia yang lebih baik.
                </p>
                <div class="flex space-x-4">
                    <!-- Social Media Links -->
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.219-.359-1.219c0-1.142.662-1.995 1.488-1.995.219 0 .406.219.406.438 0 .359-.219.938-.359 1.406-.219.938.469 1.688 1.406 1.688 1.687 0 2.987-1.781 2.987-4.354 0-2.275-1.641-3.864-3.99-3.864-2.716 0-4.31 2.034-4.31 4.135 0 .828.219 1.688.496 2.154.055.219.055.438-.105.656-.219.219-.469.688-.469 1.5 0 1.781 1.312 3.132 3.99 3.132 2.716 0 4.826-1.594 4.826-4.826 0-2.385-1.688-4.057-4.135-4.057-.828 0-1.609.438-1.875 1.031-.438-.828-1.375-2.2-1.375-3.546 0-.828.219-1.5.496-2.2C8.079.797 9.969.029 12.017.029c6.624 0 11.99 5.367 11.99 11.987C24.007 18.616 18.641.029 12.017.029z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12.764 5.037c2.7 0 4.26 1.56 4.26 4.26v9.443h-3.51v-8.613c0-1.47-.78-2.25-2.04-2.25-1.26 0-2.04.78-2.04 2.25v8.613h-3.51V9.297c0-2.7 1.56-4.26 4.26-4.26zm-5.31 0c.78 0 1.41.63 1.41 1.41s-.63 1.41-1.41 1.41-1.41-.63-1.41-1.41.63-1.41 1.41-1.41zm1.755 2.82v9.883H5.699V7.857h2.51z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold mb-6">Tautan Cepat</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('home.index') }}"
                            class="text-gray-400 hover:text-white transition-colors">Beranda</a></li>
                    <li><a href="{{ route('home.campaigns.index') }}"
                            class="text-gray-400 hover:text-white transition-colors">Semua Kampanye</a></li>
                    <li><a href="#about" class="text-gray-400 hover:text-white transition-colors">Tentang Kami</a></li>
                    <li><a href="#contact" class="text-gray-400 hover:text-white transition-colors">Hubungi Kami</a>
                    </li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h4 class="text-lg font-semibold mb-6">Dukungan</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">FAQ</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Panduan Donasi</a>
                    </li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Kebijakan Privasi</a>
                    </li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Syarat &
                            Ketentuan</a></li>
                </ul>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="border-t border-gray-800 mt-12 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">
                    &copy; {{ date('Y') }} {{ config('app.name', 'BantuAja') }}. All rights reserved.
                </p>
                <div class="flex items-center space-x-6 mt-4 md:mt-0">
                    <span class="text-gray-400 text-sm">Aman & Terpercaya</span>
                    <div class="flex items-center space-x-2">
                        <!-- SSL Badge -->
                        <div class="bg-green-600 px-2 py-1 rounded text-xs font-semibold">SSL</div>
                        <!-- Security Badge -->
                        <div class="bg-blue-600 px-2 py-1 rounded text-xs font-semibold">Verified</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
