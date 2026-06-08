<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
    public function index()
    {
        $users = User::with('roles')->get();
        return $this->success($users,"Successfully",200);
    }
    public function show($id)
    {
        $user = User::with('roles')->find($id);
        return $this->success($user,"User Show Successfully",200);
    }
    public function delete($id)
    {
        $user = User::find($id);
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
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->role);
        return $this->success($user,"User Created Successfully",201);
    }
    public function update(Request $request,$id)
    {
        $user = User::find($id);
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
