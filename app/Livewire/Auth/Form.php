<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Form extends Component
{
    public string $name = '';
    public string $phone = '';
    public string $password = '';

    public bool $isRegister = false;

    protected function rules(): array
    {
        return [
            'phone' => ['required', 'string', 'min:10'],
            'password' => ['required', 'string', 'min:6'],
            'name' => $this->isRegister ? ['required', 'string', 'min:2'] : ['nullable'],
        ];
    }

    public function submit()
    {
        $this->validate();

        $user = User::where('phone', $this->phone)->first();

        if ($this->isRegister) {
            // --- ЛОГИКА РЕГИСТРАЦИИ ---
            if ($user) {
                $this->addError('phone', 'Этот номер уже зарегистрирован');
                return;
            }

            $user = User::create([
                'name' => $this->name,
                'phone' => $this->phone,
                'password' => Hash::make($this->password),
            ]);

            Auth::login($user);
            return redirect('/');

        } else {
            // --- ЛОГИКА ВХОДА ---
            if (!$user) {
                $this->addError('phone', 'Пользователь не найден');
                return;
            }

            if (!Hash::check($this->password, $user->password)) {
                $this->addError('password', 'Неверный пароль');
                return;
            }

            Auth::login($user);
            return redirect()->intended('/');
        }
    }

    public function toggleMode(): void
    {
        $this->resetErrorBag();
        $this->isRegister = ! $this->isRegister;
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return view('livewire.auth.⚡form');
    }
}
