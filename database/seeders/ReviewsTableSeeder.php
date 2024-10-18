<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo mảng dữ liệu cho các đánh giá
        $reviews = [
            [   
                'hotel_id' => 1, // Khách sạn 1
                'user_id' => 1,  // Người dùng 1
                'rating' => 5, // Đánh giá 5 sao
                'comment' => 'Amazing experience! The staff was very friendly and the room was spacious.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_id' => 1,
                'user_id' => 2,
                'rating' => 4,
                'comment' => 'Great location, but the Wi-Fi could be better.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_id' => 2,
                'user_id' => 1,
                'rating' => 3,
                'comment' => 'Decent hotel for the price, but nothing special.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_id' => 2,
                'user_id' => 3,
                'rating' => 4,
                'comment' => 'Very clean and well-maintained. Would recommend!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_id' => 3,
                'user_id' => 4,
                'rating' => 2,
                'comment' => 'Not what I expected. The service was lacking.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_id' => 3,
                'user_id' => 5,
                'rating' => 5,
                'comment' => 'Fantastic stay! I loved everything about this hotel.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_id' => 4,
                'user_id' => 1,
                'rating' => 1,
                'comment' => 'Terrible experience. I will not return.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_id' => 4,
                'user_id' => 2,
                'rating' => 4,
                'comment' => 'Nice place but a bit noisy at night.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_id' => 5,
                'user_id' => 3,
                'rating' => 3,
                'comment' => 'Good for a quick stay, but I expected more amenities.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_id' => 5,
                'user_id' => 4,
                'rating' => 5,
                'comment' => 'I had a wonderful time! Highly recommend this hotel.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Chèn dữ liệu vào bảng reviews
        DB::table('reviews')->insert($reviews);
    }
}
