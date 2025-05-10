<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        
        // Path to your external images directory
        $externalImagePath = 'C:\Users\Orange\Desktop\image\products'; // Update this path
        
        // Get all image files from the external directory
        $files = [];
        if (File::exists($externalImagePath)) {
            $files = collect(File::files($externalImagePath))
                ->filter(function ($file) {
                    return in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'gif']);
                })
                ->map(function ($file) {
                    return $file->getFilename();
                })
                ->toArray();
        }
        
        return view('admin.products.create', compact('categories', 'files'));
    }
public function store(Request $request)
{
    // 1. Validate incoming request data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'category_slug' => 'required|exists:categories,slug',
        'image' => 'nullable|string',
        'stock' => 'required|integer|min:0',
    ]);

    // 2. Log incoming data for debugging
    \Log::debug('Received Data:', $request->all());

    try {
        // 3. Check if image exists in external directory
        $externalImagePath = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, 'C:/Users/Orange/Desktop/image/products/' . $validated['image']);
        if (!file_exists($externalImagePath)) {
            \Log::error('Image not found: ' . $externalImagePath);
            return back()->with('error', 'Image not found in the specified path')->withInput();
        }

        // 4. Copy the image to storage
        $storagePath = 'products/' . $validated['image'];
        $copyResult = Storage::disk('public')->put($storagePath, file_get_contents($externalImagePath));

        if (!$copyResult) {
            \Log::error('Failed to copy image to storage');
            return back()->with('error', 'Failed to save the image')->withInput();
        }

        // 5. Prepare product data
        $productData = [
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'original_price' => $request->input('original_price', null),
            'stock' => $validated['stock'],
            'category_id' => Category::where('slug', $validated['category_slug'])->first()->id,
            'image' => $request->image ? $storagePath : null,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'is_featured' => $request->has('is_featured') ? 1 : 0,
            'care_instructions' => $request->input('care_instructions', ''),
            'usage' => $request->input('usage', ''),
        ];

        \Log::debug('Attempting to create product with:', $productData);

        // 6. Create the product
        $product = Product::create($productData);

        \Log::info('Product created successfully', ['id' => $product->id]);

        return redirect()->route('admin.products.index')
               ->with('success', 'Product added successfully!');

    } catch (\Exception $e) {
        \Log::error('Product creation failed: ' . $e->getMessage(), [
            'exception' => $e,
            'trace' => $e->getTraceAsString()
        ]);
        return back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
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
            'care_instructions' => 'nullable|string',
            'usage' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_slug' => 'required|exists:categories,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
        ]);

        $updateData = [
            'name' => $validated['name'],
            'description' => $validated['description'],
            'care_instructions' => $validated['care_instructions'],
            'usage' => $validated['usage'],
            'price' => $validated['price'],
            'original_price' => $validated['original_price'],
            'stock' => $validated['stock'],
            'category_id' => Category::where('slug', $validated['category_slug'])->value('id'),
            'is_active' => $request->has('is_active'),
            'is_featured' => $request->has('is_featured'),
        ];

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
            $imagePath = $request->file('image')->store('products', 'public');
            $updateData['image'] = $imagePath;
        }

        $product->update($updateData);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        Storage::disk('public')->delete($product->image);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
