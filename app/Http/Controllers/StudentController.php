<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students =  Student::latest()->paginate(5);
        return view("students.index", compact('students'));
    }

    public function create()
    {
        return view('students.partials.create');
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                "firstname" => "required",
                "lastname"  => "required",
                "email" => "required|unique:students,email",
                "contact_number"  => "required",
                "date_of_birth"  => "required",
                "gender"  => "required",
            ]
        );

        $students  =  Student::create($request->all());

        if(!is_null($students)) {
            return back()->with("success", "Success! register created");
        }

        else {
            return back()->with("failed", "Alert! register not created");
        }

        return view('students.index');
    }

    public function edit($id)
    {
        $student = Student::find($id);

        return view('students.edit', compact('student'));
    }

    public function update(Request $request,$id)
    {
        $student = Student::find($id);
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->contact_number = $request->contact_number;
        $student->date_of_birth = $request->date_of_birth;
        $student->gender = $request->gender;
        $student->confirmation = $request->confirmation;
        $student->save();

        return redirect()->route('students.index');

    }

    public function destroy($id)
    {
        $student = Student::find($id);

        $student  = $student->delete();

        if(!is_null($student)) {
            return back()->with("success", "Success! Article deleted");
        }
        else {
            return back()->with("failed", "Alert! Article not deleted");
        }
    }

}
