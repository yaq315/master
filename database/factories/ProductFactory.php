<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(10, 100),
            'original_price' => $this->faker->numberBetween(100, 150),
            'image' => 'products/'.$this->faker->image('public/storage/products', 400, 400, 'nature', false),
            'images' => json_encode([
                'products/'.$this->faker->image('public/storage/products', 400, 400, 'nature', false),
                'products/'.$this->faker->image('public/storage/products', 400, 400, 'nature', false)
            ]),
            'is_featured' => $this->faker->boolean(20),
            'is_hot' => $this->faker->boolean(20),
            'is_on_sale' => $this->faker->boolean(30),
            'stock' => $this->faker->numberBetween(0, 100),
            'category_id' => Category::factory(),
        ];
    }
}