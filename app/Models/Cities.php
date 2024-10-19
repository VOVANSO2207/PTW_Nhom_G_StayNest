<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Cities extends Model
{
    use HasFactory;
    protected $table = 'cities'; // Đảm bảo rằng Laravel biết bảng này tên là 'cities'
    protected $primaryKey = 'city_id'; // Đặt khóa chính nếu không phải là 'id'
    public $timestamps = false; // Nếu không có các cột created_at và updated_at
}
