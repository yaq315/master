<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use Carbon\Carbon;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $reviews = [
            [
                'user_id' => 3,
                'product_id' => 1,
                'rating' => 5,
                'comment' => 'Beautiful plant, adds life to my room!',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 4,
                'product_id' => 1,
                'rating' => 4,
                'comment' => 'Easy to care for, great for indoors.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 5,
                'product_id' => 10,
                'rating' => 5,
                'comment' => 'Perfect outdoor plant, grew fast.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 6,
                'product_id' => 15,
                'rating' => 4,
                'comment' => 'Strong shovel, helped with my garden.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 7,
                'product_id' => 20,
                'rating' => 5,
                'comment' => 'This fertilizer really helped my soil.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}
