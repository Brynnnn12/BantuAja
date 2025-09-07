@props([
    'title' => config('app.name', 'BantuAja'),
    'bodyClass' => 'bg-gray-50',
    'mainClass' => 'min-h-screen',
    'breadcrumb' => null,
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="font-sans antialiased {{ $bodyClass }}">
    <x-home.header />
    @if ($breadcrumb)
        <nav class="bg-white border-b py-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {!! $breadcrumb !!}
            </div>
        </nav>
    @endif
    <main class="{{ $mainClass }}">
        <x-alert />
        {{ $slot }}
    </main>
    <x-home.footer />
    @stack('scripts')
</body>

</html>
