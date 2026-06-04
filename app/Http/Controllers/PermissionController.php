<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller

{
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index', compact('permissions'));
    }
    public function create()
    {
        return view('permissions.create');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string'
            ]
        );
        permission::create(['name' => $request->name]);
        return redirect()->route('permissions.index');
    }
    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('permissions.edit', compact('permission'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
        Permission::find($id)->update(['name' => $request->name]);
        return redirect()->route('permissions.index');
    }
    public function delete($id)
    {
        Permission::find($id)->delete();
        return redirect()->route('permissions.index');
    }
}
