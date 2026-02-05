@extends('layouts.app')

@section('content')

    {{-- Hero --}}
    <section class="mb-6">
        <div class="bg-orange-100 rounded-xl p-4">
            <h1 class="text-xl font-bold mb-2">
                Готовая еда с доставкой
            </h1>
            <p class="text-sm text-gray-700 mb-4">
                Свежие блюда каждый день.
            </p>
            <a href="/menu"
               class="inline-block bg-orange-500 text-white px-4 py-2 rounded-lg text-sm font-medium">
                Смотреть меню
            </a>
        </div>
    </section>

    {{-- Popular --}}
    <section>
        <h2 class="text-lg font-semibold mb-3">
            Популярные позиции
        </h2>

        <div class="grid grid-cols-2 gap-4">
            {{-- временно моковые данные --}}
            @foreach (range(1, 4) as $item)
                <x-product-card />
            @endforeach
        </div>
    </section>

@endsection
