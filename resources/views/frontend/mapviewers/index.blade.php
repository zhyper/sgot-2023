@extends('frontend.layout')

@section('content')
    {{-- <style>
    .card_map_item {
        box-shadow: 0px 0px 12px 0px #ccc;
    }
</style> --}}
    <main>
        <br>
        <br>
        <br>
        <div class="container">
            <div class="row mt-5">

                <h2>MAP VIEWERS</h2>
            </div>
            <div class="row mb-5">

                @foreach ($viewers as $item)
                    <div class="col-md-6 col-sm-6 col-12">
                        {{-- <li><i class="bi bi-check-circle-fill"></i>{{ $item->nombre }}</li> --}}
                        <div class="card mt-5 card_map_item">
                            <a href="#">
                                <img src="{{ env('URL_WEB_SERVER') }}/41zre-media/images/cards/mapviewers/{{ $item->codigo }}.jpg"
                                    class="img-fluid card-img-top" alt=""></a>
                            {{-- <img src="..." class="card-img-top" alt="..."> --}}
                            <div class="card-body">
                                <h5 class="card-title"><a href="#"><i class="bi bi-layers"></i>&nbsp;{{ $item->nombre }}</a></h5>
                                <a href="#"><i class="bi bi-filetype-pdf"></i></a> &nbsp;
                                <a href=" {{ route('mapviewer.map',$item->codigo) }}" class="cta-btn align-self-start">ver más</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>





        </div>

        {{-- <h1>{{ env('URL_WEB_SERVER') }}</h1> --}}
    </main>
@endsection
