<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Glam By Ramdiah') }} | Luxury MUA</title>

        <link rel="icon" type="image/png" href="{{ asset('assets/images/Logo1.png') }}">

        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Inter:wght@400;600&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .font-serif { font-family: 'Playfair Display', serif; }
            .bg-pure-white { background-color: #ffffff; }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased bg-pure-white">
        <div class="min-h-screen flex flex-col justify-center items-center py-12 px-6">

            <div class="w-full sm:max-w-md bg-white shadow-[0_20px_60px_rgba(0,0,0,0.03)] overflow-hidden rounded-[3rem] border border-stone-50">
                {{ $slot }}
            </div>

            <div class="mt-12 text-center">
                <p class="text-[10px] uppercase tracking-[0.5em] text-stone-300 font-bold italic">
                    Modern Glamour & Luxury Service
                </p>
            </div>
        </div>
    </body>
</html>