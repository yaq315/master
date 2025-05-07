<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Requests\SearchProductsRequest;
use App\Http\Controllers\Controller;


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

        // Apply filters (from the model)
        $filters = $request->only(['category', 'price_min', 'price_max', 'tags', 'name', 'is_featured', 'is_hot', 'is_on_sale']);
        $products = Product::filter($filters)->paginate($request->per_page ?? 9);

        return ProductResource::collection($products);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json([
            'id' => $product->id,
            'name' => $product->name,
            'image' => asset('storage/'.$product->image), // سيولد http://127.0.0.1:8000/storage/products/montasera.jpeg
            // ... باقي الحقول
        ]);
    }

    public function getProducts()
{
    $products = Product::all()->map(function ($product) {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'image' => asset('storage/' . $product->image), // إرجاع رابط كامل
        ];
    });

    return response()->json(['products' => $products]);
}
}
