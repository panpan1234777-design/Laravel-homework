<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;
use App\Models\Student;



class StudentController extends Controller
{
    public function index()
    {
        $students= Student::all();
        return view('students.index',compact('students'));
    }
    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit',compact('student'));
    }
    public function update(UpdateStudentRequest $request)
    {
        $student=Student::find($request->id);
        $student->update ([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address
        ]);
        return redirect()->route('students.index');
    }
    public function create()
    {
        // dd('here');
        return view('students.create');
    }
    public function store(Request $request)
    {
        $student = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string',
            'phone'=>'required|string'
        ]);
        Student::create($request->all());
        return redirect()->route('students.index');
    }
    public function delete($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('students.index');
    }
}
