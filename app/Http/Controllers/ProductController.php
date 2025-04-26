<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\SearchProductsRequest;

class ProductController extends Controller
{
    public function index(SearchProductsRequest $request)
    {
        $query = Product::query()->with('category');

        // Check if filtering by category
        if ($request->has('category')) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // Apply Sorting
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'popular':
                default:
                    $query->orderBy('id', 'desc'); // Assume id descending is popular for now
                    break;
            }
        }

        $products = $query->paginate($request->per_page ?? 9);

        $categories = Category::all();

        return view('shop', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        $relatedProducts = Product::where('category_id', $product->category_id)
                                  ->where('id', '!=', $product->id)
                                  ->inRandomOrder()
                                  ->limit(4)
                                  ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }
}
