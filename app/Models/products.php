<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'price', 'original_price', 
        'image', 'images', 'is_featured', 'is_hot', 'is_on_sale', 
        'stock', 'category_id'
    ];

    protected $casts = [
        'images' => 'array',
        'is_featured' => 'boolean',
        'is_hot' => 'boolean',
        'is_on_sale' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query, array $filters)
{
    $query->when($filters['category'] ?? false, fn($query, $category) =>
        $query->whereHas('category', fn($query) =>
            $query->where('slug', $category)
        )
    );
    
    $query->when($filters['search'] ?? false, fn($query, $search) =>
        $query->where(fn($query) =>
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
        )
    );
    
    $query->when($filters['sort'] ?? false, function ($query, $sort) {
        if ($sort === 'popular') {
            // يمكنك تعديل هذا بناءً على نظام التقييمات أو المبيعات
            $query->orderBy('created_at', 'desc');
        } elseif ($sort === 'newest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($sort === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'price_desc') {
            $query->orderBy('price', 'desc');
        }
    });
}

public function scopeFeatured($query)
{
    return $query->where('is_featured', true);
}

public function scopeHot($query)
{
    return $query->where('is_hot', true);
}

public function scopeOnSale($query)
{
    return $query->where('is_on_sale', true);
}

}