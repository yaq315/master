<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            // 🪴 Indoor Plants
           // 🪴 Indoor Plants
[
    'name' => 'Monstera Deliciosa',
    'description' => 'A beautiful tropical plant perfect for home decoration.',
    'price' => 18.00,
    'original_price' => 22.00,
    'image' => 'products/montasera.jpeg',
    'stock' => 20,
    'category_slug' => 'indoor-plants',
],
[
    'name' => 'Peace Lily',
    'description' => 'An elegant indoor plant with white flowers.',
    'price' => 14.00,
    'original_price' => 17.00,
    'image' => 'products/peace-lily.jpeg',
    'stock' => 15,
    'category_slug' => 'indoor-plants',
],
[
    'name' => 'Snake Plant',
    'description' => 'Low maintenance indoor plant perfect for beginners.',
    'price' => 12.00,
    'original_price' => 15.00,
    'image' => 'products/snake-plant.jpeg',
    'stock' => 25,
    'category_slug' => 'indoor-plants',
],
[
    'name' => 'Fiddle Leaf Fig',
    'description' => 'Elegant indoor tree for homes and offices.',
    'price' => 20.00,
    'original_price' => 25.00,
    'image' => 'products/fiddle-leaf-fig.webp',
    'stock' => 20,
    'category_slug' => 'indoor-plants',
],
[
    'name' => 'Pothos',
    'description' => 'Trailing plant perfect for hanging baskets.',
    'price' => 7.00,
    'original_price' => 10.00,
    'image' => 'products/pothos.jpeg',
    'stock' => 30,
    'category_slug' => 'indoor-plants',
],
[
    'name' => 'Spider Plant',
    'description' => 'Low maintenance and air purifying plant.',
    'price' => 6.50,
    'original_price' => 9.00,
    'image' => 'products/spider-plant.jpeg',
    'stock' => 25,
    'category_slug' => 'indoor-plants',
],
[
    'name' => 'ZZ Plant',
    'description' => 'An easy-care indoor plant perfect for low light.',
    'price' => 15.00,
    'original_price' => 18.00,
    'image' => 'products/zz-plant.jpeg',
    'stock' => 20,
    'category_slug' => 'indoor-plants',
],
[
    'name' => 'Aloe Vera',
    'description' => 'Medicinal plant with beautiful thick leaves.',
    'price' => 5.00,
    'original_price' => 8.00,
    'image' => 'products/aloe-vera.jpeg',
    'stock' => 25,
    'category_slug' => 'indoor-plants',
],
[
    'name' => 'Chinese Evergreen',
    'description' => 'Attractive foliage perfect for home decoration.',
    'price' => 12.00,
    'original_price' => 16.00,
    'image' => 'products/chinese-evergreen.jpeg',
    'stock' => 18,
    'category_slug' => 'indoor-plants',
],

            
            
        
           // 🌳 Outdoor Plants
[
    'name' => 'Lemon Tree',
    'description' => 'A small lemon tree ideal for gardens and balconies.',
    'price' => 25.00,
    'original_price' => 32.00,
    'image' => 'products/lemon-tree.jpg',
    'stock' => 10,
    'category_slug' => 'outdoor-plants',
],
[
    'name' => 'Rose Bush',
    'description' => 'Classic red rose bush for your outdoor space.',
    'price' => 10.00,
    'original_price' => 14.00,
    'image' => 'products/rose-bush.jpeg',
    'stock' => 18,
    'category_slug' => 'outdoor-plants',
],
[
    'name' => 'Lavender Plant',
    'description' => 'A fragrant lavender plant for your garden.',
    'price' => 8.00,
    'original_price' => 12.00,
    'image' => 'products/lavender.jpeg',
    'stock' => 12,
    'category_slug' => 'outdoor-plants',
],
[
    'name' => 'Bamboo Palm',
    'description' => 'Tropical outdoor plant ideal for shade.',
    'price' => 18.00,
    'original_price' => 24.00,
    'image' => 'products/bamboo-palm.webp',
    'stock' => 15,
    'category_slug' => 'outdoor-plants',
],
[
    'name' => 'Bougainvillea',
    'description' => 'Vibrant flowering plant for sunny gardens.',
    'price' => 12.00,
    'original_price' => 16.00,
    'image' => 'products/bougainvillea.jpg',
    'stock' => 10,
    'category_slug' => 'outdoor-plants',
],
[
    'name' => 'Hibiscus',
    'description' => 'Tropical beauty for your outdoor spaces.',
    'price' => 10.00,
    'original_price' => 14.00,
    'image' => 'products/hibiscus.jpeg',
    'stock' => 12,
    'category_slug' => 'outdoor-plants',
],
[
    'name' => 'Olive Tree',
    'description' => 'Mediterranean beauty, ideal for sunny spots.',
    'price' => 30.00,
    'original_price' => 40.00,
    'image' => 'products/olive-tree.jpg',
    'stock' => 12,
    'category_slug' => 'outdoor-plants',
],
[
    'name' => 'Lavender Shrub',
    'description' => 'Fragrant shrub perfect for gardens.',
    'price' => 9.00,
    'original_price' => 13.00,
    'image' => 'products/lavender-shrub.jpg',
    'stock' => 20,
    'category_slug' => 'outdoor-plants',
],
[
    'name' => 'Jasmine Plant',
    'description' => 'Beautiful and fragrant outdoor plant.',
    'price' => 12.00,
    'original_price' => 16.00,
    'image' => 'products/jasmine-plant.jpeg',
    'stock' => 15,
    'category_slug' => 'outdoor-plants',
],

            
            
          

          // 🛠️ Gardening Tools
