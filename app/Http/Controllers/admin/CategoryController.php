<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|unique:categories,slug',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'nullable|string',
        'is_active' => 'nullable|boolean',
    ]);

    try {
        $categoryData = [
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'description' => $validated['description'],
            'is_active' => $request->boolean('is_active'), // This properly converts to boolean
        ];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $categoryData['image'] = $imagePath;
        }

        Category::create($categoryData);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully!');
    } catch (\Exception $e) {
        return back()->with('error', 'An error occurred: ' . $e->getMessage());
    }
}

    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

public function update(Request $request, Category $category)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|unique:categories,slug,' . $category->id,
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'nullable|string',
        'is_active' => 'nullable|boolean',
    ]);

    try {
        $updateData = [
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'description' => $validated['description'],
            'is_active' => $request->boolean('is_active'), // Proper boolean conversion
        ];

        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $updateData['image'] = $request->file('image')->store('categories', 'public');
        }

        $category->update($updateData);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
    } catch (\Exception $e) {
        return back()->with('error', 'An error occurred: ' . $e->getMessage());
    }
}
    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
    }

    public function dashboard()
{
    $categories = Category::select('name', 'image', 'is_active')
                         ->withCount('products') // إذا كنت تريد عدد المنتجات في كل فئة
                         ->get();
    
    return view('admin.dashboard', compact('categories'));
}

// public function deleteImage(Category $category)
// {
//     if ($category->image) {
//         Storage::disk('public')->delete($category->image);
//         $category->update(['image' => null]);
//         return back()->with('success', 'Image deleted successfully');
//     }
//     return back()->with('error', 'No image to delete');
// }

}
