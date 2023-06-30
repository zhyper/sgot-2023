@php
    $homeslide = App\Models\HomeSlide::find($idSlide);
@endphp



{{-- <h2>{{ $idSlide }}</h2> --}}


<section id="hero" class="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

            @foreach ($homeslide->slides as $slide)
                <!-- Slide 1 -->
                <div class="carousel-item @if ($loop->first) active @endif"
                    style="background-image: url({{ env('URL_WEB_SERVER') }}/41zre-media/slides/home/{{ $slide->image }})">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">{{ $slide->title }}</h2>
                            <p class="animate__animated animate__fadeInUp">{{ $slide->short_title }}</p>
                            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Ver Más</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

    </div>
</section><!-- End Hero -->



<script>
    /**
     * Hero carousel indicators
     */
    let heroCarouselIndicators = select("#hero-carousel-indicators")
    let heroCarouselItems = select('#heroCarousel .carousel-item', true)

    heroCarouselItems.forEach((item, index) => {
        (index === 0) ?
        heroCarouselIndicators.innerHTML += "<li data-bs-target='#heroCarousel' data-bs-slide-to='" + index +
            "' class='active'></li>":
            heroCarouselIndicators.innerHTML += "<li data-bs-target='#heroCarousel' data-bs-slide-to='" +
            index + "'></li>"
    });
</script>
