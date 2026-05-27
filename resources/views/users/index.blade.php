@extends('layouts.app')
@section('title','Users')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-success text-white me-2">
            <i class="mdi mdi-account-school"></i>
        </span> Users
    </h3>
</div>
<div class="container bg-light mt-5">
    <div class="card shadow-sm">
        <header class="card-header bg-primary text-white">
            <h1 class="h4">User</h1>
        </header>
        <div class="card-header bg-info"><a href="{{ route('users.create') }}">+Create</a></div>
        <table class="table table-hover table-bordered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['password'] }}</td>
                        <td>{{ $user['phone'] }}</td>
                        <td>{{ $user['address'] }}</td>
                        <td>
                            <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-info btn-sm text-white">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('users.delete', [$user->id]) }}"method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm text-white">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>
</div>
@endsection
