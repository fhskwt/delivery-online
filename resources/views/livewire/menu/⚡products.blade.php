<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
    @foreach ($products as $product)
        <x-product-card />
    @endforeach
</div>
