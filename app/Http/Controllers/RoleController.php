<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('roles.index', compact('roles'));
    }
    public function create()
    {
        $permissions=Permission::all();
        return view('roles.create', compact('permissions'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string'
        ]);
        $role = Role::create(['name'=>$request->name]);
        $role->syncPermissions($request->permissions);
        return redirect()->route('roles.index');
    }
    public function edit($id)
    {
        $role = Role::with('permissions')->find($id);
        $permissions=Permission::all();
        return view('roles.edit', compact('role','permissions'));
    }
    public function update(Request $request, $id)
    {
        $request->validate(['name'=>'required|string|unique:roles,name,'.$id]);
        $role = Role::find($id);
        $role->update(['name'=>$request->name]);
        $role->syncPermissions($request->permissions);
        return redirect()->route('roles.index');
    }

    public function delete($id)
    {
        Role::find($id)->delete();
        return redirect()->route('roles.index');
    }
}
