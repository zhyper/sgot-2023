<?php

namespace App\Http\Controllers;

use App\Models\Componente;
use App\Models\ServicioMapa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OpenController extends Controller
{
    //

    public function servicios()

    {

        $componentes = Componente::all();

        // $response = Http::get('http://localhost:8081/api/tablasesquema/pdu2013_diagnostico/BASE');

        $servicios = ServicioMapa::all();
        // $servicios = json_decode($response->body());

        //dd($jsonData);

        return view('frontend.open.index', compact('servicios','componentes'));

    }

    //search

    public function searchServices(Request $request) {

        if($request->search){

            $searchServices = ServicioMapa::where('nombre','ILIKE',"%$request->search%")->latest()->paginate(3);

            return view('frontend.search.search_services_map', compact('searchServices'));

        } else {
            $searchServices = ServicioMapa::paginate(3);

            return view('frontend.search.search_services_map', compact('searchServices'));

            // return redirect()->back()->with('message','Busqueda vacía');
        }

    }

    ///searchi
    public function searchiServices(Request $request){
        $servicio = ServicioMapa::where('nombre','ILIKE',"%$request->search%")->orWhere('descripcion','ILIKE',"%$request->search%")->get();

        $output="";
        foreach ($servicio as $value) {
        $output .=
            '<tr>
                <td>'.$value->nombre.'</td>
                <td>'.$value->descripcion.'</td>
            </tr>';
        }

        // return response()->json($servicio);
        return response($output);
    }

    ///searchi
    public function searchServicesCards(Request $request){
        $servicio = ServicioMapa::where('nombre','ILIKE',"%$request->search%")->orWhere('descripcion','ILIKE',"%$request->search%")->get();

        $output="";
        foreach ($servicio as $value) {
        $output .=

            '<div class="col-md-12">
            <div class="mb-3 card border-light profile-card-4" >
                <div class="row g-0">
                    <div class="overflow-hidden col-md-4">
                        <!--<img src="frontend/assets/img/testimonials-bg.jpg" class="img-fluid rounded-start" alt="...">-->
                        <!--<img src="uploads/services_planes_images/'.$value->url_image.'" class="img-fluid rounded-start" alt="..."-->
                        <img src="http://municusco.com:8080/geoserver/wms/reflect?layers='. $value->url_layer_geoserver.'&tiled=false" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body" style="font-size: 14px;">
                            <h5 class="card-title text-primary">'.$value->nombre.'</h5>
                            <p class="card-text text-sm" style="font-size:11px;"><strong>'.$value->descripcion.'</strong></p>
                            <p class="card-text m-0"><i class="ri-road-map-line ri-lg"></i>&nbsp;<strong>WMS: </strong><a href="http://opendata.municusco.com/'. $value->wms .'">http://opendata.municusco.com/'. $value->wms .'</a></p>
                            <p class="card-text m-0"><i class="ri-treasure-map-line ri-lg"></i>&nbsp;<strong>MVT: </strong><a href="http://opendata.municusco.com/'. $value->mvt.'">http://opendata.municusco.com/'.$value->mvt.'</a></p>
                            <p class="card-text m-0"><i class="ri-file-pdf-2-line ri-lg"></i></i>&nbsp;<strong>PDF: </strong><a href="http://geoserver.municusco.com/geoserver/open_data/wms?service=WMS&version=1.1.0&request=GetMap&layers='. $value->url_layer_geoserver.'&bbox=157347.375%2C8488851.0%2C195531.4375%2C8512564.0&width=768&height=476&srs=EPSG%3A32719&styles=&format=application%2Fpdf" class="text-primary">descargar &nbsp;<i class="ri-arrow-down-circle-line ri-lg"></i></a></p>
                            <p class="card-text m-0"><iconify-icon icon="bi:filetype-json" class="md-icon"></iconify-icon></i>&nbsp;<strong>GEOJSON: </strong><a href="http://geoserver.municusco.com/geoserver/open_data/wms?service=WMS&version=1.1.0&request=GetMap&layers='. $value->url_layer_geoserver.'&bbox=157347.375%2C8488851.0%2C195531.4375%2C8512564.0&width=768&height=476&srs=EPSG%3A32719&styles=&format=application%2Fpdf" class="text-primary">descargar &nbsp;<i class="ri-arrow-down-circle-line ri-lg"></i></a></p>

                            <p class="card-text "><i class="ri-calendar-check-fill"></i>&nbsp;<small class="text-muted text-sm" style="font-size: 12px;"><strong>Publicado el: </strong>'. $value->created_at.'</small></p>
                            <a href="#" class="btn bg-primary text-white btn-sm"><i class="ri-fullscreen-line"></i> &nbsp; Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
        }

        // return response()->json($servicio);
        return response($output);
    }
}
