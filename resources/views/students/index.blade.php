@extends('students.layout')

@section('title')
Students
@endsection
@section('content')

    <div class="row mb-4">
        <div class="col-xl-6">
        </div>

        <div class="col-xl-6 text-right">
            <a href="{{ route('students.create') }}" class="btn btn-success "> Add New </a>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <th> Id </th>
            <th> firstname </th>
            <th> lastname </th>
            <th> email </th>
            <th> contact Number </th>
            <th> Date of Birth </th>
            <th> gender </th>
            <th> confirmation </th>
            <th> description </th>
        </thead>

        <tbody>
            @if (count($students) > 0)
                @foreach ($students as $student)
                    <tr>
                        <td> {{ $student->id }} </td>
                        <td> {{ $student->firstname }} </td>
                        <td> {{ $student->lastname }} </td>
                        <td> {{ $student->email }} </td>
                        <td> {{ $student->contact_number }} </td>
                        <td> {{ $student->date_of_birth }} </td>
                        <td> {{ $student->gender }} </td>
                        <td> {{ $student->confirmation == 1 ? "yes" : "No"}} </td>
                        <td>{{ $student->description }}</td>


                        <td>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-info"> View </a>
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-success"> Edit
                                </a>

                                <button type="submit" class="btn btn-sm btn-danger"> Delete </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {!! $students->links() !!}
@endsection