[
    'name' => 'Pruning Shears',
    'description' => 'Essential tool for pruning and cutting plants.',
    'price' => 6.00,
    'original_price' => 8.00,
    'image' => 'products/pruning-shears.jpeg',
    'stock' => 30,
    'category_slug' => 'gardening-tools',
],
[
    'name' => 'Watering Can',
    'description' => 'A stylish and practical watering can.',
    'price' => 10.00,
    'original_price' => 13.00,
    'image' => 'products/watering-can.jpeg',
    'stock' => 22,
    'category_slug' => 'gardening-tools',
],
[
    'name' => 'Hand Shovel',
    'description' => 'Perfect tool for small gardening jobs.',
    'price' => 5.00,
    'original_price' => 7.00,
    'image' => 'products/hand-shovel.jpeg',
    'stock' => 25,
    'category_slug' => 'gardening-tools',
],
[
    'name' => 'Garden Gloves',
    'description' => 'Durable gloves for comfortable gardening.',
    'price' => 3.50,
    'original_price' => 5.00,
    'image' => 'products/garden-gloves.webp',
    'stock' => 50,
    'category_slug' => 'gardening-tools',
],
[
    'name' => 'Rake Tool',
    'description' => 'Ideal for clearing leaves and debris.',
    'price' => 8.00,
    'original_price' => 10.00,
    'image' => 'products/rake.jpeg',
    'stock' => 22,
    'category_slug' => 'gardening-tools',
],
[
    'name' => 'Plant Sprayer',
    'description' => 'Spray mist for delicate plants and seedlings.',
    'price' => 5.50,
    'original_price' => 8.00,
    'image' => 'products/plant-sprayer.jpeg',
    'stock' => 30,
    'category_slug' => 'gardening-tools',
],
[
    'name' => 'Hand Fork',
    'description' => 'Essential tool for loosening and turning soil.',
    'price' => 4.50,
    'original_price' => 6.50,
    'image' => 'products/hand-fork.jpeg',
    'stock' => 25,
    'category_slug' => 'gardening-tools',
],
[
    'name' => 'Garden Trowel',
    'description' => 'Perfect for digging small holes and planting.',
    'price' => 5.00,
    'original_price' => 7.00,
    'image' => 'products/garden-trowel.jpg',
    'stock' => 30,
    'category_slug' => 'gardening-tools',
],
[
    'name' => 'Pruning Saw',
    'description' => 'Ideal tool for cutting larger branches.',
    'price' => 12.00,
    'original_price' => 15.00,
    'image' => 'products/pruning-saw.jpeg',
    'stock' => 10,
    'category_slug' => 'gardening-tools',
],

            
            
           

          // 🌱 Soil & Fertilizers
