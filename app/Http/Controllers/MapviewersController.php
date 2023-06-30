<?php

namespace App\Http\Controllers;

use App\Models\Mapviewer;
use Illuminate\Http\Request;

class MapviewersController extends Controller
{
    //
    public function mapviewers(){

        $titulo = 'TITLE';
        $viewers = Mapviewer::all();

        return view('frontend.mapviewers.index', compact('viewers','titulo'));

    }

    public function mapa(Request $request){


        $mapData = $request->idmap;


        return view('frontend.mapviewers.mapMAPZPUPDU20132023', compact('mapData'));
    }
}
