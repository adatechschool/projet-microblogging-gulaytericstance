<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body x-data="themeToggle()" x-init="$watch('darkMode', value => localStorage.setItem('darkMode', value))" :class="{ 'dark': darkMode }" class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main class="py-10 sm:py-12">
            <!-- Votre contenu ici -->
            @yield('content')
        </main>
    </div>

    <!-- Bouton de bascule du thème -->
    <div class="fixed bottom-4 right-4">
        <button id="themeToggle" class="p-2 bg-gray-200 dark:bg-gray-800 rounded-full shadow-md">
            <span id="themeIcon">🌞</span>
        </button>
    </div>

    <!-- Scripts -->
@vite('resources/js/app.js')
</body>
</html>
