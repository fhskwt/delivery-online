<div class="space-y-4">

    @if(empty($items))
        <div class="text-center text-gray-500">
            Корзина пуста
        </div>
    @else
        @foreach($items as $id => $qty)
            <div class="flex items-center justify-between bg-gray-900 rounded-xl p-4">
                <div>
                    <div class="font-semibold">Товар #{{ $id }}</div>
                    <div class="text-sm text-gray-400">500 ₽ / шт</div>
                </div>

                <div class="flex items-center gap-3">
                    <button
                        wire:click="decrement({{ $id }})"
                        class="w-8 h-8 rounded-full bg-gray-700"
                    >−</button>

                    <span class="w-6 text-center">{{ $qty }}</span>

                    <button
                        wire:click="increment({{ $id }})"
                        class="w-8 h-8 rounded-full bg-gray-700"
                    >+</button>
                </div>

                <button
                    wire:click="remove({{ $id }})"
                    class="text-red-400 text-sm"
                >
                    ✕
                </button>
            </div>
        @endforeach

        <div class="border-t border-gray-700 pt-4 flex justify-between text-lg font-bold">
            <span>Итого</span>
            <span>{{ $total }} ₽</span>
        </div>

        <a
            href="/checkout"
            class="block text-center bg-green-600 py-3 rounded-xl font-semibold"
        >
            Оформить заказ
        </a>
    @endif

</div>
