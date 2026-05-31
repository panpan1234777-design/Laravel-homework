<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBatchRequest;
use App\Http\Requests\UpdateBatchRequest;
use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\Instructor;
use App\Repositories\Batch\BatchRepositoryInterface;

class BatchController extends Controller
{
    protected $batchRepository;
    public function __construct(BatchRepositoryInterface $batchRepository)
    {
        $this->batchRepository =$batchRepository;
    }
    public function index()
    {
        $batches = $this->batchRepository->index();
        return view('batches.index', compact('batches'));
    }
    public function edit($id)
    {
        $batch = $this->batchRepository->show($id);
        $instructors = $this->batchRepository->getInstructors();
        return view('batches.edit', compact('batch','instructors'));
    }
    public function update(UpdateBatchRequest $request, $id)
    {
        $batch=$this->batchRepository->show($id);
        $data = $request->validated();
        // $batch = Batch::find($request->id);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('batchImages'), $imageName);
            $data['image'] = $imageName;
        }
        $batch->update($data);
        $instructors = $request->input('instuctor_ids',[]);
        $batch->instructors()->sync($instructors);
        return redirect()->route('batches.index');
    }
    public function create()
    {
        $instructors = $this->batchRepository->getinstructors();
        return view('batches.create', compact('instructors'));
    }
    public function store(CreateBatchRequest $request)
    {
        // dd('here');
        // dd($request->all());
        $data = $request->validated();
        // dd($data);
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('batchImages'), $imageName);
            $data = array_merge($data, ['image' => $imageName]);
           }
           $batch= $this->batchRepository->store($data);
           $instructors = $request->input('instructor_ids',[]);
           $batch->instructors()->attach($instructors);

            return redirect()->route('batches.index');
    }
    public function delete($id)
    {
        $batch = $this->batchRepository->show($id);
        $batch->delete();
        return redirect()->route('batches.index');
    }
}
