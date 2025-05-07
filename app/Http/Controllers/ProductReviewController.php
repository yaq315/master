<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ProductReviewController extends Controller
{
    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in first.');
        }
    
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000'
        ]);
    
        try {
            Review::create([
                'user_id' => auth()->id(),
                'product_id' => $validated['product_id'],
                'rating' => $validated['rating'],
                'comment' => $validated['comment']
            ]);
    
            return redirect()->back()->with('success', 'Review submitted successfully!');
        } catch (\Exception $e) {
            \Log::error('Failed to save review: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while saving the review.');
        }
    }
    
    
}