<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="h-28 bg-gray-200">
        @if($product->image)
            <img
                src="{{ $product->image }}"
                class="w-full h-full object-cover"
            >
        @endif
    </div>

    <div class="p-3">
        <h3 class="text-sm font-semibold mb-1">
            {{ $product->name }}
        </h3>

        <p class="text-xs text-gray-600 mb-2">
            {{ $product->weight }} г • {{ $product->calories }} ккал
        </p>

        <div class="flex justify-between items-center">
            <span class="font-bold text-sm">
                {{ $product->price }} ₽
            </span>

            <button
                class="bg-orange-500 text-white text-xs px-3 py-1 rounded-lg">
                В корзину
            </button>
        </div>
    </div>
</div>
