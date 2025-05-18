<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use HasFactory;

 protected $fillable = [
    'name',
    'description',
    'price',
    'original_price',
    'stock',
    'category_id',
    'image',
    'is_active',
    'is_featured',
    'care_instructions',
    'usage'
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
   public function scopeFilter($query, $filters)
{
    if (isset($filters['category'])) {
        $category = Category::where('slug', $filters['category'])->first();
        if ($category) {
            $query->where('category_id', $category->id);
        }
    }

    if (isset($filters['category_id'])) {
        $query->where('category_id', $filters['category_id']);
    }

    if (isset($filters['price_min'])) {
        $query->where('price', '>=', $filters['price_min']);
    }

    if (isset($filters['price_max'])) {
        $query->where('price', '<=', $filters['price_max']);
    }

    if (isset($filters['name'])) {
        $query->where('name', 'like', '%' . $filters['name'] . '%');
    }

    if (isset($filters['is_featured'])) {
        $query->where('is_featured', $filters['is_featured']);
    }

    if (isset($filters['is_hot'])) {
        $query->where('is_hot', $filters['is_hot']);
    }

    if (isset($filters['is_on_sale'])) {
        $query->where('is_on_sale', $filters['is_on_sale']);
    }
}

    public function reviews()
{
    return $this->hasMany(Review::class);
}

public function cartItems()
{
    return $this->hasMany(CartItem::class);
}

protected static function boot()
{
    parent::boot();

    static::creating(function ($product) {
        $product->slug = \Illuminate\Support\Str::slug($product->name);
    });
}
}