[
    'name' => 'Organic Potting Soil (5 KG)',
    'description' => 'High-quality organic soil for potted plants. Bag contains approximately 5 kilograms.',
    'price' => 7.00,
    'original_price' => 9.00,
    'image' => 'products/organic-soil.jpeg',
    'stock' => 35,
    'category_slug' => 'soil-fertilizers',
],
[
    'name' => 'Cactus Soil Mix (2 KG)',
    'description' => 'Special soil blend for cactus and succulents. Bag contains approximately 2 kilograms.',
    'price' => 4.00,
    'original_price' => 6.00,
    'image' => 'products/cactus-soil.jpg',
    'stock' => 20,
    'category_slug' => 'soil-fertilizers',
],
[
    'name' => 'Natural Fertilizer (5 KG)',
    'description' => 'Boost your plant growth with natural fertilizer. Bag contains approximately 5 kilograms.',
    'price' => 9.00,
    'original_price' => 12.00,
    'image' => 'products/natural-fertilizer.jpg',
    'stock' => 18,
    'category_slug' => 'soil-fertilizers',
],
[
    'name' => 'Potting Mix Bag (3 KG)',
    'description' => 'Rich potting mix ideal for indoor plants. Bag contains approximately 3 kilograms.',
    'price' => 5.50,
    'original_price' => 7.50,
    'image' => 'products/potting-mix.jpeg',
    'stock' => 28,
    'category_slug' => 'soil-fertilizers',
],
[
    'name' => 'Vermicompost (5 KG)',
    'description' => 'Natural fertilizer made from earthworms. Bag contains approximately 5 kilograms.',
    'price' => 10.00,
    'original_price' => 13.00,
    'image' => 'products/vermicompost.jpeg',
    'stock' => 18,
    'category_slug' => 'soil-fertilizers',
],
[
    'name' => 'Cocopeat Brick (2.5 KG)',
    'description' => 'Eco-friendly growing medium for plants. Brick weight approximately 2.5 kilograms.',
    'price' => 4.50,
    'original_price' => 6.50,
    'image' => 'products/cocopeat-brick.jpeg',
    'stock' => 40,
    'category_slug' => 'soil-fertilizers',
],
[
    'name' => 'Perlite Bag (2 KG)',
    'description' => 'Lightweight soil additive for better drainage. Bag contains approximately 2 kilograms.',
    'price' => 5.00,
    'original_price' => 7.00,
    'image' => 'products/perlite-bag.jpeg',
    'stock' => 30,
    'category_slug' => 'soil-fertilizers',
],
[
    'name' => 'Bone Meal Fertilizer (2 KG)',
    'description' => 'Organic fertilizer for strong root growth. Bag contains approximately 2 kilograms.',
    'price' => 6.00,
    'original_price' => 8.00,
    'image' => 'products/bone-meal.jpeg',
    'stock' => 18,
    'category_slug' => 'soil-fertilizers',
],
[
    'name' => 'Organic Compost Mix (5 KG)',
    'description' => 'Premium quality compost to enrich your soil naturally. Bag contains approximately 5 kilograms.',
    'price' => 8.00,
    'original_price' => 11.00,
    'image' => 'products/organic-compost-mix.jpg',
    'stock' => 20,
    'category_slug' => 'soil-fertilizers',
],

            
          // 🌱 Seeds
