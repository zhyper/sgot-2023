@extends('admin.admin_master')

@section('admin')
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">

                <h1>Crear Servicio de Mapa</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="{{ route('admin.servicesmap.storage') }}" enctype="multipart/form-data">
                            @csrf

                            {{-- <input type="hidden" name="id" value="{{ $homeslide->id }}"> --}}

                            <div class="mb-3 row">
                                <label for="nombre-text-input" class="col-sm-2 col-form-label"> Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nombre"  id="nombre-text-input" class="form-control">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="descripcion-text-input" class="col-sm-2 col-form-label"> Descripcion</label>
                                <div class="col-sm-10">
                                    <input type="text" name="descripcion" id="descripcion-text-input" class="form-control">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="wms-text-input" class="col-sm-2 col-form-label"> WMS</label>
                                <div class="col-sm-10">
                                    <input type="text" name="wms"  id="wms-text-input" class="form-control">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="mvt-text-input" class="col-sm-2 col-form-label"> MVT</label>
                                <div class="col-sm-10">
                                    <input type="text" name="mvt"  id="mvt-text-input" class="form-control">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="geojson-text-input" class="col-sm-2 col-form-label"> GEOJSON</label>
                                <div class="col-sm-10">
                                    <input type="text" name="geojson"  id="geojson-text-input" class="form-control">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="geojson-text-input" class="col-sm-2 col-form-label"> URL: Layer Geoserver</label>
                                <div class="col-sm-10">
                                    <input type="text" name="url_layer_geoserver"  id="geojson-text-input" class="form-control">
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <label for="estado-text-input" class="col-sm-2 col-form-label"> Estado</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-switch" dir="ltr">
                                        <input type="checkbox" class="form-check-input" style="height: 22px; width: 35px;" id="estado" >
                                        <label class="m-2 form-check-label" for="estado">Cambiar estado</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="geojson-text-input" class="col-sm-2 col-form-label"> Plan</label>
                                <div class="col-sm-10">
                                    <select name="plan_id" id="plan_id" class="form-select">

                                        @foreach ($planes as $plan)
                                        <option value="{{ $plan->id }}">{{ $plan->nombre }}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="geojson-text-input" class="col-sm-2 col-form-label"> Etapa</label>
                                <div class="col-sm-10">
                                    <select name="etapa_id" id="etapa_id" class="form-select">
                                        <option value="1">DIANÓSTICO</option>
                                        <option value="2">PROPUESTA</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="geojson-text-input" class="col-sm-2 col-form-label"> Componente</label>
                                <div class="col-sm-10">
                                    <select name="componente_id" id="componente_id" class="form-select">
                                        <option value="1">AMBIENTAL</option>
                                        <option value="2">FISICO CONSTRUIDO</option>
                                        <option value="3">GRD</option>
                                        <option value="4">LEGAL</option>
                                        <option value="5">ECONOMICO</option>
                                    </select>
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <label for="url_image-image-input" class="col-sm-2 col-form-label"> Imagen del Service Map </label>
                                <div class="col-sm-10">
                                    <input type="file" name="url_image" id="image" class="form-control">
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <label for="image-profile-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img    id="showImage" class="rounded avatar-lg" src="{{ (!empty($editData->profile_image) ? url('/upload/admin_images/'.$editData->profile_image) : url('/upload/no_image.jpg')) }}">
                                </div>
                            </div>





                            {{-- <div class="mb-3 row">
                                <label for="image-profile-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">

                                    <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($homeslide->home_slide))? url( $homeslide->home_slide):url('upload/no_image.jpg') }}" alt="Card image cap">
                                </div>
                            </div> --}}

                            {{-- <div class="mb-3 row"> --}}
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Storage Servicio de Mapa">
                            {{-- </div> --}}


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src', e.target.result)
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })

        </script>

@endsection
