@extends('frontend.layout')

@section('header-style-scripts')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;600;700;800;900&display=swap');
    .text-primary{
        color: var(--color-primary) !important;
    }
    .bg-primary{
        background-color: var(--color-primary) !important;
    }

    .md-icon{
        font-size: 22px;
    }
    .mapboxgl-ctrl-google-satellite-icon {
  background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCI+PHBhdGggZD0iTTIuMDQ5MzIgMTMuMDAwMUg3LjUyNzI1QzcuNzA2MjQgMTYuMjY4OSA4Ljc1NzQgMTkuMzA1NCAxMC40NTIgMjEuODgxQzUuOTg3NjEgMjEuMTg3MiAyLjUwMDEgMTcuNTQwMyAyLjA0OTMyIDEzLjAwMDFaTTIuMDQ5MzIgMTEuMDAwMUMyLjUwMDEgNi40NTk4IDUuOTg3NjEgMi44MTI4OCAxMC40NTIgMi4xMTkxNEM4Ljc1NzQgNC42OTQ2OCA3LjcwNjI0IDcuNzMxMjMgNy41MjcyNSAxMS4wMDAxSDIuMDQ5MzJaTTIxLjk1MDYgMTEuMDAwMUgxNi40NzI2QzE2LjI5MzYgNy43MzEyMyAxNS4yNDI1IDQuNjk0NjggMTMuNTQ3OSAyLjExOTE0QzE4LjAxMjMgMi44MTI4OCAyMS40OTk4IDYuNDU5OCAyMS45NTA2IDExLjAwMDFaTTIxLjk1MDYgMTMuMDAwMUMyMS40OTk4IDE3LjU0MDMgMTguMDEyMyAyMS4xODcyIDEzLjU0NzkgMjEuODgxQzE1LjI0MjUgMTkuMzA1NCAxNi4yOTM2IDE2LjI2ODkgMTYuNDcyNiAxMy4wMDAxSDIxLjk1MDZaTTkuNTMwNjggMTMuMDAwMUgxNC40NjkyQzE0LjI5NzYgMTUuNzgyOSAxMy40MTQ2IDE4LjM3MzMgMTEuOTk5OSAyMC41OTE2QzEwLjU4NTIgMTguMzczMyA5LjcwMjI5IDE1Ljc4MjkgOS41MzA2OCAxMy4wMDAxWk05LjUzMDY4IDExLjAwMDFDOS43MDIyOSA4LjIxNzIyIDEwLjU4NTIgNS42MjY4NCAxMS45OTk5IDMuNDA4NTNDMTMuNDE0NiA1LjYyNjg0IDE0LjI5NzYgOC4yMTcyMiAxNC40NjkyIDExLjAwMDFIOS41MzA2OFoiPjwvcGF0aD48L3N2Zz4=);
  background-size: 70%;
  background-repeat: no-repeat;
  background-position-x: center;
  background-position-y: center;
}
    .margin-30{
        margin-top: 100px;
    }

    .profile-card-4 {
        box-shadow: 0px 0px 20px rgba(88, 88, 88, 0.219);
        /* margin: 20px; */
        /* padding: 10px; */
    }
    .profile-card-4:hover{
        cursor: pointer;
        box-shadow: 0px 0px 20px rgba(88, 88, 88, 0.534);

    }
    .profile-card-4 img{

        transition: 1s;
    }
    .profile-card-4:hover img{
        transform: scale(1.3) rotate(10deg);

    }

    /*stiky*/
    .sticky-search {
    position: -webkit-sticky;
    position: sticky;
    top: 10;
    background-color: #666;
    padding: 40px;
    font-size: 25px;
    }