[
    'name' => 'Sunflower Seeds (50g)',
    'description' => 'Grow bright and tall sunflowers easily at home. Packet contains approximately 50 grams.',
    'price' => 3.00,
    'original_price' => 4.00,
    'image' => 'products/sunflower-seeds.jpg',
    'stock' => 50,
    'category_slug' => 'seeds',
],
[
    'name' => 'Basil Seeds (20g)',
    'description' => 'Fresh basil seeds for aromatic herbs in your kitchen. Packet contains approximately 20 grams.',
    'price' => 2.00,
    'original_price' => 3.00,
    'image' => 'products/basil-seeds.jpg',
    'stock' => 40,
    'category_slug' => 'seeds',
],
[
    'name' => 'Tomato Seeds (30g)',
    'description' => 'High-yield tomato seeds for home gardens. Packet contains approximately 30 grams.',
    'price' => 2.50,
    'original_price' => 3.50,
    'image' => 'products/tomato-seeds.jpg',
    'stock' => 45,
    'category_slug' => 'seeds',
],
[
    'name' => 'Mint Seeds (20g)',
    'description' => 'Easy-to-grow mint seeds perfect for teas and dishes. Packet contains approximately 20 grams.',
    'price' => 2.00,
    'original_price' => 3.00,
    'image' => 'products/mint-seeds.jpg',
    'stock' => 35,
    'category_slug' => 'seeds',
],
[
    'name' => 'Carrot Seeds (30g)',
    'description' => 'Organic carrot seeds for a healthy vegetable garden. Packet contains approximately 30 grams.',
    'price' => 2.50,
    'original_price' => 4.00,
    'image' => 'products/carrot-seeds.jpg',
    'stock' => 30,
    'category_slug' => 'seeds',
],
[
    'name' => 'Pepper Seeds (25g)',
    'description' => 'Sweet and spicy pepper seeds for all tastes. Packet contains approximately 25 grams.',
    'price' => 2.50,
    'original_price' => 4.00,
    'image' => 'products/pepper-seeds.jpg',
    'stock' => 32,
    'category_slug' => 'seeds',
],
[
    'name' => 'Strawberry Seeds (20g)',
    'description' => 'Grow sweet strawberries right from your garden. Packet contains approximately 20 grams.',
    'price' => 3.50,
    'original_price' => 5.00,
    'image' => 'products/strawberry-seeds.jpg',
    'stock' => 25,
    'category_slug' => 'seeds',
],
[
    'name' => 'Lavender Seeds (20g)',
    'description' => 'Plant fragrant lavender flowers for relaxation and beauty. Packet contains approximately 20 grams.',
    'price' => 3.00,
    'original_price' => 4.00,
    'image' => 'products/lavender-seeds.jpg',
    'stock' => 28,
    'category_slug' => 'seeds',
],
[
    'name' => 'Cucumber Seeds (30g)',
    'description' => 'Crispy and fresh cucumber seeds for garden lovers. Packet contains approximately 30 grams.',
    'price' => 2.50,
    'original_price' => 4.00,
    'image' => 'products/cucumber-seeds.jpg',
    'stock' => 38,
    'category_slug' => 'seeds',
],

            // pots

[
    'name' => 'Clay Pot Medium Size',
    'description' => 'Classic medium-sized clay pot, perfect for all types of plants.',
    'price' => 4.00,  // السعر المعدل
    'original_price' => 6.00,  // السعر الأصلي
    'image' => 'products/clay-pot.jpeg',
    'stock' => 20,
    'category_slug' => 'pots',
],
[
    'name' => 'Large Ceramic Planter',
    'description' => 'Beautiful ceramic planter for large plants and indoor trees.',
    'price' => 8.00,  // السعر المعدل
    'original_price' => 12.00,  // السعر الأصلي
    'image' => 'products/ceramic-planter.jpeg',
    'stock' => 10,
    'category_slug' => 'pots',
],
[
    'name' => 'Hanging Pot Set',
    'description' => 'Set of 3 hanging pots for balconies and patios.',
    'price' => 6.00,  // السعر المعدل
    'original_price' => 8.00,  // السعر الأصلي
    'image' => 'products/hanging-pot.jpeg',
    'stock' => 12,
    'category_slug' => 'pots',
],
[
    'name' => 'Decorative Plastic Pot',
    'description' => 'Lightweight and colorful pot perfect for decorative plants.',
    'price' => 3.50,  // السعر المعدل
    'original_price' => 5.00,  // السعر الأصلي
    'image' => 'products/plastic-pot.jpeg',
    'stock' => 30,
    'category_slug' => 'pots',
],
[
    'name' => 'Modern Metal Planter',
    'description' => 'Stylish metal planter for modern interiors.',
    'price' => 10.00,  // السعر المعدل
    'original_price' => 15.00,  // السعر الأصلي
    'image' => 'products/metal-planter.jpeg',
    'stock' => 8,
    'category_slug' => 'pots',
],

[
    'name' => 'Terracotta Pot',
    'description' => 'Classic clay pot for any plant type.',
    'price' => 5.00,  // السعر المعدل
    'original_price' => 7.00,  // السعر الأصلي
    'image' => 'products/terracotta-pot.jpeg',
    'stock' => 40,
    'category_slug' => 'pots',
],
[
    'name' => 'Self-Watering Planter',
    'description' => 'Smart pot with a self-watering system.',
    'price' => 7.50,  // السعر المعدل
    'original_price' => 10.00,  // السعر الأصلي
    'image' => 'products/self-watering-planter.jpeg',
    'stock' => 20,
    'category_slug' => 'pots',
],


[
    'name' => 'Concrete Planter',
    'description' => 'Modern stylish planter for indoor & outdoor use.',
    'price' => 8.00,  // السعر المعدل
    'original_price' => 10.00,  // السعر الأصلي
    'image' => 'products/concrete-planter.jpeg',
    'stock' => 15,
    'category_slug' => 'pots',
],
  
