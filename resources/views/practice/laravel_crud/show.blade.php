@extends('practice.practice_layout')
@section('practice_section')
<div class="card border mt-8 rounded shadow bg-white">
    {{-- Show content comes here --}}
    {{--  --}}
    {{-- <div class="card" style="max-width: 500px;"> --}}
        <div class="row no-gutters">
            <div class="col-sm-5" style="background: #868e96;">
                @if(is_file(public_path().'/'.$UserData->img_path))
                    <img src="{{ asset($UserData->img_path) }}" class="card-img-top h-100" alt="...">
                @else
                    <img src="{{ asset('images/default.png') }}" class="card-img-top h-100" alt="">
                @endif
                
            </div>
            <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="card-title text-uppercase">{{ $UserData->uname }} </h5>
                    <h6 class="text-uppercase">{{ $UserData->job_type }}</span></h6>
                    
                    @foreach(explode(",", $UserData->languages) as $key => $value)
                        <span class="badge badge-pill badge-primary">{{ $value }}</span>
                    @endforeach
                    <p>Experiance  <span class="badge badge-light btn-sm">{{ $UserData->experiane}}</p>
                    <strong>Description : </strong>
                    <p>{{ $UserData->describe }}
                    </p>
                </div>
            </div>
        </div>
    {{-- </div> --}}
</div>
@endsection