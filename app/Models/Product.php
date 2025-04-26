<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
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

    /**
     * Apply filters to the product query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter(Builder $query, array $filters): Builder
    {
        // Filter by category
        if (!empty($filters['category'])) {
            $query->where('category_id', $filters['category']);
        }

        // Filter by price range
        if (!empty($filters['price_min']) && !empty($filters['price_max'])) {
            $query->whereBetween('price', [$filters['price_min'], $filters['price_max']]);
        }

        // Filter by tags (assuming a many-to-many relationship)
        if (!empty($filters['tags'])) {
            $query->whereHas('tags', function ($q) use ($filters) {
                $q->whereIn('id', $filters['tags']);
            });
        }

        // Filter by name (example)
        if (!empty($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        // Filter by featured products (if applicable)
        if (isset($filters['is_featured'])) {
            $query->where('is_featured', $filters['is_featured']);
        }

        // Filter by hot products (if applicable)
        if (isset($filters['is_hot'])) {
            $query->where('is_hot', $filters['is_hot']);
        }

        // Filter by on sale products (if applicable)
        if (isset($filters['is_on_sale'])) {
            $query->where('is_on_sale', $filters['is_on_sale']);
        }

        return $query;
    }
}
