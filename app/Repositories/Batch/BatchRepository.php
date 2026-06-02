<?php
namespace App\Repositories\Batch;
use App\Models\Batch;

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

}
