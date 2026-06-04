@extends('layouts.app')
@section('title', 'Roles')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white me-2">
                <i class="mdi mdi-layers"></i>
            </span> roles
        </h3>
    </div>
    <div class="container">
        <a href="{{ route('roles.create') }}" class="btn btn-outline btn-primary">+Create</a>
        <table class="table table-scripted table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Permission</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>

                        <td>
                            @foreach ($role->permissions as $permission)
                                {{ $permission->name }}
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('roles.edit', ['id' => $role['id']]) }}" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('roles.delete', [$role->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                        </form>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
@endsection
