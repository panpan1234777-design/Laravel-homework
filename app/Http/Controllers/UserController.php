<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users= User::all();
        return view('users.index',compact('users'));
    }
    public function edit($id)
    {
        $user = User ::find($id);
        $roles = Role::all();
        return view('users.edit',compact('user','roles'));
    }
    public function update(UpdateUserRequest $request)
    {
        $user=User::find($request->id);
        $user->update ([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>$request->password,
            'address'=>$request->address
        ]);
        $user->syncRoles($request->role);
        return redirect()->route('users.index');
    }
    public function create()
    {
        $roles= Role::all();
        return view('users.create', compact('roles'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|string',
            'email'=>'string',
            'phone'=>'string',
            'password'=>'required|string',
            'address'=>'string'
        ]);
        $user = User::create($validated);
        $user->assignRole($request->role);
        return redirect()->route('users.index');
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}

