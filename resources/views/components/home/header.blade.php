<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home.index') }}" class="text-2xl font-bold text-blue-600">
                    {{ config('app.name', 'BantuAja') }}
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex space-x-8">
                <a href="{{ route('home.index') }}"
                    class="text-gray-700 hover:text-blue-600 transition-colors {{ request()->routeIs('home.index') ? 'text-blue-600 font-semibold' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('home.campaigns.index') }}"
                    class="text-gray-700 hover:text-blue-600 transition-colors {{ request()->routeIs('home.campaigns.*') ? 'text-blue-600 font-semibold' : '' }}">
                    Kampanye
                </a>
                <a href="{{ route('home.about') }}"
                    class="text-gray-700 hover:text-blue-600 transition-colors">Tentang</a>
                <a href="{{ route('home.contact') }}"
                    class="text-gray-700 hover:text-blue-600 transition-colors">Kontak</a>
            </nav>

            <!-- Auth Links -->
            <div class="hidden md:flex items-center space-x-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600 transition-colors">
                        Dashboard
                    </a>
                    <div class="relative group">
                        <button class="flex items-center text-gray-700 hover:text-blue-600 transition-colors">
                            {{ Auth::user()->name }}
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div
                            class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 transition-colors">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        Daftar
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button type="button" class="text-gray-700 hover:text-blue-600 focus:outline-none"
                    onclick="toggleMobileMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-white border-t">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('home.index') }}"
                    class="block px-3 py-2 text-gray-700 hover:text-blue-600">Beranda</a>
                <a href="{{ route('home.campaigns.index') }}"
                    class="block px-3 py-2 text-gray-700 hover:text-blue-600">Kampanye</a>
                <a href="{{ route('home.about') }}"
                    class="block px-3 py-2 text-gray-700 hover:text-blue-600">Tentang</a>
                <a href="{{ route('home.contact') }}"
                    class="block px-3 py-2 text-gray-700 hover:text-blue-600">Kontak</a>
                @auth
                    <a href="{{ route('dashboard') }}"
                        class="block px-3 py-2 text-gray-700 hover:text-blue-600">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="block">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2 text-gray-700 hover:text-blue-600">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block px-3 py-2 text-gray-700 hover:text-blue-600">Login</a>
                    <a href="{{ route('register') }}" class="block px-3 py-2 text-gray-700 hover:text-blue-600">Daftar</a>
                @endauth
            </div>
        </div>
    </div>
</header>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    }
</script>
