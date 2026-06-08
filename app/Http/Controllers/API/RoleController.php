<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Repositories\Role\RoleRepository;
use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;


class RoleController extends BaseController
{
    protected $roleRepository;
    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository=$roleRepository;
    }
    public function index()
    {
        $roles = $this->roleRepository->index();
        return $this->success($roles,"Roles retrived successfully",200);
    }
    public function show($id)
    {
        $role = $this->roleRepository->show($id);
        return $this->success($role,"Role show successfully",200);
    }
    public function delete($id)
    {
        $role =$this->roleRepository->show($id);
        $role->delete();
        return $this->success($role,"Role delece successfully");
    }
    public function store(Request $request)
    {
        $validator=validator::make($request->all(),[
            'name'=>'required|string',

        ]);
        if($validator->fails()){
            return $this->error("validation Error",$validator->error(),422);
        }
        $role=$this->roleRepository->store(['name'=>$request->name]);
        $role->syncPermissions($request->permissions);
        return $this->success($role,"Role created successfullly",201);

    }
    public function update(Request $request,$id)
    {
        $role = $this->roleRepository->show($id);
        $validator = validator::make($request->all(),[
            'name'=>'required|string',
        ]);
        if($validator->fails()){
            return $this->error("validation Error",$validator->error(),422);
        }
        $role->update(['name'=>$request->name]);
        $role->syncPermissions($request->permissions);
        return $this->success($role,"Role Updated successfully",200);
    }
}
