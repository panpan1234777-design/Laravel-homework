@extends('layouts.app')
@section('title', 'Batches')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white me-2">
                <i class="mdi mdi-layers"></i>
            </span> Permissions
        </h3>
    </div>
    <div class="container">
        <a href="{{ route('permissions.create') }}" class="btn btn-outline btn-primary">+Create</a>
        <table class="table table-scripted table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $data)
                    <tr>
                        <td>{{ $data['id'] }}</td>
                        <td>{{ $data['name'] }}</td>
                        <td>
                            {{-- @can('permissionUpdate') --}}
                            <a href="{{ route('permissions.edit', ['id' => $data['id']]) }}"
                                class="btn btn-primary btn-sm">Edit</a>
                        </td>
                        {{-- @endcan --}}
                        <td>
                            <form action="{{ route('permissions.delete', [$data->id]) }}" method="POST">
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
