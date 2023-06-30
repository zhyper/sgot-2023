<?php

namespace App\Http\Controllers;

use App\Models\HomeSlide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    //
    public function HomeSlide(){
        $homeslide = HomeSlide::find(1);
        return view('frontend.index', compact('homeslide'));
    }
}
