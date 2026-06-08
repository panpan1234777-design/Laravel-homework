<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\CreateBatchRequest;
use App\Http\Requests\UpdateBatchRequest;
use Illuminate\Http\Request;
use App\Models\Batch;

class BatchController extends BaseController
{
    public function index(){
        $batches = Batch::with('instructors')->get();
        return $this->success($batches,"Successfully",200);

    }
    public function show($id){
        $batch = Batch::with('instructors')->find($id);
        return $this->success($batch,"Batch show successfully",200);
    }
    public function delete($id){
        $batch = Batch::find($id);
        $batch->delete();
        return $this->success($batch,"Batch delete successfully",200);

    }
    public function store (CreateBatchRequest $request)
    {
       $data = $request->validated();

       if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('batchImages'), $imageName);
        $data['image'] = $imageName;
       }
       $batch=Batch::create($data);
       $instructors = $request->input('instructor_ids',[]);
       $batch->instructors()->attach($instructors);

       return $this->success($batch,"Batch created successfully",201);

    }
    public function update(UpdateBatchRequest $request, $id)
    {
        $batch = Batch::find($id);
        if(!$batch){
            return $this->error("Batch not found",[],404);
        }
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('batchImages'), $imageName);
            $data['image'] = $imageName;
        }
        $batch->update($data);
        $instructors = $request->input('instuctor_ids',[]);
        $batch->instructors()->sync($instructors);
        return $this->success($batch,"batch Updated successfully",200);
    }
}
