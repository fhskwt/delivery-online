<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $products = Product::latest()->take(8)->get();

        return view('pages.home.index', [
            'products' => Product::where('is_active', true)->latest()->take(8)->get(),
            'categories' => Category::where('is_active', true)->get()
        ]);
    }
}
