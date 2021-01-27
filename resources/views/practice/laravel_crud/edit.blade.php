@extends('practice.practice_layout')
@section('practice_section')
    <strong>EDIT USER </strong>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <br>
    <form action="{{ route('LaravelCrud.update',$UserData->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleFormControlInput1">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" name="email" value="{{ $UserData->email }}" placeholder="name@example.com">
        </div>

        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        @method('put')

        <div class="form-group">
            <label for="exampleFormControlInput2">User Name</label>
            <input type="name" class="form-control" id="exampleFormControlInput2" name="uname" value="{{ $UserData->uname }}" placeholder="User Name">
        </div>
     
        <div class="form-group">
            <label>Gender</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" 
                        value="M"  {{ $UserData->gender == 'M' ? 'checked' : '' }}>
                <label class="form-check-label" for="inlineRadio1">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                        value="F"  {{ $UserData->gender == 'F' ? 'checked' : '' }}>
                <label class="form-check-label" for="inlineRadio2">Female</label>
            </div>
        </div>

        <div class="form-group">
            <label>Birth Date</label>
            <input type="date" class="form-control" required name="bday" value="{{ $UserData->bday }}" id="bday">
        </div>
 
        <div class="form-group">
            <label for="exampleFormControlSelect1">Job Type</label>
            <select class="form-control" name="job_type" id="exampleFormControlSelect1">
                <option value="">Please Select</option>
                <option {{ $UserData->job_type == 'FrontEnd Developer' ? 'selected' : '' }}>FrontEnd Developer</option>
                <option {{ $UserData->job_type == 'Backend Developer' ? 'selected' : '' }}>Backend Developer</option>
                <option {{ $UserData->job_type == 'Full Stack Developer' ? 'selected' : '' }}>Full Stack Developer</option>
                <option {{ $UserData->job_type == 'DevOps' ? 'selected' : '' }}>DevOps</option>
                <option {{ $UserData->job_type == 'UI/UX' ? 'selected' : '' }}>UI/UX</option>
                <option {{ $UserData->job_type == 'Tester' ? 'selected' : '' }}>Tester</option>
            </select>
        </div>

        <div class="form-group">
            <label>Experiance (in years)</label>
            <input type="number" class="form-control" required name="experiane" min="0" id="experiance" value="{{ $UserData->experiane }}" placeholder="Experiance">
        </div>
 
        <div class="form-group">
           @php 
                $languages  = explode(', ' ,$UserData->languages); 
           @endphp
          <label for="exampleFormControlSelect2">Programming Languages</label>
            <select multiple class="form-control" name="languages[]" id="exampleFormControlSelect2">
                <option {{ (in_array('PHP', $languages)) ? 'selected' : '' }}>PHP</option>
                <option {{ (in_array('JAVA', $languages)) ? 'selected' : '' }}>JAVA</option>
                <option {{ (in_array('ANDROID', $languages)) ? 'selected' : '' }}>ANDROID</option>
                <option {{ (in_array('PYTHON', $languages)) ? 'selected' : '' }}>PYTHON</option>
                <option {{ (in_array('HTML/CSS/JS', $languages)) ? 'selected' : '' }}>HTML/CSS/JS</option>
                <option {{ (in_array('SQL', $languages)) ? 'selected' : '' }}>SQL</option>
                <option {{ (in_array('CPP', $languages)) ? 'selected' : '' }}>CPP</option>
                <option {{ (in_array('C', $languages)) ? 'selected' : '' }}>C</option>
            </select>
        </div>
     
        <div class="form-group">
            <label>Photo</label><br>

            @if(is_file(public_path().'/'.$UserData->img_path))
                <img src="{{ asset($UserData->img_path) }}" class="img-thumbnail" width="25%" height="%" alt="...">
            @endif
            <input type="hidden" name="old_imge_path" value="{{ $UserData->img_path }}">
            <input type="file" name="photo">
        </div>
        

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Describe Youerself in short</label>
          <textarea class="form-control" name="describe" required id="exampleFormControlTextarea1" rows="3">{{ $UserData->describe}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>
@endsection