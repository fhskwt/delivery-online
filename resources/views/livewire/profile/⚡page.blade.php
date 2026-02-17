<div class="bg-white rounded-2xl shadow p-6 space-y-4">
    <div class="text-center">
        <div class="w-20 h-20 mx-auto rounded-full bg-gray-200 flex items-center justify-center text-2xl font-bold">
            {{ mb_substr($user->name, 0, 1) }}
        </div>

        <h2 class="mt-3 text-xl font-semibold">
            {{ $user->name }}
        </h2>

        <p class="text-gray-500 text-sm">
            {{ $user->email }}
        </p>
    </div>

    <div class="border-t pt-4 space-y-2 text-sm">
        <div class="flex justify-between">
            <span class="text-gray-500">Телефон</span>
            <span>{{ $user->phone ?? '—' }}</span>
        </div>

        <div class="flex justify-between">
            <span class="text-gray-500">Дата регистрации</span>
            <span>{{ $user->created_at->format('d.m.Y') }}</span>
        </div>
    </div>

    <div class="pt-4">
        <button
            wire:click="logout"
            class="w-full bg-red-500 text-white py-3 rounded-xl font-medium hover:bg-red-600 transition"
        >
            Выйти
        </button>
    </div>
</div>
