<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController;
use App\Models\Instructor;
use App\Repositories\Instructor\InstructorRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class InstructorController extends BaseController
{
    protected $instructorRepository;
    public function __construct(InstructorRepositoryInterface $instructorRepository)

    {
        $this->instructorRepository = $instructorRepository;
    }
    public function index()
    {

        $instructors = $this->instructorRepository->index();
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
        $instructor = $this->instructorRepository->store($data);

        return $this->success($instructor, "Instructor created successfully", 201);
    }

    public function show($id)
    {
        $instructor = $this->instructorRepository->show($id);
        return $this->success($instructor, "Instructor showed successfully", 200);
    }

    public function update(Request $request, $id)
    {
        $instructor = $this->instructorRepository->show($id);

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
        $instructor = $this->instructorRepository->show($id);
        $instructor->delete();

        return $this->success(null, "Instructor deleted successfully", 200);
    }
}
