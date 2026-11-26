<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('public.home', [
            'categories' => Category::query()
                ->withCount('products')
                ->orderBy('name')
                ->get(),
            'products' => Product::query()
                ->with('category')
                ->orderByDesc('is_featured')
                ->latest()
                ->get(),
        ]);
    }
}
