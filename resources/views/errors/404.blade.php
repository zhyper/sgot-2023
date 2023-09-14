@extends('frontend.layout')

@section('content')


    <div class="container mt-5 pt-5">
        <div class="text-center">
            {{-- <h2 class="display-3">404</h2> --}}
            {{-- <p class="display-5">Oops! Something is wrong.</p> --}}
            <img class="img-fluid" src="{{ asset('backend/assets/images/404-page-not-found.png') }}" alt="" srcset="">
        </div>
    </div>


@endsection
