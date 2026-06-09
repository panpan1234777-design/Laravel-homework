<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function index()
    {
        return User::with('roles')->get();
    }
    public function show($id)
    {
        return User::with('roles')->findOrFail($id);
    }
    public function store($data)
    {
        $user = User::create($data);
    }
}
