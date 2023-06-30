@extends('frontend.layout')

@section('header-style-scripts')
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
    <style>
        /* body {
            margin: 0;
            padding: 0;
        } */

        #mapi3d {
            /* position: absolute; top: 0; bottom: 0; width: 100%; */

            position: relative;
            top: 60px;
            bottom: 0;
            width: 100%;
            height: 500px;
        }

        .mapboxgl-popup {
            max-width: 400px;
            font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style-map.css') }}">
@endsection

@section('content')
    <br>
    <br>
    <br>
    <br>
    <h1>{{ $mapData }}</h1>
    <!--<div id="mapi"></div>-->
    <div id="mapi3d"></div>
    <ul id="menu-layers"></ul>
    <pre id="info"></pre>

    <div class="infoxy container-fluid">

        <a href="https://cusco.gob.pe" class="text-white "><img src="images/logo-escudo-muni.svg" alt=""
                class="image-fluid" style="max-width: 60px;"></a> &nbsp;&nbsp;&nbsp;<a href="http://qosqloud.com"
            class="text-white "><img src="images/qosqloud.svg" alt="" class="image-fluid"
                style="max-width: 90px;"></a>
    </div>


    <!-- INFO -->





    <div id="popup-view">
        <h1>popup</h1>
    </div>


    <script>
        var condition = false;
        if (condition) {
            document.getElementById('popup-view').style.display = 'block';
        } else {
            document.getElementById('popup-view').style.display = 'none';
        }
    </script>


    <script src="{{ asset('frontend/assets/js/main_fichas_lotes.js') }}"></script>
@endsection
