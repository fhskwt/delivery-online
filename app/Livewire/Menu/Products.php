<?php

namespace App\Livewire\Menu;

use Livewire\Component;

class Products extends Component
{
    public $category;

    protected $listeners = ['categoryChanged'];

    public function mount(): void
    {
        $this->category = request('category');
    }

    public function categoryChanged($slug): void
    {
        $this->category = $slug;
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        // временно мок
        return view('livewire.menu.⚡products', [
            'products' => range(1, 8),
        ]);
    }
}
