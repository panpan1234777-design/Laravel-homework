<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends BaseController
{

    public function index()
    {
        $students = Student::with('batch')->get();
        return $this->success($students, "Students with instructor retrieved successfully", 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required|string',
            'email'         => 'required|string',
            'phone' => 'required|string',
            'address' => 'nullable|string',
            'image' => 'nullable|string',
            'enrolled_at' => 'required|string',
            'status' => 'nullable|string',
            'batch_id' => 'required|exists:batches,id',
        ]);

        if ($validator->fails()) {
            return $this->error("Validation Error", $validator->errors(), 422);
        }

        $data = $validator->validated();
        $student = Student::create($data);

        return $this->success($student, "Student created successfully", 201);
    }

    public function show($id)
    {
        $student = Student::with('batch')->find($id);
        return $this->success($student, "Student retrieved successfully", 200);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        $validator = Validator::make($request->all(), [
            'name'          => 'required|string',
            'email'         => 'required|string',
            'batch_id' => 'required|exists:batches,id',
        ]);

        if ($validator->fails()) {
            return $this->error("Validation Error", $validator->errors(), 422);
        }

        $data = $validator->validated();

        $student->update($data);

        return $this->success($student, "Student updated successfully", 200);
    }

    public function delete($id)
    {
        $student = Student::find($id);
        $student->delete();

        return $this->success(null, "Student deleted successfully", 200);
    }
}
