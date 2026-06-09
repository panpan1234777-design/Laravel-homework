<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->index();
        return $this->success($users,"Successfully",200);
    }
    public function show($id)
    {
        $user = $this->userRepository->show($id);
        return $this->success($user,"User Show Successfully",200);
    }
    public function delete($id)
    {
        $user = $this->userRepository->show($id);
        $user->delete();
        return $this->success($user,"User delete Successfully ",200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'role' => 'required|string',
        ]);
        if($validator->fails()){
            return $this->error("Validation Error",$validator->error(),422);
        }
        $user = $this->userRepository->store([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->role);
        return $this->success($user,"User Created Successfully",201);
    }
    public function update(Request $request,$id)
    {
        $user = $this->userRepository->show($id);
        $validator = Validator::make($request->all(),[
            'name'=>'required|string',
            'email' => 'required|string',
            'password' =>'nullable|string',
            'role' =>'required|string|exists:roles,name',
        ]);
        if($validator->fails()){
            return $this->error("Validation Error",$validator->errors(),422);
        }
        $data = $validator->validated();
        if(!empty($data['password'])){
            $data['password'] = Hash::make($data['password']);
        }else{
            unset($data['password']);
        }
        $user->update($data);
        $user->syncRoles($request->role);

        return $this->success($user,"User Updated Successfully",200);
    }

}
