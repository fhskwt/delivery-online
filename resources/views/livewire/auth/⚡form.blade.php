<div class="bg-white rounded-2xl shadow p-6">
    <h1 class="text-2xl font-bold mb-2 text-center">
        {{ $isRegister ? 'Регистрация' : 'Вход' }}
    </h1>

    <p class="text-sm text-gray-500 text-center mb-6">
        {{ $isRegister ? 'Создай аккаунт за 30 секунд' : 'Рады видеть тебя снова' }}
    </p>

    <form wire:submit.prevent="submit" class="space-y-4">

        @if($isRegister)
            <div>
                <input
                    type="text"
                    wire:model.defer="name"
                    placeholder="Имя"
                    class="w-full rounded-xl border-gray-300 focus:ring-black focus:border-black"
                >
                @error('name') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>
        @endif

        <div>
            <input
                type="tel"
                x-data
                x-mask="+375 (99) 999-99-99"
                wire:model.defer="phone"
                placeholder="+375 (___) ___-__-__"
                class="w-full rounded-xl border-gray-300 focus:ring-black focus:border-black"
            >
            @error('phone') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <input
                type="password"
                wire:model.defer="password"
                placeholder="Пароль"
                class="w-full rounded-xl border-gray-300 focus:ring-black focus:border-black"
            >
            @error('password') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <button
            type="submit"
            class="w-full bg-black text-white py-3 rounded-xl font-semibold active:scale-[0.98]"
        >
            {{ $isRegister ? 'Зарегистрироваться' : 'Войти' }}
        </button>
    </form>

    <button
        wire:click="toggleMode"
        class="w-full mt-4 text-sm text-gray-600"
    >
        {{ $isRegister ? 'Уже есть аккаунт? Войти' : 'Нет аккаунта? Регистрация' }}
    </button>
</div>
