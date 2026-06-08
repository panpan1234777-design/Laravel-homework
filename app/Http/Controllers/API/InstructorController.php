<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class InstructorController extends BaseController
{
    public function index()
    {
        $instructors = Instructor::all();
        return $this->success($instructors, "Instructors retrieved successfully", 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string',
            'email'    => 'required|string',
            'phone' =>'required|string',
        ]);

        if ($validator->fails()) {
            return $this->error("Validation Error", $validator->errors(), 422);
        }

        $data = $validator->validated();
        $instructor = Instructor::create($data);

        return $this->success($instructor, "Instructor created successfully", 201);
    }

    public function show($id)
    {
        $instructor = Instructor::find($id);
        return $this->success($instructor, "Instructor showed successfully", 200);
    }

    public function update(Request $request, $id)
    {
        $instructor = Instructor::find($id);

        $validator = Validator::make($request->all(), [
            'name'     => 'required|string',
            'email'    => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->error("Validation Error", $validator->errors(), 422);
        }

        $data = $validator->validated();

            $instructor->update($data);

            return $this->success($instructor, "Instructor updated successfully", 200);
        }
    public function delete($id)
    {
        $instructor = Instructor::find($id);
        $instructor->delete();

        return $this->success(null, "Instructor deleted successfully", 200);
    }
}
