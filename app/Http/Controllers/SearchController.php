<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel; // Giả sử bạn có model Hotel

class SearchController extends Controller
{
    //
    public function index(Request $request)
    {
        // Validate input
        $request->validate([
            'hotel_name' => 'nullable|string',
            'location' => 'nullable|integer|exists:locations,id',
            'daterange' => 'nullable|string',
            'adults' => 'nullable|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'rooms' => 'nullable|integer|min:1',
        ]);

        // Lấy dữ liệu từ request
        $hotel_name = $request->input('hotel_name');
        $location_id = $request->input('location');
        $daterange = $request->input('daterange');
        $adults = $request->input('adults', 1);
        $children = $request->input('children', 0);
        $rooms = $request->input('rooms', 1);

        $query = Hotel::query();

        if ($location_id) {
            $query->where('location_id', $location_id);
        }

        $hotels = $query->get();

        return view('search_result', compact('hotels', 'hotel_name', 'location'));
    }


}
