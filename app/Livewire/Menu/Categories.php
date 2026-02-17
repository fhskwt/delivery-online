<?php

namespace App\Livewire\Menu;

use Livewire\Component;

class Categories extends Component
{
    public $active;

    protected $queryString = ['active' => ['as' => 'category']];

    public function mount()
    {
        $this->active = request('category');
    }

    public function select($slug)
    {
        $this->active = $slug;
        $this->dispatch('categoryChanged', $slug);
    }

    public function render()
    {
        return view('livewire.menu.⚡categories', [
            'categories' => [
                ['name' => 'Завтраки', 'slug' => 'breakfast'],
                ['name' => 'Обеды', 'slug' => 'lunch'],
                ['name' => 'Ужины', 'slug' => 'dinner'],
            ]
        ]);
    }
}
