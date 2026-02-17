<?php

namespace App\Livewire\Menu;

use Livewire\Component;

class Products extends Component
{
    public $category;

    protected $listeners = ['categoryChanged'];

    public function mount()
    {
        $this->category = request('category');
    }

    public function categoryChanged($slug)
    {
        $this->category = $slug;
    }

    public function render()
    {
        // временно мок
        return view('livewire.menu.⚡products', [
            'products' => range(1, 8),
        ]);
    }
}
