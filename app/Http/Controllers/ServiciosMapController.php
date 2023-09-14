<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\ServicioMapa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ServiciosMapController extends Controller
{
    //
    public function ServiciosMapa(){
        $serviciosmapa = ServicioMapa::all();
        return view('admin.servicios.servicios_page_all',compact('$serviciosmapa'));
    }

    public function CrearServicioMapa(){

        $planes = Plan::all();
        return view('admin.servicios.serviciosmapa_create',compact('planes'));

    }

    public function StorageServicioMapa(Request $request ){
        // dd($request);
        $request->validate([
            'nombre' => 'required',
            // 'descripcion' => 'required',
            // 'wms' => 'required',
            // 'wms' => 'required',
            // 'mvt' => 'required',
            // 'geojson' => 'required',
            // 'url_image' => 'required',
            // 'estado' => 'required',
            'plan_id' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('url_image')) {
            $destinationPath = public_path('uploads/services_planes_images');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);

            $input['url_image'] = "$profileImage";
        }

        ServicioMapa::create($input);

        return redirect()->route('admin.open.services')
                        ->with('success','Product created successfully.');
    }

    public function EditServicioMapa(Request $request){

        //dd($request);
        $planes = Plan::all();

        //return response()->json($request);
        $servicio=ServicioMapa::find($request->id);

        return view('admin.servicios.serviciosmapa_edit',compact('servicio','planes'));

    }

    public function UpdateServicioMapa(Request $request, $id){
        // dd($id);
        // $servicio = ServicioMapa::findOrFail($id);

        $input = $request->all();

        if($request->estado=='on' || $request->estado== 1){
            $input['estado'] = 1;
        } else{
            $input['estado'] = 0;
        }

        if ($image = $request->file('url_image')) {
            $destinationPath = public_path('uploads/services_planes_images');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);

            $input['url_image'] = "$profileImage";
        }
        ServicioMapa::find($id)->update($input);

        return redirect()->route('admin.open.services');
    }

    public function destroy(){

    }
}
