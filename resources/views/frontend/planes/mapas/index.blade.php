@extends('frontend.layout')

@section('content')
    {{-- <style>
        .card_map_item {
            box-shadow: 0px 0px 12px 0px #ccc;
        }
    </style> --}}
    <main id="main">


        <section id="features" class="features">
            <div class="container" data-aos="fade-up">

                <ul class="nav nav-tabs row gy-4 d-flex">

                    <li class="nav-item col-6 col-md-4 col-lg-2">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                            <i class="bi bi-binoculars color-cyan"></i>
                            <h4>Caracterización</h4>
                        </a>
                    </li><!-- End Tab 1 Nav -->

                    <li class="nav-item col-6 col-md-4 col-lg-2">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                            <i class="bi bi-box-seam color-indigo"></i>
                            <h4>Propuesta</h4>
                        </a>
                    </li><!-- End Tab 2 Nav -->



                </ul>

                <div class="tab-content">

                    <div class="tab-pane active show" id="tab-1">
                        <div class="row gy-4">
                            <div class="col-lg-8 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                                <h3>Caracterización</h3>
                                <p class="fst-italic">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore
                                    magna aliqua.
                                </p>


                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                                <img src="{{ url('frontend/assets/img/features-1.svg') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="row">


                            @foreach ($mapasCaracterizacion as $item)
                                @switch($item->componente_id)
                                    @case(1)
                                        <div class="col-md-4 col-sm-6 col-12" data-aos="zoom-in" data-aos-delay="100">
                                            {{-- <li><i class="bi bi-check-circle-fill"></i>{{ $item->nombre }}</li> --}}
                                            <div class="card mt-5 card_map_item" >
                                                <img src="{{ env('URL_WEB_SERVER') }}/41zre-media/images/mapas/{{ $planData->codigo_plan }}/CARACTERIZACION/FC/thumbnails/{{ $item->codigo }}.jpg"
                                                    class="img-fluid card-img-top" alt="">
                                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="bi bi-layers"></i>&nbsp;{{ $item->nombre }}</h5>
                                                    <span class="badge bg-secondary">FC</span>&nbsp;

                                                    <a href="#"><i class="bi bi-filetype-pdf"></i></a> &nbsp;<a href="#" class="cta-btn align-self-start">ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                    @break

                                    @case(2)
                                        <div class="col-md-4 col-sm-6 col-12" data-aos="zoom-in" data-aos-delay="100">
                                            {{-- <li><i class="bi bi-check-circle-fill"></i>{{ $item->nombre }}</li> --}}
                                            <div class="card mt-5 card_map_item">
                                                <img src="{{ env('URL_WEB_SERVER') }}/41zre-media/images/mapas/{{ $planData->codigo_plan }}/CARACTERIZACION/GRD/thumbnails/{{ $item->codigo }}.jpg"
                                                    class="img-fluid card-img-top" alt="">
                                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="bi bi-layers"></i>&nbsp;{{ $item->nombre }}</h5>
                                                    <span class="badge bg-warning">GRD</span>&nbsp;

                                                    <a href="#"><i class="bi bi-filetype-pdf"></i></a> &nbsp;
                                                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                                    <a href="#" class="cta-btn align-self-start">ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                    @break

                                    @case(3)
                                        <div class="col-md-4 col-sm-6 col-12" data-aos="zoom-in" data-aos-delay="100">
                                            {{-- <li><i class="bi bi-check-circle-fill"></i>{{ $item->nombre }}</li> --}}
                                            <div class="card mt-5 card_map_item">
                                                <img src="{{ env('URL_WEB_SERVER') }}/41zre-media/images/mapas/{{ $planData->codigo_plan }}/CARACTERIZACION/AMB/thumbnails/{{ $item->codigo }}.jpg"
                                                    class="img-fluid card-img-top" alt="">
                                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="bi bi-layers"></i>&nbsp;{{ $item->nombre }}</h5>
                                                    <span class="badge bg-info">AMB</span>&nbsp;

                                                    <a href="#"><i class="bi bi-filetype-pdf"></i></a> &nbsp;
                                                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                                    <a href="#" class="cta-btn align-self-start">ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                    @break

                                    @case(4)
                                        <div class="col-md-4 col-sm-6 col-12" data-aos="zoom-in" data-aos-delay="100">
                                            {{-- <li><i class="bi bi-check-circle-fill"></i>{{ $item->nombre }}</li> --}}
                                            <div class="card mt-5 card_map_item">
                                                <img src="{{ env('URL_WEB_SERVER') }}/41zre-media/images/mapas/{{ $planData->codigo_plan }}/CARACTERIZACION/LEG/thumbnails/{{ $item->codigo }}.jpg"
                                                    class="img-fluid card-img-top" alt="">
                                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="bi bi-layers"></i>&nbsp;{{ $item->nombre }}</h5>
                                                    <span class="badge bg-success">LEG</span>&nbsp;

                                                    <a href="#"><i class="bi bi-filetype-pdf"></i></a> &nbsp;
                                                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                                    <a href="#" class="cta-btn align-self-start">ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                    @break

                                    @case(5)
                                        <div class="col-md-4 col-sm-6 col-12" data-aos="zoom-in" data-aos-delay="100">
                                            {{-- <li><i class="bi bi-check-circle-fill"></i>{{ $item->nombre }}</li> --}}
                                            <div class="card mt-5 card_map_item">
                                                <img src="{{ env('URL_WEB_SERVER') }}/41zre-media/images/mapas/{{ $planData->codigo_plan }}/CARACTERIZACION/TIC/thumbnails/{{ $item->codigo }}.jpg"
                                                    class="img-fluid card-img-top" alt="">
                                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="bi bi-layers"></i>&nbsp;{{ $item->nombre }}</h5>
                                                    <span class="badge bg-success">TIC</span>&nbsp;

                                                    <a href="#"><i class="bi bi-filetype-pdf"></i></a> &nbsp;
                                                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                                    <a href="#" class="cta-btn align-self-start">ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                    @break

                                    @case(6)
                                        <div class="col-md-4 col-sm-6 col-12" data-aos="zoom-in" data-aos-delay="100">
                                            {{-- <li><i class="bi bi-check-circle-fill"></i>{{ $item->nombre }}</li> --}}
                                            <div class="card mt-5 card_map_item">
                                                <img src="{{ env('URL_WEB_SERVER') }}/41zre-media/images/mapas/{{ $planData->codigo_plan }}/CARACTERIZACION/ARQ/thumbnails/{{ $item->codigo }}.jpg"
                                                    class="img-fluid card-img-top" alt="">
                                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="bi bi-layers"></i>&nbsp;{{ $item->nombre }}</h5>
                                                    <span class="badge bg-success">ARQ</span>&nbsp;

                                                    <a href="#"><i class="bi bi-filetype-pdf"></i></a> &nbsp;
                                                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                                    <a href="#" class="cta-btn align-self-start">ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                    @break

                                    @case(7)
                                        <div class="col-md-4 col-sm-6 col-12" data-aos="zoom-in" data-aos-delay="100">
                                            {{-- <li><i class="bi bi-check-circle-fill"></i>{{ $item->nombre }}</li> --}}
                                            <div class="card mt-5 card_map_item">
                                                <img src="{{ env('URL_WEB_SERVER') }}/41zre-media/images/mapas/{{ $planData->codigo_plan }}/CARACTERIZACION/ECO/thumbnails/{{ $item->codigo }}.jpg"
                                                    class="img-fluid card-img-top" alt="">
                                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="bi bi-layers"></i>&nbsp;{{ $item->nombre }}</h5>
                                                    <span class="badge bg-success">ECO</span>&nbsp;

                                                    <a href="#"><i class="bi bi-filetype-pdf"></i></a> &nbsp;
                                                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                                    <a href="#" class="cta-btn align-self-start">ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                    @break

                                    @case(8)
                                        <div class="col-md-4 col-sm-6 col-12" data-aos="zoom-in" data-aos-delay="100">
                                            {{-- <li><i class="bi bi-check-circle-fill"></i>{{ $item->nombre }}</li> --}}
                                            <div class="card mt-5 card_map_item">
                                                <img src="{{ env('URL_WEB_SERVER') }}/41zre-media/images/mapas/{{ $planData->codigo_plan }}/CARACTERIZACION/SOC/thumbnails/{{ $item->codigo }}.jpg"
                                                    class="img-fluid card-img-top" alt="">
                                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="bi bi-layers"></i>&nbsp;{{ $item->nombre }}</h5>
                                                    <span class="badge bg-success">SOC</span>&nbsp;

                                                    <a href="#"><i class="bi bi-filetype-pdf"></i></a> &nbsp;
                                                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                                    <a href="#" class="cta-btn align-self-start">ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                    @break

                                    @case(9)
                                        <div class="col-md-4 col-sm-6 col-12" data-aos="zoom-in" data-aos-delay="100">
                                            {{-- <li><i class="bi bi-check-circle-fill"></i>{{ $item->nombre }}</li> --}}
                                            <div class="card mt-5 card_map_item">
                                                <img src="{{ env('URL_WEB_SERVER') }}/41zre-media/images/mapas/{{ $planData->codigo_plan }}/CARACTERIZACION/GRL/thumbnails/{{ $item->codigo }}.jpg"
                                                    class="img-fluid card-img-top" alt="">
                                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="bi bi-layers"></i>&nbsp;{{ $item->nombre }}</h5>
                                                    <span class="badge bg-success">GRL</span>&nbsp;

                                                    <a href="#"><i class="bi bi-filetype-pdf"></i></a> &nbsp;
                                                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                                    <a href="#" class="cta-btn align-self-start">ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                    @break

                                    @default
                                @endswitch
                            @endforeach

                        </div>
                    </div><!-- End Tab Content 1 -->

                    <div class="tab-pane" id="tab-2">
                        <div class="row gy-4">
                            <div class="col-lg-8 order-2 order-lg-1">
                                <h3>Propuesta</h3>
                                <p>
                                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                    reprehenderit in voluptate
                                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in
                                    culpa qui officia deserunt mollit anim id est laborum
                                </p>
                                <p class="fst-italic">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore
                                    magna aliqua.
                                </p>



                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center">
                                <img src="{{ url('frontend/assets/img/features-2.svg') }}" alt=""
                                    class="img-fluid">
                            </div>
                        </div>
                        <div class="row">

                            @foreach ($mapasPropuesta as $item)
                                @switch($item->componente_id)
                                    @case(1)
                                        <div class="col-md-4 col-sm-6 col-12" data-aos="zoom-in" data-aos-delay="100">
                                            {{-- <li><i class="bi bi-check-circle-fill"></i>{{ $item->nombre }}</li> --}}
                                            <div class="card mt-5 card_map_item">
                                                <img src="{{ env('URL_WEB_SERVER') }}/41zre-media/images/mapas/{{ $planData->codigo_plan }}/PROPUESTA/FC/thumbnails/{{ $item->codigo }}.jpg"
                                                    class="img-fluid card-img-top" alt="">
                                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="bi bi-layers"></i>&nbsp;{{ $item->nombre }}</h5>
                                                    <span class="badge bg-secondary">FC</span>&nbsp;

                                                    <a href="#"><i class="bi bi-filetype-pdf"></i></a> &nbsp;
                                                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                                    <a href="#" class="cta-btn align-self-start">ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                    @break

                                    @case(2)
                                        <div class="col-md-4 col-sm-6 col-12" data-aos="zoom-in" data-aos-delay="100">
                                            {{-- <li><i class="bi bi-check-circle-fill"></i>{{ $item->nombre }}</li> --}}
                                            <div class="card mt-5 card_map_item">
                                                <img src="{{ env('URL_WEB_SERVER') }}/41zre-media/images/mapas/{{ $planData->codigo_plan }}/PROPUESTA/GRD/thumbnails/{{ $item->codigo }}.jpg"
                                                    class="img-fluid card-img-top" alt="">
                                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="bi bi-layers"></i>&nbsp;{{ $item->nombre }}</h5>
                                                    <span class="badge bg-warning">GRD</span>&nbsp;

                                                    <a href="#"><i class="bi bi-filetype-pdf"></i></a> &nbsp;
                                                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                                    <a href="#" class="cta-btn align-self-start">ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                    @break

                                    @case(3)
                                        <div class="col-md-4 col-sm-6 col-12" data-aos="zoom-in" data-aos-delay="100">
                                            {{-- <li><i class="bi bi-check-circle-fill"></i>{{ $item->nombre }}</li> --}}
                                            <div class="card mt-5 card_map_item">
                                                <img src="{{ env('URL_WEB_SERVER') }}/41zre-media/images/mapas/{{ $planData->codigo_plan }}/PROPUESTA/AMB/thumbnails/{{ $item->codigo }}.jpg"
                                                    class="img-fluid card-img-top" alt="">
                                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="bi bi-layers"></i>&nbsp;{{ $item->nombre }}</h5>
                                                    <span class="badge bg-info">AMB</span>&nbsp;

                                                    <a href="#"><i class="bi bi-filetype-pdf"></i></a> &nbsp;
                                                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                                    <a href="#" class="cta-btn align-self-start">ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                    @break

                                    @case(4)
                                        <div class="col-md-4 col-sm-6 col-12" data-aos="zoom-in" data-aos-delay="100">
                                            {{-- <li><i class="bi bi-check-circle-fill"></i>{{ $item->nombre }}</li> --}}
                                            <div class="card mt-5 card_map_item">
                                                <img src="{{ env('URL_WEB_SERVER') }}/41zre-media/images/mapas/{{ $planData->codigo_plan }}/PROPUESTA/LEG/thumbnails/{{ $item->codigo }}.jpg"
                                                    class="img-fluid card-img-top" alt="">
                                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="bi bi-layers"></i>&nbsp;{{ $item->nombre }}</h5>
                                                    <span class="badge bg-success">LEG</span>&nbsp;

                                                    <a href="#"><i class="bi bi-filetype-pdf"></i></a> &nbsp;
                                                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                                    <a href="#" class="cta-btn align-self-start">ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                    @break

                                    @case(5)
                                        <div class="col-md-4 col-sm-6 col-12" data-aos="zoom-in" data-aos-delay="100">
                                            {{-- <li><i class="bi bi-check-circle-fill"></i>{{ $item->nombre }}</li> --}}
                                            <div class="card mt-5 card_map_item">
                                                <img src="{{ env('URL_WEB_SERVER') }}/41zre-media/images/mapas/{{ $planData->codigo_plan }}/PROPUESTA/TIC/thumbnails/{{ $item->codigo }}.jpg"
                                                    class="img-fluid card-img-top" alt="">
                                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="bi bi-layers"></i>&nbsp;{{ $item->nombre }}</h5>
                                                    <span class="badge bg-success">TIC</span>&nbsp;

                                                    <a href="#"><i class="bi bi-filetype-pdf"></i></a> &nbsp;
                                                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                                    <a href="#" class="cta-btn align-self-start">ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                    @break

                                    @case(6)
                                        <div class="col-md-4 col-sm-6 col-12" data-aos="zoom-in" data-aos-delay="100">
                                            {{-- <li><i class="bi bi-check-circle-fill"></i>{{ $item->nombre }}</li> --}}
                                            <div class="card mt-5 card_map_item">
                                                <img src="{{ env('URL_WEB_SERVER') }}/41zre-media/images/mapas/{{ $planData->codigo_plan }}/PROPUESTA/ARQ/thumbnails/{{ $item->codigo }}.jpg"
                                                    class="img-fluid card-img-top" alt="">
                                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="bi bi-layers"></i>&nbsp;{{ $item->nombre }}</h5>
                                                    <span class="badge bg-success">ARQ</span>&nbsp;

                                                    <a href="#"><i class="bi bi-filetype-pdf"></i></a> &nbsp;
                                                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                                    <a href="#" class="cta-btn align-self-start">ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                    @break

                                    @case(7)
                                        <div class="col-md-4 col-sm-6 col-12" data-aos="zoom-in" data-aos-delay="100">
                                            {{-- <li><i class="bi bi-check-circle-fill"></i>{{ $item->nombre }}</li> --}}
                                            <div class="card mt-5 card_map_item">
                                                <img src="{{ env('URL_WEB_SERVER') }}/41zre-media/images/mapas/{{ $planData->codigo_plan }}/PROPUESTA/ECO/thumbnails/{{ $item->codigo }}.jpg"
                                                    class="img-fluid card-img-top" alt="">
                                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="bi bi-layers"></i>&nbsp;{{ $item->nombre }}</h5>
                                                    <span class="badge bg-success">ECO</span>&nbsp;

                                                    <a href="#"><i class="bi bi-filetype-pdf"></i></a> &nbsp;
                                                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                                    <a href="#" class="cta-btn align-self-start">ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                    @break

                                    @case(8)
                                        <div class="col-md-4 col-sm-6 col-12" data-aos="zoom-in" data-aos-delay="100">
                                            {{-- <li><i class="bi bi-check-circle-fill"></i>{{ $item->nombre }}</li> --}}
                                            <div class="card mt-5 card_map_item">
                                                <img src="{{ env('URL_WEB_SERVER') }}/41zre-media/images/mapas/{{ $planData->codigo_plan }}/PROPUESTA/SOC/thumbnails/{{ $item->codigo }}.jpg"
                                                    class="img-fluid card-img-top" alt="">
                                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="bi bi-layers"></i>&nbsp;{{ $item->nombre }}</h5>
                                                    <span class="badge bg-success">SOC</span>&nbsp;

                                                    <a href="#"><i class="bi bi-filetype-pdf"></i></a> &nbsp;
                                                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                                    <a href="#" class="cta-btn align-self-start">ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                    @break

                                    @case(9)
                                        <div class="col-md-4 col-sm-6 col-12" data-aos="zoom-in" data-aos-delay="100">
                                            {{-- <li><i class="bi bi-check-circle-fill"></i>{{ $item->nombre }}</li> --}}
                                            <div class="card mt-5 card_map_item">
                                                <img src="{{ env('URL_WEB_SERVER') }}/41zre-media/images/mapas/{{ $planData->codigo_plan }}/PROPUESTA/GRL/thumbnails/{{ $item->codigo }}.jpg"
                                                    class="img-fluid card-img-top" alt="">
                                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="bi bi-layers"></i>&nbsp;{{ $item->nombre }}</h5>
                                                    <span class="badge bg-success">GRL</span>&nbsp;

                                                    <a href="#"><i class="bi bi-filetype-pdf"></i></a> &nbsp;
                                                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                                    <a href="#" class="cta-btn align-self-start">ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                    @break

                                    @default
                                @endswitch
                            @endforeach
                        </div>
                    </div><!-- End Tab Content 2 -->



                </div>

            </div>
        </section>


        <div class="container">

            {{-- <h1>{{ $urlServer }}</h1> --}}


        </div>


    </main>
@endsection
