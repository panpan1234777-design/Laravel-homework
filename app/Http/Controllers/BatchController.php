<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBatchRequest;
use App\Http\Requests\UpdateBatchRequest;
use Illuminate\Http\Request;
use App\Models\Batch;

class BatchController extends Controller
{
    public function index()
    {
        $batches = Batch::all();
        return view('batches.index',compact('batches'));
    }
    public function edit($id)
    {
        $batch =Batch::find($id);
        return view('Batches.edit',compact('batch'));
    }
    public function update(UpdateBatchRequest $request)
    {
        $batch=Batch::find($request->id);
        $batch->update ([
            'name' => $request->name,
            'description'=>$request->description
        ]);
        return redirect()->route('batches.index');
    }
    public function create()
    {
        return view('batches.create');
    }
    public function store(CreateBatchRequest $request)
    {
        Batch::create([
            'name'=>$request->name,
            'description'=> $request->description,
        ]);
        return redirect()->route('batches.index');
    }
    public function delete($id)
    {
        $batch = Batch::find($id);
        $batch->delete();
        return redirect()->route('batches.index');
    }
}
