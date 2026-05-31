<?php
namespace App\Repositories\Batch;
use App\Models\Batch;
use App\Models\Instructor;

class BatchRepository implements BatchRepositoryInterface
{
    public function index()
    {
        return Batch::with('instructors')->get();
    }
    public function show($id)
    {
        return Batch::find($id);
    }
    public function store($data)
    {
        return Batch::create($data);
    }

    public function getInstructors()
    {
        return Instructor::get();
    }
}
