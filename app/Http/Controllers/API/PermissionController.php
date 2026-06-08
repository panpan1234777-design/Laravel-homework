<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Resources\PermissionResource;
use App\Repositories\Permission\PermissionRepositoryInterface;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PermissionController extends BaseController
{
    protected $permissionRepository;
    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository=$permissionRepository;
    }
    public function index()
    {
        $permissions = $this->permissionRepository->index();
        $data = PermissionResource::collection($permissions);
        return $this->success($data, "Permissions retrieved successfully", 200);
    }
    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'name' => 'required|string',
        ]);
        if ($validator->fails()) {
            return $this->error("validation Error", $validator->errors(), 422);
        }

        $permission =$this->permissionRepository->store(['name' => $request-> name ]);
        return $this->success($permission, "permission created successfully", 201);
    }
    public function show($id)
    {
        $permission = $this->permissionRepository->show($id);
        $data = new PermissionResource($permission);
        return $this->success($data,"permission show successfully", 200);
    }
    public function delete($id)
    {
        $permission = $this->permissionRepository->show($id);
        if(!$permission){
            return $this->error(null,"Permission not found", 404);
        }
        $permission->delete();
        return $this->success($permission,"permission delete successfully",200);
    }
    public function update(Request $request,$id)
    {
        $permission = $this->permissionRepository->show($id);
        if(!$permission){
            return $this->error(null,"permission not found",404);
        }
        $validator= validator::make($request->all(),[
            'name'=>'required|string'
        ]);
        if($validator->fails()){
            return $this->error("validation error", $validator->errors(),422);
        }

        $permission->update([
            'name'=>$request->name
        ]);
        return $this->success($permission,"permission updated successfully",200);
    }
}
