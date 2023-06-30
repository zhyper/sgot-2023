<?php

namespace App\Http\Controllers;

use App\Models\HomeSlide;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //

    public function slides(Request $request){
        $slides = HomeSlide::with('slides')->get();
        return response()->json($slides);
    }
}
