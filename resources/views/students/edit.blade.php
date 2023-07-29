@extends("students.layout")
@section("title") Update Students @endsection
@section("content")

<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 text-right">
            <a href="{{route('students.index')}}" class="btn btn-danger"> Back to Students </a>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
            <form action="{{route('students.update', $student->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card shadow">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">× </button>
                            {{Session::get('success')}}
                        </div>
                    @elseif(Session::has('failed'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">× </button>
                            {{Session::get('failed')}}
                        </div>
                    @endif

                    <div class="card-header">
                        <h4 class="card-title"> Update Students </h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title"> First Name </label>
                            <input type="text" name="firstname" class="form-control" id="title" value="@if(!empty($student)) {{$student->firstname}} @endif">
                        </div>

                        <div class="form-group">
                            <label for="title"> Last Name </label>
                            <input type="text" name="lastname" class="form-control" id="title" value="@if(!empty($student)) {{$student->lastname}} @endif">
                        </div>
                        <div class="form-group">
                            <label for="title"> Email </label>
                            <input type="email" name="email" class="form-control" id="email" value="@if(!empty($student)) {{$student->email}} @endif">
                        </div>

                        <div class="form-group">
                            <label for="title">Gender</label>
                            <input type="radio" name="gender" value="Male" @if(!empty($student) && $student->gender === 'Male') checked @endif> Male
                            <input type="radio" name="gender" value="Female" @if(!empty($student) && $student->gender === 'Female') checked @endif> Female
                        </div>

                        <div class="form-group">
                            <label for="title">Date of Birth</label>
                            <input type="date" class="datepicker form-control" name="date_of_birth" placeholder="Date of Birth" value="{{ !empty($student) ? $student->date_of_birth : '' }}">
                        </div>

                        <div class="form-group">
                            <label for="title">Contact Number</label>
                            <input type="number" name="contact_number" class="form-control" id="contactnumber" value="{{ !empty($student) ? $student->contact_number : '' }}">
                        </div>

                        <div class="form-group">
                            <input type="checkbox" name="confirmation" value="1" @if(!empty($student) && $student->confirmation) checked @endif> Confirmation
                        </div>

                        <div class="form-group">
                            <label for="description"> Description </label>
                            <textarea class="form-control" name="description" id="description">@if(!empty($student)){{$student->description}}@endif</textarea>
                            {!!$errors->first("description", "<span class='text-danger'>:message </span>") !!}
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"> Update </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
