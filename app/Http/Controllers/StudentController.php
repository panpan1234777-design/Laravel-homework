<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateStudentRequest;
use App\Models\Batch;
use App\Models\Student;
use App\Repositories\Student\StudentRepositoryInterface;
use Illuminate\Http\Request;



class StudentController extends Controller
{
    protected $studentRepository;
    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository=$studentRepository;
    }
    public function index()
    {
        $students= $this->studentRepository->index();
        return view('students.index',compact('students'));
    }
    public function edit($id)
    {
        $student = $this->studentRepository->show($id);
        return view('students.edit',compact('student'));
    }
    public function update(UpdateStudentRequest $request)
    {
        $student= $this->studentRepository->show($request->id);
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'enrolled_at'=>$request->enrolled_at,
            'status'=>$request->status,
        ];
        if($request->hasFile('image')){
            $imageName=time().'.'. $request->image->extension();
            $request->image->move(public_path('studentImages'), $imageName);
            $data['image'] = $imageName;
        }
        $student->update($data);
        return redirect()->route('students.index');
    }
    public function create()
    {
        // dd('here');
        $batches = $this->studentRepository->getBatches();
        return view('students.create',compact('batches'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $student = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string',
            'phone'=>'required|string',
            'address'=>'nullable|string',
            'enrolled_at'=>'nullable|date',
            'status'=>'nullable',
            'image'=>'required',
            'batch_id'=>'required'
        ]);
        if($request->hasFile('image')){
            $imageName=time().'.'. $request->image->extension();
            $request->image->move(public_path('studentImages'), $imageName);
            $data=array_merge($student,['image'=>$imageName]);
        }
        $this->studentRepository->store($data);
        return redirect()->route('students.index');
    }
    public function delete($id)
    {
        $student = $this->studentRepository->show($id);
        $student->delete();
        return redirect()->route('students.index');
    }
}
