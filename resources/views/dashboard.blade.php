@extends('dashboard_layout')
@section('dashboard_section')
<div class="row mb-4">
    <div class="col-md-6 mb-4">
        <div class="bg-image hover-overlay ripple shadow-custom rounded mb-4" data-ripple-color="light">
            <picture>
                <img src="{{asset('images/programmer1.png')}}" class="img-fluid" height="20px" alt="Standard UI Kit">
            </picture>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card border m-2 p-2 rounded shadow bg-white text-center" style="height: 85%; overflow-y: auto;">
            <div class="card-header">
                <strong><center>PROJECTS</center></strong>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ url('LaravelCrud') }}">Laravel CRUD</a></li>
                    <li class="list-group-item"><a href="">Laravel with jQuery AJax</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- <div class="row mb-4">
    <div class="col-md-12">
        <div class="bg-image hover-overlay ripple shadow-custom rounded mb-4" data-ripple-color="light">
            <picture>
                <img src="{{asset('images/exp_programmer.png')}}" class="img-fluid" width="100%" height="20px" alt="Standard UI Kit">
            </picture>
        </div>
    </div>
</div>
--}}