</style>
<style>
    #boxThis {
      /* width: 100%; */
    }
    #boxThis.box {
      margin-top: 0;
      position: sticky;
      top:  95px;
      z-index: 9999;
    }
  </style>
  <style>
    .sidebar{
    float: left;
    width: 250px;
    margin-left: -300px;
    height: 100%;
    background: #eee;
    overflow: hidden;
    transition: .6s all;
    }
    .sidebar-open
    {
    margin-left: 0;
    }
    /* -------------- Burgur styling ----------------- */
    .btns
    {
    float: left;
    height: 25px;
    width: 25px;
    padding: 6px;
    background: #fff;
    /*border: 1px solid #fa8231;*/
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    flex-direction: column;
    cursor: pointer;
    }
    .btns .bar1, .btns .bar2, .btns .bar3
    {
    height: 3px;
    width: 100%;
    display: block;
    background: #000;
    }
    /* ----------- close btn ------------- */
    .close-btn
    {
    top: 0;
    right: 0;
    height: 25px;
    width: 25px;
    padding: 6px;
    background: #fff;
    /*border: 1px solid #fa8231;*/
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    flex-direction: column;
    cursor: pointer;
    position: relative;
    }

    .close-btn .bar1
    {
    transform: rotate(-130deg);
    height: 3px;
    width: 70%;
    display: block;
    background: #000;
    position: absolute;
    }

    .close-btn .bar2
    {
    display: none;
    }

    .close-btn .bar3
    {
    transform: rotateZ(130deg);
    height: 3px;
    width: 70%;
    display: block;
    background: #000;
    position: absolute;
    }
  </style>


@endsection

