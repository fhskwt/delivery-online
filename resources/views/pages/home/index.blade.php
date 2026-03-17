@extends('layouts.app')

@section('content')

    {{-- HERO --}}
    <section class="mb-10">
        <div class="bg-white/80 backdrop-blur rounded-3xl p-6 shadow-sm
                grid gap-6 lg:grid-cols-2 lg:items-center">

            <div>
                <h1 class="text-2xl lg:text-3xl font-semibold mb-3">
                    Готовая еда на каждый день
                </h1>
                <p class="text-gray-600 mb-6 max-w-md">
                    Свежие блюда с доставкой. Подходит для дома и офиса.
                </p>

                <div class="flex gap-3 max-w-sm">
                    <a href="/menu"
                       class="flex-1 text-center bg-gray-900 text-white py-3 rounded-xl text-sm font-medium">
                        Открыть меню
                    </a>
                    <a href="/orders"
                       class="flex-1 text-center border border-gray-200 py-3 rounded-xl text-sm">
                        Мои заказы
                    </a>
                </div>
            </div>

            <div class="hidden lg:block">
                <div class="h-56 bg-gray-200 rounded-2xl"></div>
            </div>
        </div>
    </section>


    {{-- HOW IT WORKS --}}
    <section class="mb-10">
        <h2 class="text-lg font-semibold mb-4">Как это работает</h2>

        <div class="grid grid-cols-3 lg:grid-cols-3 gap-4 text-sm">
            <div class="bg-white rounded-2xl p-5 shadow-sm">
                <div class="text-xl mb-2">🍽️</div>
                Выбираешь блюда
            </div>
            <div class="bg-white rounded-2xl p-5 shadow-sm">
                <div class="text-xl mb-2">🧾</div>
                Оформляешь заказ
            </div>
            <div class="bg-white rounded-2xl p-5 shadow-sm">
                <div class="text-xl mb-2">🚴</div>
                Получаешь доставку
            </div>
        </div>
    </section>


    {{-- CATEGORIES --}}
    <section class="mb-10">
        <h2 class="text-lg font-semibold mb-4">Категории</h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach ($categories as $category)
                <a href="/menu/{{ $category->slug }}"
                   class="bg-white rounded-2xl p-4 shadow-sm text-center text-sm">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </section>


    {{-- POPULAR --}}
    <section class="mb-10">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Популярные блюда</h2>
            <a href="/menu" class="text-sm text-gray-500">Все</a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($products->take(8) as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </section>


    {{-- WHY US --}}
    <section class="mb-8">
        <h2 class="text-base font-semibold mb-4">Почему мы</h2>

        <div class="space-y-3 text-sm text-gray-600">
            <div class="bg-white rounded-xl p-4 shadow-sm">
                ✔ Готовим каждый день, без заморозки
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm">
                ✔ Прозрачные цены без скрытых условий
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm">
                ✔ Поддержка и контроль заказа
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section>
        <div class="bg-gray-900 text-white rounded-2xl p-5 text-center">
            <h3 class="text-lg font-semibold mb-2">
                Готовы оформить первый заказ?
            </h3>
            <p class="text-sm text-gray-300 mb-4">
                Регистрация займёт меньше минуты
            </p>
            <a href="/menu"
               class="block bg-white text-gray-900 py-3 rounded-xl text-sm font-medium">
                Перейти к меню
            </a>
        </div>
    </section>

@endsection
