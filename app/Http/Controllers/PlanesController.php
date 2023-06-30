<?php

namespace App\Http\Controllers;

use App\Models\MapaPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanesController extends Controller
{
    //
    public function planes(){
        $planes = Plan::all();

        return view('frontend.planes.index', compact('planes'));
    }

    public function plan(Request $request){

        $planData = Plan::where('codigo_plan',$request->id)->first();

        // $mapas = MapaPlan::where('plan_id',$request->id)->get();
        // $mapas = $plan->mapas;
        $urlServer = 'QOSQLOUD';
        $mapasCaracterizacion = $planData->mapas->where('etapa_plan_id','=',1);
        $mapasPropuesta = $planData->mapas->where('etapa_plan_id','=',2);

        return view('frontend.planes.mapas.index', compact('planData','urlServer', 'mapasCaracterizacion','mapasPropuesta'));
    }
}
