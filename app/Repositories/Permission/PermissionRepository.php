<?php
namespace App\Repositories\Permission;
use Spatie\Permission\Models\Permission;
use App\Repositories\Permission\PermissionRepositoryInterface;

class PermissionRepository implements PermissionRepositoryInterface
{
 public function index()
 {
    return Permission::all();
 }
 public function show($id)
 {
    return Permission::find($id);
 }
 public function store($data)
 {
    return Permission::create($data);
 }
}

