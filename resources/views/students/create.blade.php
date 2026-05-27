{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Create</title>
</head>
<body class="container">
    <h1 class="mt-3">New Student List</h1>
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
    <form action="{{route('students.store')}}" method="POST">
        @csrf
        <div class="mb-2">
            <label for="name">Student Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter Student Name" class="form-control"/>
        </div>
        <divm class="mb-2">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" placeholder="Enter student's email" class="form-control"/>
        </div>
        <div class="mb-2">
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" placeholder="Enter Phone Number" class="form-control"/>
        </div>
        <div class="mb-2">
            <label for="address">Address:</label>
            <textarea name="address" id="address" cols="20" rows="10" placeholder="Enter Address" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">+Create</button>
        <a href="{{route('students.index')}}" class="btn btn-secondary btn-sm">Back</a>
    </form>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html> --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mt-3">New Student List</h1>
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
    <form action="{{route('students.store')}}" method="POST">
        @csrf
        <div class="mb-2">
            <label for="name">Student Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter Student Name" class="form-control"/>
        </div>
        <divm class="mb-2">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" placeholder="Enter student's email" class="form-control"/>
        </div>
        <div class="mb-2">
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" placeholder="Enter Phone Number" class="form-control"/>
        </div>
        <div class="mb-2">
            <label for="address">Address:</label>
            <textarea name="address" id="address" cols="20" rows="10" placeholder="Enter Address" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">+Create</button>
        <a href="{{route('students.index')}}" class="btn btn-secondary btn-sm">Back</a>
    </form>
</div>
</div>
</div>
@endsection

