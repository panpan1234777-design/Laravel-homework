<?php
namespace App\Repositories\Student;
use App\Models\Student;
use App\Models\Batch;

class StudentRepository implements StudentRepositoryInterface
{
    public function index()
    {
        return Student::with('batch')->get();
    }
    public function show($id)
    {
        return Student::find($id);
    }
    public function store($data)
    {
        return Student::create($data);
    }
    public function getBatches()
    {
        return Batch::get();
    }
}



