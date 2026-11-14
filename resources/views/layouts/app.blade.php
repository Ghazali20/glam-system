<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Glam By Ramdiah</title>

        <link rel="icon" type="image/png" href="{{ asset('assets/images/logo1.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('assets/images/logo1.png') }}">

        <meta name="description" content="Glam By Ramdiah - Jasa MUA Profesional untuk Wedding, Graduation, dan Occasion. Timeless Beauty, Elegant Look.">
        <meta property="og:title" content="Glam By Ramdiah | Professional MUA">
        <meta property="og:description" content="Booking paket makeup terbaik untuk momen spesial Anda.">
        <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
        <meta property="og:type" content="website">

        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Inter:wght@400;600&display=swap" rel="stylesheet">

        <script src="https://unpkg.com/lucide@latest"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { font-family: 'Inter', sans-serif; background-color: #ffffff; }
            .font-serif { font-family: 'Playfair Display', serif; }
        </style>
    </head>
    <body class="antialiased bg-white">
        <div class="min-h-screen">
            @include('layouts.navigation')

            @if (isset($header))
                <header class="bg-white border-b border-gray-100">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main>
                {{ $slot }}
            </main>
        </div>
        <script>lucide.createIcons();</script>
    </body>
</html>