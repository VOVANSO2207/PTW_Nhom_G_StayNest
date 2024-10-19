<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function viewRoom()
    {
        return view('admin.room');
    }

    public function roomAdd()
    {
        return view('admin.room_add');
    }
}
