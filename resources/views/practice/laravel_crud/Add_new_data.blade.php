@extends('practice.practice_layout')
@section('practice_section')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <br>
    <form action="{{ route('LaravelCrud.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleFormControlInput1">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com">
        </div>
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="exampleFormControlInput2">User Name</label>
            <input type="name" class="form-control" id="exampleFormControlInput2" name="uname" placeholder="User Name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput3">Password</label>
            <input type="password" class="form-control" id="exampleFormControlInput3" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput4">Confirm Password</label>
            <input type="password" class="form-control" id="exampleFormControlInput4" name="password_confirmation" placeholder="Confirm Password">
        </div>
        
        <div class="form-group">
            <label>Gender</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M">
                <label class="form-check-label" for="inlineRadio1">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="F">
                <label class="form-check-label" for="inlineRadio2">Female</label>
            </div>
        </div>

        <div class="form-group">
            <label>Birth Date</label>
            <input type="date" class="form-control" required name="bday" id="bday">
        </div>
 
        <div class="form-group">
            <label for="exampleFormControlSelect1">Job Type</label>
            <select class="form-control" name="job_type" id="exampleFormControlSelect1">
              <option value="">Please Select</option>
              <option>FrontEnd Developer</option>
              <option>Backend Developer</option>
              <option>Full Stack Developer</option>
              <option>DevOps</option>
              <option>UI/UX</option>
              <option>Tester</option>
            </select>
        </div>

        <div class="form-group">
            <label>Experiance (in years)</label>
            <input type="number" class="form-control" required name="experiane" min="0" id="experiance" placeholder="Experiance">
        </div>
 
        <div class="form-group">
          <label for="exampleFormControlSelect2">Programming Languages</label>
          <select multiple class="form-control" name="languages[]" id="exampleFormControlSelect2">
            <option>PHP</option>
            <option>JAVA</option>
            <option>ANDROID</option>
            <option>PYTHON</option>
            <option>HTML/CSS/JS</option>
            <option>SQL</option>
            <option>CPP</option>
            <option>C</option>
          </select>
        </div>
     
        <div class="form-group">
            <label>Photo</label><br>
            {{--  <div class="custom-file">  --}}
                <input type="file" name="photo" required>
                {{--  class="custom-file-input" id="customFile">  --}}
                {{--  <label class="custom-file-label" for="customFile">Choose file</label>  --}}
            {{--  </div>  --}}
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Describe Youerself in short</label>
          <textarea class="form-control" name="describe" required id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="t&c" id="inlineCheckbox3" value="1">
            <label class="form-check-label" for="inlineCheckbox3">I agree to terms and conditions</label>
        </div> 
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>
@endsection