[
    'name' => 'Hanging Basket',
    'description' => 'Perfect for small balconies and patios.',
    'price' => 5.00,  // السعر المعدل
    'original_price' => 7.00,  // السعر الأصلي
    'image' => 'products/hanging-basket.jpeg',
    'stock' => 25,
    'category_slug' => 'pots',
],



          // kids garden 

[
    'name' => 'Kids Mini Watering Can - Small Size',
    'description' => 'Colorful lightweight watering can perfect for little hands.',
    'price' => 4.00,  // السعر المعدل
    'original_price' => 6.00,  // السعر الأصلي
    'image' => 'products/kids-watering-can1.jpeg',
    'stock' => 30,
    'category_slug' => 'kids-gardening',
],

[
    'name' => 'Children Gardening Gloves',
    'description' => 'Soft and durable gloves to protect little gardeners.',
    'price' => 3.50,  // السعر المعدل
    'original_price' => 5.00,  // السعر الأصلي
    'image' => 'products/kids-gardening-gloves.jpeg',
    'stock' => 40,
    'category_slug' => 'kids-gardening',
],
[
    'name' => 'Kids Gardening Tool Set',
    'description' => 'A colorful mini tool set including shovel, rake, and trowel.',
    'price' => 8.00,  // السعر المعدل
    'original_price' => 12.00,  // السعر الأصلي
    'image' => 'products/kids-tool-set.jpeg',
    'stock' => 25,
    'category_slug' => 'kids-gardening',
],
[
    'name' => 'Flower Growing Kit for Kids',
    'description' => 'A complete kit for kids to grow their own flowers easily.',
    'price' => 10.00,  // السعر المعدل
    'original_price' => 12.00,  // السعر الأصلي
    'image' => 'products/kids-flower-growing-kit.jpeg',
    'stock' => 18,
    'category_slug' => 'kids-gardening',
],

[
    'name' => 'Kids Mini Watering Can',
    'description' => 'Colorful lightweight watering can perfect for little hands.',
    'price' => 4.00,  // السعر المعدل
    'original_price' => 6.00,  // السعر الأصلي
    'image' => 'products/kids-watering-can.jpeg',
    'stock' => 30,
    'category_slug' => 'kids-gardening',
],
[
    'name' => 'Mini Plant Pots for Kids',
    'description' => 'Set of colorful small pots designed for kids\' projects.',
    'price' => 6.00,  // السعر المعدل
    'original_price' => 8.00,  // السعر الأصلي
    'image' => 'products/kids-mini-pots.jpeg',
    'stock' => 30,
    'category_slug' => 'kids-gardening',
],
[
    'name' => 'Kids Grow Your Own Vegetables Kit',
    'description' => 'Fun vegetable growing kit to teach kids about gardening.',
    'price' => 8.00,  // السعر المعدل
    'original_price' => 10.00,  // السعر الأصلي
    'image' => 'products/kids-vegetable-growing-kit.jpeg',
    'stock' => 22,
    'category_slug' => 'kids-gardening',
],
[
    'name' => 'Paint Your Own Flower Pot Kit',
    'description' => 'Creative kit for kids to paint and customize flower pots.',
    'price' => 7.50,  // السعر المعدل
    'original_price' => 9.00,  // السعر الأصلي
    'image' => 'products/kids-paint-flower-pot.jpeg',
    'stock' => 20,
    'category_slug' => 'kids-gardening',
],

[
    'name' => 'Little Gardeners Starter Kit',
    'description' => 'Complete starter gardening kit perfect for young kids.',
    'price' => 10.00,  // السعر المعدل
    'original_price' => 12.00,  // السعر الأصلي
    'image' => 'products/kids-gardener-starter-kit.jpg',
    'stock' => 15,
    'category_slug' => 'kids-gardening',
],

            
            
            
        ];

        foreach ($products as $productData) {
            $category = Category::where('slug', $productData['category_slug'])->first();
            if ($category) {
                Product::create([
                    'name' => $productData['name'],
                    'slug' => Str::slug($productData['name']),
                    'description' => $productData['description'],
                    'price' => $productData['price'],
                    'original_price' => $productData['original_price'],
                    'image' => $productData['image'],
                    'is_featured' => rand(0, 1),
                    'is_hot' => rand(0, 1),
                    'is_on_sale' => rand(0, 1),
                    'stock' => $productData['stock'],
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
