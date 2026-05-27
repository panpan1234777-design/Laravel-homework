<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateInstructorRequest;
use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index()
    {
        $instructors = Instructor::all();
        return view('instructors.index', compact('instructors'));
    }
    public function edit($id)
    {
        $instructor =Instructor::find($id);
        return view('instructors.edit', compact('instructor'));
    }
    public function update(UpdateInstructorRequest $request)
    {
        $instructor=Instructor::find($request->id);
        $instructor->update ([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone
        ]);
        return redirect()->route ('instructors.index');
    }
    public function create()
    {
        return view('instructors.create');
    }
    public function store(Request $request)
    {
        $instructor = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string',
            'phone'=>'nullable|string'

        ]);
        Instructor::create($request->all());
        return redirect()->route ('instructors.index');
    }
    public function delete($id)
    {
        $instructor=Instructor::find($id);
        $instructor->delete();
        return redirect()->route('instructors.index');
    }

}
