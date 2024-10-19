<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel; // Giả sử bạn có model Hotel

class SearchController extends Controller
{
    //
    public function index(Request $request)
    {
        $hotels = Hotel::all();
        return view('search_result', compact('hotels'));
    }
}
