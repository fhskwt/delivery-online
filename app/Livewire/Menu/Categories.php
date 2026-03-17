<?php

namespace App\Livewire\Menu;

use AllowDynamicProperties;
use App\Models\Category;
use Livewire\Component;

#[AllowDynamicProperties]
class Categories extends Component
{
    public $active;
    public $categories;

    protected $queryString = ['active' => ['as' => 'category']];

    public function mount(): void
    {
        // берём все активные категории
        $this->categories = Category::where('is_active', true)->get();
    }

    public function select($slug): void
    {
        $this->active = $slug;
        $this->dispatch('categoryChanged', $slug);
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return view('livewire.menu.⚡categories');
    }
}
