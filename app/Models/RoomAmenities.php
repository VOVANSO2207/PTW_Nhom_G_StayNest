<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomAmenities extends Model
{
    use HasFactory;
    protected $table = 'room_amenities';


     // Một tiện nghi thuộc về một phòng
     public function room()
     {  
         return $this->belongsTo(Rooms::class, 'room_id');
     }
}
