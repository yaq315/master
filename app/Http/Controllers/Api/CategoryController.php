<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
class CategoryController extends Controller
{
    // عرض كل التصنيفات المفعّلة فقط
    public function index()
    {
        $categories = Category::where('is_active', true)->get();
        return CategoryResource::collection($categories);
    }

    // عرض تصنيف محدد حسب ID
    public function show($id)
    {
        $category = Category::where('is_active', true)->findOrFail($id);
        return new CategoryResource($category);
    }
 public function products(Category $category)
    {
        // Eager load products relationship with proper error handling
        try {
            $products = $category->products()
                ->where('is_active', true)
                ->get();
                
            return ProductResource::collection($products);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error loading products',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
