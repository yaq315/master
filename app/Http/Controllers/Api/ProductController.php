<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ProductResource;
use App\Http\Requests\SearchProductsRequest;
use App\Http\Controllers\Controller;



class ProductController extends Controller
{

    
    public function getImages()
    {
        $images = Storage::files('storage/app/public/categories'); // Get list of images in the 'public/images' directory
        $imageUrls = array_map(fn($image) => Storage::url($image), $images);  // Generate full URLs
        return response()->json(['images' => $imageUrls]);
    }

    
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
        $filters = $request->only(['category','category_id', 'price_min', 'price_max', 'tags', 'name', 'is_featured', 'is_hot', 'is_on_sale']);
        $products = Product::filter($filters)->paginate($request->per_page ?? 63);

        return ProductResource::collection($products);
    }

 public function show($id)
{
    $product = Product::findOrFail($id);

    return response()->json([
        'data' => [
            'id' => $product->id,
            'name' => $product->name,
            'slug' => $product->slug,
            'description' => $product->description,
            'care_instructions' => $product->care_instructions,
            'usage' => $product->usage,
            'price' => $product->price,
            'original_price' => $product->original_price,
            'image' => url(asset('storage/' . $product->image)),
            'is_featured' => $product->is_featured,
            'is_hot' => $product->is_hot,
            'is_on_sale' => $product->is_on_sale,
            'stock' => $product->stock,
            
        ]
    ]);
}


    public function getProducts()
{
    $products = Product::all()->map(function ($product) {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'image' => url(asset('storage/products/' . $product->image)), // إرجاع رابط كامل
        ];
    });

    return response()->json(['products' => $products]);
}


}