@section('content')

    <main class="main margin-30" style="background-color: #eee">
        <div class="container-fluid">
            {{-- <div class="row">
                <div class="my-auto col-md-12">
                    <form action=""" method="GET" role="search">
                        <div class="input-group">

                            <input type="search" name="search0" id="search0"  placeholder="Buscar servicio" class="form-control">
                            <button class="bg-gray-500 border btn btn-outline-secondary border-start-0 " type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                            {
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h5>REST-sultados</h5>
                    <table class="table table-striped table-sm table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                            </tr>
                        </thead>
                        <tbody class="allData">
                            @foreach ($servicios as $servicio)

                            <tr>
                                <td>{{ $servicio->nombre }}</td>
                                <td>{{ $servicio->descripcion }}</td>
                            </tr>

                            @endforeach
                        </tbody>
                        <tbody id="Content" class="searchData"></tbody>
                    </table>
                </div>
            </div> --}}

            {{-- <div id="boxThis">Box</div> --}}
            <div  id="boxHere"></div>
            <div class="row" id="boxThis">
                <div class="my-auto col-md-12">

                        <form action="" method="GET" role="search">
                            <div class="input-group">

                                <input type="search" name="search2" id="search2"  placeholder="Buscar servicio" class="form-control">
                                <button class="bg-gray-500 border btn btn-outline-secondary border-start-0 bg-primary text-white" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                                {{-- @include('frontend.search.search_services_map',['searchServices' => [] ]) --}}
                            </div>
                        </form>

                </div>
            </div>
            <div class="row mt-3 d-flex justify-content-center" >
                <div class="col-3">
                    <div class="sidebar">
                        <span>Componente:</span>

                        @foreach ($componentes as $componente)
                            <div class="form-group" style="font-size: 12px"> <input class="componente_check" type="checkbox" value="{{$componente->nombre }}" id="25off"> <label for="25">{{ ucfirst($componente->nombre) }}</label> </div>


                        @endforeach

                    </div>
                    <div class="btns">
                        <span class="bar1"></span>
                        <span class="bar2"></span>
                        <span class="bar3"></span>
                      </div>

                </div>
                <div class="col-9">
                   <div class="row allDataCards">

                           @foreach ($servicios as $servicio)

                           <div class="col-sm-12 col-md-6">
                               <div class="mb-3 card border-light profile-card-4" >
                                   <div class="row g-0">
                                       <div class="overflow-hidden col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                           {{-- <img src="{{ url('frontend/assets/img/testimonials-bg.jpg') }}" class="img-fluid rounded-start" alt="..."> --}}
                                           {{-- <img src="uploads/services_planes_images/{{ $servicio->url_image }}" class="img-fluid rounded-start" alt="..."> --}}
                                           <img src="http://municusco.com:8080/geoserver/wms/reflect?layers={{ $servicio->url_layer_geoserver }}&tiled=false" class="img-fluid rounded-start" alt="...">
                                       </div>
                                       <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
                                           <div class="card-body"  style="font-size: 14px;">
                                               <h5 class="card-title text-primary">{{ $servicio->nombre }}</h5>
                                               <p class="card-text text-sm" style="font-size:11px;"><strong>Descripcion: </strong>{{ $servicio->descripcion }}</p>
                                               <p class="card-text m-0"><i class="ri-road-map-line ri-lg"></i>&nbsp;<strong>WMS: </strong><a href="http://opendata.municusco.com/{{ $servicio->wms }}">http://opendata.municusco.com/{{ $servicio->wms }}</a></p>
                                               <p class="card-text m-0"><i class="ri-treasure-map-line ri-lg"></i>&nbsp;<strong>MVT: </strong><a href="http://opendata.municusco.com/{{ $servicio->mvt }}">http://opendata.municusco.com/{{ $servicio->mvt }}</a></p>
                                               <p class="card-text m-0"><i class="ri-file-pdf-2-line ri-lg"></i></i>&nbsp;<strong>PDF: </strong><a href="http://geoserver.municusco.com/geoserver/open_data/wms?service=WMS&version=1.1.0&request=GetMap&layers={{ $servicio->url_layer_geoserver }}&bbox=157347.375%2C8488851.0%2C195531.4375%2C8512564.0&width=768&height=476&srs=EPSG%3A32719&styles=&format=application%2Fpdf" class="text-primary">descargar &nbsp;<i class="ri-arrow-down-circle-line ri-lg"></i></a></p>
                                               <p class="card-text m-0"><iconify-icon icon="bi:filetype-json" class="md-icon"></iconify-icon></i>&nbsp;<strong>GEOJSON: </strong><a href="http://geoserver.municusco.com/geoserver/open_data/wms?service=WMS&version=1.1.0&request=GetMap&layers={{ $servicio->url_layer_geoserver }}&bbox=157347.375%2C8488851.0%2C195531.4375%2C8512564.0&width=768&height=476&srs=EPSG%3A32719&styles=&format=application%2Fpdf" class="text-primary">descargar &nbsp;<i class="ri-arrow-down-circle-line ri-lg"></i></a></p>


                                               <p class="card-text "><i class="ri-calendar-check-fill"></i>&nbsp;<small class="text-muted text-sm" style="font-size: 12px;"><strong>Publicado el: </strong>{{ $servicio->created_at }}</small></p>
                                               <a href="#" class="btn bg-primary text-white btn-sm"><i class="ri-fullscreen-line"></i> &nbsp; Ver más</a>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>


                           @endforeach

                    </div>
                    <div id="ContentCards" class="row searchDataCards"></div>

                </div>

            </div>
          <div class="row">
                <div class="col-3">sss</div>
                <div class="col-9">
                    <div class="row">
                        <div class="col-3">col-3</div>
                        <div class="col-3">col-3</div>
                        <div class="col-3">col-3</div>
                        <div class="col-3">col-3</div>
                        <div class="col-3">col-3</div>
                        <div class="col-3">col-3</div>


                    </div>
                </div>
            </div>

            {{-- <hr> --}}
            {{-- SEACRH INICIAL --}}

            {{-- <div class="row">
                <div class="my-auto col-md-12">
                    <form action="{{ url('search') }}" method="GET" role="search">
                        <div class="input-group">

                            <input type="search" name="search" value="{{ Request::get('search') }}" placeholder="Buscar servicio" class="form-control">
                            <button class="bg-gray-500 border btn btn-outline-secondary border-start-0 " type="submit">
                                <i class="bi bi-search"></i>
                            </button>

                        </div>
                    </form>
                </div>
            </div>
            <div class="row" >

                @forelse ($servicios as $servicio)

                <div class="col-md-12">
                    <div class="mb-3 card border-light profile-card-4" >
                        <div class="row g-0">
                          <div class="overflow-hidden col-md-4">
                            <img src="{{ url('frontend/assets/img/testimonials-bg.jpg') }}" class="img-fluid rounded-start" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">{{ $servicio->nombre }}</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                @empty

                <h4>no results</h4>

                @endforelse
            </div> --}}
        </div>
    </main>

@endsection


@section('footer-style-scripts')

<script type="text/javascript">

    var boxHere = document.querySelector('#boxHere');

    function scrollToBoxHere() {
        boxHere.scrollTop = 0;
    }

    $('#search0').on('keyup', function(){
        // alert('hello')
        $value = $(this).val();
        // console.log($value);

        //verificando si hay criterios de busqueda
        if($value){
            $('.allData').hide();
            $('.searchData').show();
        }

        $.ajax({
            type: 'get',
            url: '{{ URL::to('searchi') }}',
            data: {'search':$value},
            success: function(data)
            {
                console.log(data);
                $('#Content').html(data);
            }
        })
    })
    //------------------------------------------------------------------------------------------
    $('#search2').on('keyup', function(){
        // alert('hello')
        $value = $(this).val();
        // console.log($value);

        //verificando si hay criterios de busqueda
        if($value){
            $('.allDataCards').hide();
            $('.searchDataCards').show();
        }

        $.ajax({
            type: 'get',
            url: '{{ URL::to('searchservicescards') }}',
            data: {'search':$value},
            success: function(data)
            {
                console.log(data);
                $('#ContentCards').html(data);
                scrollToBoxHere();

            }
        })
    })
</script>
<script type="text/javascript">
    function boxtothetop() {
      var windowTop = $(window)
        .scrollTop();
      var top = $('#boxHere')
        .offset()
        .top;
      if(windowTop > top) {
        $('#boxThis')
          .addClass('box');
        $('#boxHere')
          .height($('#boxThis')
            .outerHeight());
      } else {
        $('#boxThis')
          .removeClass('box');
        $('#boxHere')
          .height(0);
      }
    }
    $(function() {
      $(window)
        .scroll(boxtothetop);
      boxtothetop();
    });
  </script>

  <script type="text/javascript">
    $('.btns').on("click", function(){
    $('.btns').toggleClass('close-btn');
    $('.sidebar').toggleClass('sidebar-open');
    });
  </script>

<script>

    var config = {

        servicio: function(){
            var key = $('#search').val();
            //colors
            var colors = [];
            $('.color_check:checked').each(function(){
                colors.push($(this).val());
            });
            //sizes
            var componentes = [];
            $('.componente_check:checked').each(function(){
                componentes.push($(this).val());
            })
            //price
            var p = [];
            var price = $('#ex2').val();
            p = price.split(',');
            var min = p[0];
            var max = p[1];
            $('#min_value').text("Rs: "+min);
            $('#max_value').text("Rs: "+max);
            //end

            var dataString = 'key=' + key + '&colors=' + colors + '&price=' + price+ '&componentes='+componentes;

            $.ajax({
                url: "{{ url('get-products-ajax') }}",
                type: "get",
                data: dataString,
                success:function(data){
                    if(data != ""){

                        $("#ajax_result").html(data);
                    } else {
                        $("#ajax_result").html("<p>No data Avaliable</p>");
                    }
                }
            });

        },
        cart_count: function(){
            $.ajax({
                url: "{{ url('get-cart-count') }}",
                type: "get",
                success:function(data){
                    if(data){
                        $("#cart_count").text(data.cart_count);
                    }
                }
            });
        }

    };
</script>

<script type="text/javascript">
    $(document).ready(function(){

        // config.products();
        // config.cart_count();

        // $(".searchProd").keyup(function(){
        //     config.products();
        // });
        // $('.color_check').on('click', function(){
        //     config.products();
        // });
        // $('.sizes_check').on('click', function(){
        //     config.products();
        // });
        // $('#ex2').change(function(){
        //     config.products();
        // });

        $('.componente_check').on('click',function(){
            let val = $('.componente_check:checked').val()
            console.log(val);
        })

    });

</script>

@endsection
