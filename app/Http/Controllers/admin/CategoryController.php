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
    $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|unique:categories,slug',
    ]);

    try {
        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.categories.index')
               ->with('success', 'Category created successfully!');
    } catch (\Exception $e) {
        return back()->with('error', 'Error: '.$e->getMessage())
               ->withInput();
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
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'parent_id' => 'nullable|exists:categories,id',
            'is_active' => 'nullable|boolean',
        ]);

        try {
            $categoryData = [
                'name' => $validated['name'],
                'slug' => $validated['slug'],
                'description' => $validated['description'],
                'parent_id' => $validated['parent_id'],
                'is_active' => $validated['is_active'] ?? $category->is_active,
            ];

            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($category->image);
                $imagePath = $request->file('image')->store('categories', 'public');
                $categoryData['image'] = $imagePath;
            }

            $category->update($categoryData);

            return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
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

    public function deleteImage(Category $category)
{
    if ($category->image) {
        Storage::disk('public')->delete($category->image);
        $category->update(['image' => null]);
        return back()->with('success', 'Image deleted successfully');
    }
    
    return back()->with('error', 'No image to delete');
}
}
