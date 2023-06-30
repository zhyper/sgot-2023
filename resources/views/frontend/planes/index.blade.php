@extends('frontend.layout')


@section('slideshow')
    @include('frontend.layout.slide',['idSlide' => 2])
@endsection


@section('content')
    <main id="main">

        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Planes Territoriales</h2>
                    <p>Ea vitae aspernatur deserunt voluptatem impedit deserunt magnam occaecati dssumenda quas ut ad
                        dolores adipisci aliquam.</p>
                </div>

                <div class="row gy-5">


                    @foreach ($planes as $item)

                        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                            <div class="service-item">
                                <div class="img">
                                    {{-- <img src="{{ url('frontend/assets/img/services-1.jpg') }}" class="img-fluid" --}}
                                    <img src="{{ env('URL_WEB_SERVER') }}/41zre-media/documents/{{ $item->codigo_plan }}/{{ $item->codigo_plan }}.jpg" class="img-fluid"
                                        alt="">
                                </div>
                                <div class="details position-relative">
                                    <div class="icon">
                                        <i class="bi bi-folder-check"></i>
                                    </div>
                                    <a href="{{ route('planes.plan',$item->codigo_plan) }}" class="stretched-link">
                                        <h3>{{ $item->nombre }}</h3>
                                    </a>
                                    <p>{{ $item->descripcion}}.</p>
                                </div>
                            </div>
                        </div><!-- End Service Item -->
                    @endforeach

                </div>
            </div>
        </section>

    </main>
@endsection
