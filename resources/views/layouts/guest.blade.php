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
        {{ $slot }}
    </body>
</html>