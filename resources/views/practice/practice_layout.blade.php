@extends('dashboard_layout')
@section('dashboard_section')
    <div class="row mb-4">
        <div class="col-md-5 mb-4">
            <div class="bg-image hover-overlay ripple shadow-custom rounded  mt-5 mb-4" data-ripple-color="light">
                <picture>
                    <img src="{{asset('images/practice_programmer.svg')}}" class="img-fluid" height="fa-rotate-18020px" alt="Standard UI Kit">
                </picture>
            </div>
        </div>
        <div class="col-md-7 border border-5 shadow p-3 mb-5 bg-white rounded">
            <h3><a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i></a>  
                Laravel Crud 
                @if (Request::route()->getName() == 'LaravelCrud.index')
                <a class="float-right" href="{{ route('LaravelCrud.create') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                @else
                <a class="float-right" href="{{ route('LaravelCrud.index') }}"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
                @endif
            </h3>
            @yield('practice_section')
        </div>
    </div>
    {{-- <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <h1 class="display-6">Practice </h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        
                </ul>
            </div>
            <div class="float-right">
                <a href="{{ url('/') }}"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>  
               
            </div>
        </nav>
    </div> --}}
@endsection

