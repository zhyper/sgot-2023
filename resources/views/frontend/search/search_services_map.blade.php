@extends('frontend.layout')

@section('content')
<style>
    .margin-30{
        margin-top: 100px;
    }

    .profile-card-4 {
        box-shadow: 0px 0px 20px rgba(88, 88, 88, 0.219);
        margin: 20px;
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
</style>

    <main class="main margin-30">
        <div class="container">
            <div class="row">
                <div class="col-md-12 my-auto">
                    <form action="{{ url('search') }}" method="GET" role="search">
                        <div class="input-group">

                            <input type="search" name="search" value="{{ Request::get('search') }}" placeholder="Buscar servicio" class="form-control">
                            <button class="btn btn-outline-secondary bg-gray-500 border-start-0  border " type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                            {{-- @include('frontend.search.search_services_map',['searchServices' => [] ]) --}}
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">

                @forelse ($searchServices as $servicio)

                <div class="col-md-12">

                    <div class="card border-light mb-3 profile-card-4" >
                        <div class="row g-0">
                          <div class="col-md-4 overflow-hidden">
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
            </div>
            <div class="row">
                <div class="col-md-12">
                    {!! $searchServices->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </main>
@endsection
