{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit</title>
</head>
<body>
    <div class="container">
        @if ($errors->any())
        <div>
           <ul>
               @foreach ($errors->all() as $error)
                   <li style="color:red">{{$error}}</li>
               @endforeach
           </ul>
        </div>
       @endif
       <div class="card">
            <div class="card-body">
       <form action="{{route('users.update',[$user->id])}}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" value="{{$user->name}}" name="name" class="form-control"/>
        </div>
        <div>
            <label for="email">email:</label>
            <input type="text" value="{{$user->email}}" name="email" class="form-control"/>
        </div>
        <div>
            <label for="email">password:</label>
            <input type="text" value="{{$user->password}}" name="password" class="form-control"/>
        </div>
        <div>
            <label for="phone">phone:</label>
            <input type="text" value="{{$user->phone}}" name="phone" class="form-control"/>
        </div>
        <div>
            <label for="address">address:</label>
            <textarea name="address" id="" cols="20" rows="5" class="form-control">{{$user->address}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">
            Update
        </button>
        <a href="{{route('users.index')}}" class="btn btn-secondary btn-sm">Back</a>
    </form>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html> --}}
@extends('layouts.app')
@section('title', 'edit User')
@section('content')
    <div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-success text-white me-2">
            <i class="mdi mdi-account-tie"></i>
        </span> Edit User
    </h3>
    </div>
    <div class="container">
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:red">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="{{ route('users.update', [$user->id]) }}" method="POST">
                    @csrf
                    <div>
                        <label for="name">Name:</label>
                        <input type="text" value="{{ $user->name }}" name="name" class="form-control" />
                    </div>
                    <div>
                        <label for="email">email:</label>
                        <input type="text" value="{{ $user->email }}" name="email" class="form-control" />
                    </div>
                    <div>
                        <label for="password">password:</label>
                        <input type="text" value="{{ $user->password }}" name="password" class="form-control" />
                    </div>
                    <div>
                        <label for="phone">phone:</label>
                        <input type="text" value="{{ $user->phone }}" name="phone" class="form-control" />
                    </div>
                    <div>
                        <label for="address">address:</label>
                        <textarea name="address" id="" cols="20" rows="5" class="form-control">{{ $user->address }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Update
                    </button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </form>
            </div>
        </div>
    @endsection
