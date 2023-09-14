<?php

namespace App\Http\Controllers;

use App\Models\ServicioMapa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function Servicios(){
        $services = ServicioMapa::all();
        return view('admin.servicios.servicios_page_all', compact('services'));
    }
}
