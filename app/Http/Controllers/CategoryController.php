<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->get();
        return view('admin.dashboard', compact('categories'));
    }

    public function showHomePage()
    {
        // جلب أول 3 فئات مع عدد المنتجات لكل منها
        $categories = Category::withCount('products')
                             ->take(3)
                             ->get();

                              $products = Product::where('stock', '>', 0)
                        ->latest()
                        ->take(3)
                        ->get();

        
        return view('home', compact('categories', 'products'));
    }
}