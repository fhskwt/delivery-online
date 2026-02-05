@extends('layouts.app')

@section('content')
    <div class="min-h-[80vh] flex items-center justify-center px-4">
        <div class="max-w-md w-full">

            <div class="rounded-3xl border border-gray-200 bg-white/80 backdrop-blur p-8 text-center shadow-sm">

                {{-- Иконка --}}
                <div class="mx-auto mb-6 flex h-14 w-14 items-center justify-center rounded-2xl bg-gray-100">
                    <x-heroicon-o-map-pin class="h-7 w-7 text-gray-600"/>
                </div>

                {{-- Код ошибки --}}
                <h1 class="text-6xl font-semibold tracking-tight text-gray-900 mb-2">
                    404
                </h1>

                {{-- Заголовок --}}
                <p class="text-lg font-medium text-gray-800 mb-2">
                    Мы не нашли эту страницу
                </p>

                {{-- Описание --}}
                <p class="text-sm text-gray-500 mb-8 leading-relaxed">
                    Похоже, курьер свернул не туда.
                    Такой страницы не существует,
                    но доставка всё ещё работает.
                </p>

                {{-- Действия --}}
                <div class="flex flex-col gap-3">
                    <a href="{{ route('menu.index') }}"
                       class="inline-flex items-center justify-center gap-2 rounded-xl
                          bg-gray-900 text-white py-3 text-sm font-medium
                          hover:bg-gray-800 transition">
                        <x-heroicon-o-squares-2x2 class="h-5 w-5"/>
                        Открыть меню
                    </a>

                    <a href="{{ url('/') }}"
                       class="inline-flex items-center justify-center gap-2 rounded-xl
                          border border-gray-300 text-gray-700 py-3 text-sm
                          hover:bg-gray-100 transition">
                        <x-heroicon-o-arrow-left class="h-5 w-5"/>
                        Вернуться на главную
                    </a>
                </div>

            </div>

            {{-- Подпись --}}
            <p class="mt-6 text-center text-xs text-gray-400">
                Ошибка навигации · Код 404
            </p>

        </div>
    </div>
@endsection
