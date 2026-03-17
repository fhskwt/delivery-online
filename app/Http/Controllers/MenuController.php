<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class MenuController extends Controller
{
    public function index(): View
    {
        return view('pages.menu.index', [
            'products' => Product::where('is_active', true)->get(),
            'categories' => Category::where('is_active', true)->get()
        ]);
    }

    public function category(string $slug): View
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $products = Product::where('category_id', $category->id)
            ->where('is_active', true)
            ->get();

        return view('pages.menu.index', [
            'products' => $products,
            'categories' => Category::all(),
            'currentCategory' => $category
        ]);
    }
}
