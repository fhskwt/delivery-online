<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col">

{{-- HEADER --}}
<header class="sticky top-0 z-40 bg-white/80 backdrop-blur border-b">
    <div class="max-w-md mx-auto px-4 py-3 flex items-center justify-between">
        <a href="/" class="text-base font-semibold tracking-tight">
            {{ config('app.name') }}
        </a>

        <a href="/cart" class="relative">
            <x-heroicon-o-shopping-cart class="w-6 h-6 text-gray-700" />
            {{-- badge для количества позже (Redis) --}}
        </a>
    </div>
</header>

{{-- CONTENT --}}
<main class="max-w-md lg:max-w-6xl mx-auto px-4 py-6 pb-24">
    @yield('content')
</main>

{{-- BOTTOM NAV --}}
<nav class="sticky bottom-0 z-40 bg-white/80 backdrop-blur border-t">
    <div class="max-w-md mx-auto flex justify-between px-6 py-2 text-xs text-gray-600">

        <a href="/" class="flex flex-col items-center gap-1">
            <x-heroicon-o-home class="w-6 h-6" />
            <span>Главная</span>
        </a>

        <a href="/menu" class="flex flex-col items-center gap-1">
            <x-heroicon-o-rectangle-stack class="w-6 h-6" />
            <span>Меню</span>
        </a>

        <a href="/cart" class="flex flex-col items-center gap-1">
            <x-heroicon-o-shopping-cart class="w-6 h-6" />
            <span>Корзина</span>
        </a>

        <a href="/profile" class="flex flex-col items-center gap-1">
            <x-heroicon-o-user class="w-6 h-6" />
            <span>Профиль</span>
        </a>

    </div>
</nav>

@livewireScripts
</body>
</html>
