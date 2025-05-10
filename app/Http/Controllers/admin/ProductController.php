<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        $categories = Category::all();
        return view('admin.products.index', compact('products', 'categories'));
    }
public function create()
{
    $categories = Category::all();
    return view('admin.products.create', compact('categories'));
}

public function store(Request $request)
{
    // 1. Validate the input data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'original_price' => 'nullable|numeric|min:0',
        'category_slug' => 'required|exists:categories,slug',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        'stock' => 'required|integer|min:0',
        'is_active' => 'sometimes|boolean',
        'is_featured' => 'sometimes|boolean',
        'care_instructions' => 'nullable|string',
        'usage' => 'nullable|string',
    ]);

    try {
        // 2. Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::slug($validatedData['name']) . '-' . time() . '.' . $image->extension();
            $imagePath = $image->storeAs('products', $imageName, 'public');
        }

        // 3. Get category_id from slug
        $category = Category::where('slug', $validatedData['category_slug'])->firstOrFail();

        // 4. Create the product
        $product = Product::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'original_price' => $validatedData['original_price'] ?? null,
            'stock' => $validatedData['stock'],
            'category_id' => $category->id,
            'image' => $imagePath,
            'is_active' => $request->boolean('is_active'),
            'is_featured' => $request->boolean('is_featured'),
            'care_instructions' => $validatedData['care_instructions'] ?? null,
            'usage' => $validatedData['usage'] ?? null,
        ]);

        // 5. Redirect with success message
        return redirect()->route('admin.products.index')
               ->with('success', 'Product added successfully!');

    } catch (\Exception $e) {
        // 6. Handle exceptions
        \Log::error('Error creating product: ' . $e->getMessage());

        return back()->withInput()
               ->with('error', 'An error occurred while adding the product: ' . $e->getMessage());
    }
}


    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_slug' => 'required|exists:categories,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required|integer|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'care_instructions' => 'nullable|string',
            'usage' => 'nullable|string',
        ]);

        try {
            $updateData = [
                'name' => $validated['name'],
                'description' => $validated['description'],
                'price' => $validated['price'],
                'original_price' => $validated['original_price'],
                'stock' => $validated['stock'],
                'category_id' => Category::where('slug', $validated['category_slug'])->value('id'),
                'is_active' => $request->boolean('is_active'),
                'is_featured' => $request->boolean('is_featured'),
                'care_instructions' => $validated['care_instructions'],
                'usage' => $validated['usage'],
            ];

            // Handle image update
            if ($request->hasFile('image')) {
                // Delete old image
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }
                
                // Store new image
                $updateData['image'] = $request->file('image')->store('products', 'public');
            }

            $product->update($updateData);

            return redirect()->route('admin.products.index')
                   ->with('success', 'Product updated successfully!');

        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(Product $product)
    {
        try {
            // Delete product image if exists
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            
            $product->delete();
            
            return redirect()->route('admin.products.index')
                   ->with('success', 'Product deleted successfully!');
                   
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}