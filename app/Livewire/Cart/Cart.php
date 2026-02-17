<?php

namespace App\Livewire\Cart;

use Livewire\Component;
use Illuminate\Support\Facades\Redis;

class Cart extends Component
{
    public array $items = [];
    public int $total = 0;

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->items = Redis::hgetall($this->cartKey());
        $this->calculateTotal();
    }

    public function increment($id)
    {
        Redis::hincrby($this->cartKey(), $id, 1);
        $this->loadCart();
    }

    public function decrement($id)
    {
        $qty = Redis::hget($this->cartKey(), $id);

        if ($qty <= 1) {
            Redis::hdel($this->cartKey(), $id);
        } else {
            Redis::hincrby($this->cartKey(), $id, -1);
        }

        $this->loadCart();
    }

    public function remove($id)
    {
        Redis::hdel($this->cartKey(), $id);
        $this->loadCart();
    }

    protected function calculateTotal()
    {
        // временно: 1 товар = 500
        $this->total = array_sum($this->items) * 500;
    }

    protected function cartKey(): string
    {
        return 'cart:' . session()->getId();
    }

    public function render()
    {
        return view('livewire.cart.⚡cart');
    }
}
