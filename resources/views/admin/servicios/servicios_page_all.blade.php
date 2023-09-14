@extends('admin.admin_master')

@section('admin')


@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">


@endsection



<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-end">
                <a href="{{ route('admin.servicesmap.create') }}" class="btn btn-primary">Agregar Servicio</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Servicios de Mapas</h4>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Basic Example</h4>
                        {{-- <p class="card-title-desc">For basic styling—light padding and
                                only horizontal dividers—add the base class <code>.table</code> to any
                                <code>&lt;table&gt;</code>.
                        </p> --}}

                        <div class="table-responsive">
                            <table id="servicios-map-admin" class="table mb-0 table-hover" >

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>WMS</th>
                                        <th>Imagen</th>
                                        <th>Acciones</th>
                                        {{-- <th>Username</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $servicio)
                                    <tr>
                                        <th scope="row">{{ $servicio->id }}</th>
                                        <td>{{ $servicio->nombre }}</td>
                                        <td>{{ $servicio->wms }}</td>
                                        <td><img src="/uploads/services_planes_images/{{ $servicio->url_image }}" height="80" class="rounded"></td>

                                        <td>
                                            <form onsubmit="return confirm('Está seguro de eliminar ?');" action="{{ route('admin.servicesmap.destroy', $servicio->id) }}" method="POST">
                                            <a href="{{ route('admin.servicesmap.edit',['id'=>$servicio->id]) }}" class="btn btn-primary">editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        {{-- <td>@mdo</td> --}}
                                    </tr>


                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>


            </div>
        </div>
        <!--<div class="row">
            <div class="col-md-12">
                <div id='map'></div>
            </div>
        </div>-->

        <div class="row">
            <div class="col-md-12">
                <div id='map2'></div>



            </div>
        </div>
    </div>
</div>

<!--
 <script type="module">


    import { layerControlSimple } from "{{ url('frontend/assets/js/src/layerControlSimple.js') }}"



    /*Blank Mapbox GL Map*/
    mapboxgl.accessToken = 'pk.eyJ1Ijoiemh5cGVyIiwiYSI6ImNpdGdiM3d1dDAwODQyeG8zZGVkYnc2b24ifQ.cwgujm_x_QPQ668K2hTQFA';

    var map = new mapboxgl.Map({
      container: 'map',
      hash: true,
      /*style: 'some mapbox style url*/
      /*below is a blank style*/
      /*style: {
        "version": 8,
        "name": "blank",
        "sources": {
          "blank": {
            "type": "vector",
            "url": ""
          }
        },
        "layers": [{
          "id": "background",
          "type": "background",
          "paint": {
            "background-color": "skyblue"
          }
        }]
      },*/
      style: "mapbox://styles/zhyper/ckxf3to4l0vvz15qd9z7o9n6b",
      center: [-97.56, 39.59],
      zoom: 4.68,
      debug: 1
    });
    map.addControl(new mapboxgl.NavigationControl());
    map.addControl(new mapboxgl.FullscreenControl());

    map.on('style.load', function () {
      map.addSource('counties', {
        'type': 'geojson',
        /*many types of data can be added, such as geojson, vector tiles or raster data*/
        'data': "{{ url('backend/assets/data/counties.min.geojson') }}"
      });

      /*here we are adding a source, then a layer based on that that source*/

      map.addLayer({
        'id': 'Counties',
        'type': 'fill',    /*define the type of layer fill, line, point, fill-extrusion, background, raster, circle*/
        'source': 'counties',
        'layout': {
          'visibility': 'visible'
        },

        /*there are many options for styling - this is a simple style*/

        'paint': {
          'fill-color': 'lightgray',
          'fill-outline-color': 'white',
          'fill-opacity': 0.9
        }
      });

      map.addLayer({
        'id': 'States',
        'type': 'line',    /*define the type of layer fill, line, point, fill-extrusion, background, raster, circle*/
        'source': {
          type: "geojson",
          data: "{{ url('backend/assets/data/states.geojson') }}"
        },
        'layout': {
          'visibility': 'none'
        },

        /*there are many options for styling - this is a simple style*/

        'paint': {
          'line-color': '#121212',
        }
      });

      map.addLayer({
        'id': 'Lakes',
        'type': 'fill',    /*define the type of layer fill, line, point, fill-extrusion, background, raster, circle*/
        'source': {
          type: "geojson",
          data: "{{ url('backend/assets/data/lakes.json') }}"
        },
        'layout': {
          'visibility': 'none'
        },

        /*there are many options for styling - this is a simple style*/

        'paint': {
          'fill-color': 'blue',
          'fill-outline-color': 'white',
          'fill-opacity': 0.9
        }
      });


      //MVT-AREAS-INTERVENCION---------------------------------------------------------------------------
    map.addSource("areas-intervencion-source", {
      type: "vector",
      //  tiles: ['http://localhost:3030/v1/mvt/pdu2024_diagnostico.tg_carto_lotes_ref_poroy/{z}/{x}/{y}?geom_column=geom&columns=id,estado'],
      tiles: [
        "https://municusco.com/apicolector/mvt/public.configuracion_area/{z}/{x}/{y}?geom_column=geom&&columns=id,nombre",
      ],

      //  https://municusco.com/apicolector/geojson/public.ficha_lote?geom_column=geom&id_column=id&precision=9
      // tiles: ['http://datos.pgts3c.sgot.cusco.gob.pe/v1/mvt/pdu2024_diagnostico.tg_carto_lotes_ref_poroy/{z}/{x}/{y}?geom_column=geom&columns=estado'],
      // tiles: ['https://api.cusco.cloud/v1/mvt/public.division_lote/{z}/{x}/{y}?geom_column=geom&columns=id,estado'],
      maxzoom: 22,
      minzoom: 5,
    });

    map.addLayer({
      id: "areas-intervencion-layer",
      // source: {
      //   type: 'vector',
      //   tiles: ['http://localhost:3000/v1/mvt/pdu2024_diagnostico.tg_carto_lotes_ref_poroy/{z}/{x}/{y}?geom_column=geom&columns=id,estado'],
      //   maxzoom: 22,
      //   minzoom: 5
      // },
      source: "areas-intervencion-source",
      "source-layer": "public.configuracion_area",
      type: "line",
      minzoom: 5,
      paint: {
        "line-color": "rgba(255, 0, 119, 0.8)",
        "line-width": 3.5,
        "line-dasharray": [1, 0.5],
      },
      'layout': {
          'visibility': 'none'
        },
    });

    map.addLayer({
      id: "areas-intervencion-layer-label",
      minzoom: 5,
      type: "symbol",
      source: "areas-intervencion-source",
      "source-layer": "public.configuracion_area",

      layout: {
        // "symbol-placement": "line",
        "text-font": ["Open Sans Bold"],
        "text-field": ["get", "nombre"],
        "text-size": 15,
        "text-justify": "auto",

      },
      paint: {
        "text-color": "rgba(255, 0, 119, 0.8)",
        "text-halo-color": "rgba(255,255,255,1.0)",
        "text-halo-width": 1.5,
      },
    });

      map.addControl(new layerControlSimple({
        layers: ["Lakes", "States", "Counties","areas-intervencion-layer"]
      }), "top-left");
    });



    /*End Blank Map*/

</script>-->


<script type="module">

  import { layerControlSimple } from "{{ url('frontend/assets/js/src/layerControlSimple.js') }}"

  import { layerControlGrouped } from "{{ url('frontend/assets/js/src/layerControlGrouped.js') }}"

  /*Blank Mapbox GL Map*/
  mapboxgl.accessToken = 'pk.eyJ1Ijoiemh5cGVyIiwiYSI6ImNpdGdiM3d1dDAwODQyeG8zZGVkYnc2b24ifQ.cwgujm_x_QPQ668K2hTQFA';

  var mglMap = new mapboxgl.Map({
    container: 'map2',
    hash: true,
    /*style: 'some mapbox style url*/
    /*below is a blank style*/
    style: {
      "version": 8,
      "name": "blank",
      "sources": {
        "blank": {
          "type": "vector",
          "url": ""
        }
      },
      "layers": [{
        "id": "background",
        "type": "background",
        "paint": {
          "background-color": "lightsteelblue"
        }
      }]
    },
    center: [-97.56, 39.59],
    zoom: 4.68,
    debug: 1
  });
  mglMap.addControl(new mapboxgl.NavigationControl());

  mglMap.on('style.load', function () {
    mglMap.addSource('counties', {
      'type': 'geojson',
      'data': {
        type: "FeatureCollection",
        features: []
      }
    });

    mglMap.addLayer({
      'id': 'counties-outline',
      'type': 'line',
      'source': 'counties',
      'layout': {
        'visibility': 'none'
      },
      'paint': {
        'line-color': 'white',
        'line-opacity': 0.5
      }
    });

    mglMap.addLayer({
      'id': 'Counties',
      'type': 'fill',
      'source': 'counties',
      'layout': {
        'visibility': 'none'
      },
      'paint': {
        'fill-color': 'lightgray',
        'fill-outline-color': 'white',
        'fill-opacity': 0.9
      }
    });

    mglMap.addLayer({
      'id': 'states-fill',
      'type': 'fill',
      'source': {
        type: "geojson",
        data: "{{ url('backend/assets/data/states.min.geojson') }}"
      },
      'layout': {
        'visibility': 'none'
      },
      'paint': {
        'fill-color': '#121212',
        'fill-opacity': 0.3
      }
    });

    mglMap.addLayer({
      'id': 'states-outline',
      'type': 'line',
      'source': {
        type: "geojson",
        data: "{{ url('backend/assets/data/states.min.geojson') }}"
      },
      'layout': {
        'visibility': 'visible'
      },
      'paint': {
        'line-color': '#121212',
        'line-opacity': 0.6
      }
    });

    mglMap.addLayer({
      'id': 'States',
      'type': 'line',
      'source': {
        type: "geojson",
        data: "{{ url('backend/assets/data/states.geojson') }}"
      },
      'layout': {
        'visibility': 'none'
      },
      'paint': {
        'line-color': '#121212',
      }
    });

    mglMap.addLayer({
      'id': 'Lakes',
      'type': 'fill',
      'source': {
        type: "geojson",
        data: "{{ url('backend/assets/data/lakes.json') }}"
      },
      'layout': {
        'visibility': 'none'
      },
      'paint': {
        'fill-color': 'blue',
        'fill-outline-color': 'white',
        'fill-opacity': 0.9
      }
    });

    mglMap.addSource('rivers', {
      type: "geojson",
        data: {
          type: "FeatureCollection",
          features: []
        }
      })

    mglMap.addLayer({
      'id': 'riversCase',
      'type': 'line',
      'source': 'rivers',
      'layout': {
        'visibility': 'none'
      },
      'paint': {
        'line-color': 'white',
        'line-width': 6
      }
    });

    mglMap.addLayer({
      'id': 'rivers',
      'type': 'line',
      'source': 'rivers',
      'layout': {
        'visibility': 'none'
      },
      'paint': {
        'line-color': 'blue',
        'line-width': 3
      }
    });
    mglMap.addLayer({
      'id': 'RailCase',
      'type': 'line',
      'source': {
        type: "geojson",
        data: "{{ url('backend/assets/data/rail.geojson') }}"
      },
      'layout': {
        'visibility': 'none'
      },
      'paint': {
        'line-color': "white",
        'line-width': 6
      }
    });
    mglMap.addLayer({
      'id': 'Rail',
      'type': 'line',
      'source': {
        type: "geojson",
        data: "{{ url('backend/assets/data/rail.geojson') }}"
      },
      'layout': {
        'visibility': 'none'
      },
      'paint': {
        'line-color': {
          stops: [
            [0, "black"],
            [14, "black"],
            [18, "black"]
          ]
        },
        'line-width': 3
      }
    });



    var config = {
      collapsed: false,
      layers: [
      {
          id: "counties-outline",
          hidden: true,
          parent: 'Counties',
          group: "Cadastral",
          directory: "Admin",
          metadata: {
            source: {
              id: "counties",
              type: "geojson",
              data: "{{ url('backend/assets/data/counties.min.geojson') }}"
            },
            lazyLoading: true
          }
        },
        {
          id: "Counties",
          hidden: false,
          children: true,
          group: "Cadastral",
          directory: "Admin",
          metadata: {
            source: {
              id: "counties",
              type: "geojson",
              data: "{{ url('backend/assets/data/counties.min.geojson') }}"
            },
            lazyLoading: true
          }
        },
        {
          id: "states-fill",
          parent: "States",
          hidden: true,
          group: "Political",
          directory: "Admin"
        },
        {
          id: "States",
          hidden: false,
          children: true,
          group: "Political",
          directory: "Admin",
          metadata: {
            filterSchema: {
              "NAME": {
                type: "string"
              },
              "date_joined_formatted": {
                type: "date"
              }
            }
          }
        },
        {
          id: "Lakes",
          hidden: false,
          group: "Hydro",
          directory: "Environment"
        },
        {
          id: "riversCase",
          hidden: true,
          group: "Hydro",
          parent: "rivers",
          directory: "Environment",
          metadata: {
            lazyLoading: true,
            source: {
              id: "rivers",
              type: "geojson",
              data: "{{ url('backend/assets/data/rivers.geojson') }}"
            },
          }
        },
        {
          name: "Rivers",
          id: "rivers",
          hidden: false,
          group: "Hydro",
          children: true,
          directory: "Environment",
          metadata: {
            filterSchema: {
              "name": {
                type: "select",
                options: ["", "Colorado"]
              },
              "scalerank": {
                "type": "number"
              }
            },
            lazyLoading: true
          }
        },
        {
          id: "Rail",
          hidden: false,
          children: true,
          directory: "Cultural",
          legend: "<icon class='fa fa-minus' style='color:red;'></icon> Legend defined in config<br><icon class='fa fa-minus' style='color:black;'></icon> Toggles when layer is off"
        },
        {
          id: "RailCase",
          hidden: false,
          parent: "Rail",
          hidden: true,
          directory: "Cultural",
          legend: "<icon class='fa fa-minus' style='color:red;'></icon> Legend defined in config<br><icon class='fa fa-minus' style='color:black;'></icon> Toggles when layer is off"
        }
      ]
    }

    mglMap.addControl(new layerControlGrouped(config), "top-left");
    mglMap.addControl(new MapboxInspect({
      showInspectButton: false,
      showInspectMapPopup: false,
      showMapPopup: true,
      showMapPopupOnHover: false,
      showInspectMapPopupOnHover: false,
      popup: new mapboxgl.Popup({
        closeButton: true,
        closeOnClick: false
      })
    }));

  });

  /*End Blank Map*/



</script>



@endsection

@section('js')

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>

  //new DataTable('#servicios-map-admin');
   $('#servicios-map-admin').DataTable({
        "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontró nada, lo siento!",
                "info": "Mostrardo _PAGE_ página de _PAGES_",
                "infoEmpty": "Sin registros encontrados",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Último",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "search": "Buscar",
                "loadingRecords": "Cargando...",
            }
   });
</script>

@endsection

