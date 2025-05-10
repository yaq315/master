<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Indoor Plants',
                'slug' => 'indoor-plants',
                'description' => 'A beautiful collection of indoor decorative plants.',
                'image' => 'categories/indoor.jpeg',
                'is_active' => true,
            ],
            [
                'name' => 'Outdoor Plants',
                'slug' => 'outdoor-plants',
                'description' => 'Strong and attractive plants for outdoor spaces.',
                'image' => 'categories/outdoor.jpeg',
                'is_active' => true,
            ],
            [
                'name' => 'Gardening Tools',
                'slug' => 'gardening-tools',
                'description' => 'Essential gardening tools and accessories.',
                'image' => 'categories/tools.jpeg',
                'is_active' => true,
            ],
            [
                'name' => 'Soil & Fertilizers',
                'slug' => 'soil-fertilizers',
                'description' => 'Different types of soils and fertilizers for healthy plants.',
                'image' => 'categories/soil.jpeg',
                'is_active' => true,
            ],
            
            [
                'name' => 'Seeds',
                'slug' => 'seeds',
                'description' => 'A variety of vegetable, herb, and flower seeds for your garden.',
                'image' => 'categories/seeds.jpeg',
                'is_active' => true,
            ],
            
        
            [
                'name' => 'Pots',
                'slug' => 'pots',
                'description' => 'A variety of pots and planters for your plants.',
                'image' => 'categories/clay-pots.jpeg',
                'is_active' => true,
            ],

            [
                'name' => 'Kids Gardening',
                'slug' => 'kids-gardening',
                'description' => 'Fun and safe gardening products for children.',
                'image' => 'categories/kids.jpeg',
                'is_active' => true,
            ],
            
        ];

        foreach ($categories as $categoryData) {
            Category::create([
                'name' => $categoryData['name'],
                'slug' => Str::slug($categoryData['name']),
                'description' => $categoryData['description'],
                'image' => $categoryData['image'],
                'is_active' => $categoryData['is_active'],
            ]);
        }
    }
}
