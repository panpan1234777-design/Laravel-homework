<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;

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
        return view('users.edit',compact('user'));
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
        return redirect()->route('users.index');
    }
    public function create()
    {
        // dd('here');
        return view('users.create');
    }
    public function store(Request $request)
    {
        $user = $request->validate([
            'name'=>'required|string',
            'email'=>'string',
            'phone'=>'string',
            'password'=>'required|string',
            'address'=>'string'
        ]);
        User::create($request->all());
        return redirect()->route('users.index');
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}

