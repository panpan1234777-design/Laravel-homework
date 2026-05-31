<?php
namespace App\Repositories\Instructor;
use App\Models\Instructor;
class InstructorRepository implements InstructorRepositoryInterface
{
    public function index()
    {
        return Instructor::get();
    }
    public function show($id)
    {
        return Instructor::find($id);
    }
    public function store($data)
    {
        return Instructor::create($data);
    }

}
