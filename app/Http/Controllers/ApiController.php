<?php

namespace App\Http\Controllers;

use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //

    public function slides(Request $request){
        $slides = HomeSlide::with('slides')->get();
        return response()->json($slides);
    }

    public function tablas(Request $request){

        $users = DB::table('divi_lote')
        // ->selectRaw('count(*) as user_count, status')
        ->selectRaw('id, iddpto, dpto, prov')
        //->where('status', '<>', 1)
        //->groupBy('status')
        ->get();

        return response()->json($users);
    }



}
