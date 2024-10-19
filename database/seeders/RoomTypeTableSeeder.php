<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       RoomType::insert([
            [
                'hotel_id' => 1,
                'name' => 'Phòng Đơn',
            ],
            [
                'hotel_id' => 1,
                'name' => 'Phòng Đôi',
            ],
            [
                'hotel_id' => 2,
                'name' => 'Phòng Gia Đình',
            ],
            [
                'hotel_id' => 2,
                'name' => 'Phòng Sang Trọng',
            ],
            [
                'hotel_id' => 3,
                'name' => 'Phòng Superior',
            ],
            [
                'hotel_id' => 3,
                'name' => 'Phòng Executive',
            ],
            [
                'hotel_id' => 4,
                'name' => 'Phòng Deluxe',
            ],
            [
                'hotel_id' => 4,
                'name' => 'Phòng Kinh Tế',
            ],
            [
                'hotel_id' => 5,
                'name' => 'Phòng Cổ Điển',
            ],
            [
                'hotel_id' => 5,
                'name' => 'Phòng Hiện Đại',
            ],
        ]);
    }
}
