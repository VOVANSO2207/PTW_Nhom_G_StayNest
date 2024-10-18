<?php

namespace Database\Seeders;

use App\Models\Rooms;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rooms::insert([
            [
                'hotel_id' => 1,
                'price' => 150.00,
                'discount_percent' => 10,
                'capacity' => 2,
                'description' => 'Phòng Deluxe với tầm nhìn ra biển tại Đà Nẵng.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_id' => 1,
                'price' => 100.00,
                'discount_percent' => 5,
                'capacity' => 3,
                'description' => 'Phòng tiêu chuẩn với tầm nhìn ra thành phố Đà Nẵng.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_id' => 2,
                'price' => 200.00,
                'discount_percent' => 15,
                'capacity' => 4,
                'description' => 'Phòng gia đình có hai giường tại Hà Nội.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_id' => 2,
                'price' => 250.00,
                'discount_percent' => 20,
                'capacity' => 5,
                'description' => 'Phòng sang trọng với dịch vụ spa tại Hà Nội.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_id' => 3,
                'price' => 120.00,
                'discount_percent' => 10,
                'capacity' => 2,
                'description' => 'Phòng ấm cúng có bữa sáng tại Hồ Chí Minh.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_id' => 3,
                'price' => 180.00,
                'discount_percent' => 25,
                'capacity' => 3,
                'description' => 'Phòng Superior với ban công tại Hồ Chí Minh.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_id' => 4,
                'price' => 220.00,
                'discount_percent' => 30,
                'capacity' => 2,
                'description' => 'Phòng Penthouse với tầm nhìn toàn cảnh tại Nha Trang.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_id' => 4,
                'price' => 140.00,
                'discount_percent' => 5,
                'capacity' => 4,
                'description' => 'Phòng kinh tế dành cho khách du lịch tại Nha Trang.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_id' => 5,
                'price' => 175.00,
                'discount_percent' => 15,
                'capacity' => 3,
                'description' => 'Phòng hiện đại có Wi-Fi miễn phí tại Đà Lạt.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_id' => 5,
                'price' => 210.00,
                'discount_percent' => 20,
                'capacity' => 2,
                'description' => 'Phòng Executive có không gian làm việc tại Đà Lạt.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
