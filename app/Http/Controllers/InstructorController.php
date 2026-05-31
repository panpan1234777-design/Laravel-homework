<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateInstructorRequest;
use App\Models\Instructor;
use App\Repositories\Instructor\InstructorRepositoryInterface;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    protected $instructorRepository;
    public function __construct(InstructorRepositoryInterface $instructorRepository)
    {
        $this->instructorRepository = $instructorRepository;

    }
    public function index()
    {
        $instructors = $this->instructorRepository->index();
        return view('instructors.index', compact('instructors'));
    }
    public function edit($id)
    {
        $instructor = $this->instructorRepository->show($id);
        return view('instructors.edit', compact('instructor'));
    }
    public function update(UpdateInstructorRequest $request)
    {
        $instructor= $this->instructorRepository->show($request->id);
        $instructor->update ([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone
        ]);
        if($request->hasFile('image')){
            $imageName=time().'.'. $request->image->extension();
            $request->image->move(public_path('instructorImages'), $imageName);
            $data['image'] = $imageName;
        }
        $instructor->update($data);

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
            'phone'=>'nullable|string',
            'image'=>'required'
        ]);
        if($request->hasFile('image')){
            $imageName=time().'.'. $request->image->extension();
            $request->image->move(public_path('instructorImages'), $imageName);
            $instructor =array_merge($instructor,['image'=>$imageName]);
        }
        $this->instructorRepository->store($instructor);
        return redirect()->route ('instructors.index');
    }
    public function delete($id)
    {
        $instructor=$this->instructorRepository->show($id);
        $instructor->delete();
        return redirect()->route('instructors.index');
    }
}
