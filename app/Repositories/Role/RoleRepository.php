<?php
namespace App\Repositories\Role;
use Spatie\Permission\Models\Role;
use App\Repositories\Role\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface
{
    public function index()
    {
        return Role::with('permissions')->get();
    }
    public function show($id)
    {
        return Role::with('permissions')->find($id);
    }
    public function store($data)
    {
        return Role::create($data);
    }
}
