<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $judul ?? config('app.name') }}</title>

    {{-- Vite --}}
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <!-- Tailwind Plus Elements -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />

    {{-- Tambahan: favicon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    {{-- Tambahan: yield untuk style khusus tiap halaman --}}
    @stack('styles')
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-full flex flex-col">
        {{-- Navbar --}}
        <x-navbar />

        {{-- Header langsung manggil komponen --}}
        <x-header>{{ $judul ?? 'Dashboard' }}</x-header>

        {{-- Konten utama --}}
        <main class="flex-1">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>

    </div>

    {{-- Tambahan: yield untuk script khusus tiap halaman --}}
    @stack('scripts')
</body>
</html>
