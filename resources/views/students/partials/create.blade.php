@extends("students.layout")
@section("title") Create Students @endsection
@section("content")

<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 text-right">
            <a href="{{route('students.index')}}" class="btn btn-danger"> Back to Students </a>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
                <form action="{{route('students.store')}}" method="POST">
                    @csrf
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
                            <h4 class="card-title"> Register </h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="title"> First Name </label>
                                <input type="text" name="firstname" placeholder="First Name" class="form-control" id="firstname" value="{{old('title')}}">
                            </div>
                            <div class="form-group">
                                <label for="title"> Last Name </label>
                                <input type="text" name="lastname" class="form-control" id="lastname" value="{{old('title')}}" placeholder="Last Name">
                            </div>

                            <div class="form-group">
                                <label for="title"> Email </label>
                                <input type="email" name="email" class="form-control" id="email" value="{{old('title')}}" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <label for="title"> Gender </label>
                                <input type="radio" name="gender" value="Male"> Male
                                <input type="radio" name="gender" value="Female"> Female
                            </div>

                            <div class="form-group">
                                <label for="title"> Date of Birth </label>
                                <input type="date" class="datepicker" name="date_of_birth" placeholder="Date of Birth">
                            </div>

                            <div class="form-group">
                                <label for="title"> Contact Number </label>
                                <input type="number" name="contact_number" class="form-control" id="contactnumber" value="{{old('title')}}" placeholder="Contact Number">
                            </div>

                            <div class="form-group">
                                <input type="checkbox" name="confirmation" value="1"> Confirmation
                            </div>

                            <div class="form-group">
                                <label for="description"> Description </label>
                                <textarea class="form-control" name="description" id="description">{{old('description')}}</textarea>
                            </div>
                        </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"> Save </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
