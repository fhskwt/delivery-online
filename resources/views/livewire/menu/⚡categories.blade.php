<div class="space-y-2">
    @foreach ($categories as $category)
        <button
            wire:click="select('{{ $category['slug'] }}')"
            class="w-full text-left px-4 py-3 rounded-xl text-sm
                {{ $active === $category['slug']
                    ? 'bg-gray-900 text-white'
                    : 'bg-white' }}">
            {{ $category['name'] }}
        </button>
    @endforeach
</div>
