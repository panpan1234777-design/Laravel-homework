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
        <div class="card shadow-sm ">
            <div class="card-body">
        <form action="{{route('instructors.update', [$instructor->id])}}" method="POST">
            @csrf
        <div class="mb-3">
            <label for="name">Instructor Name: </label>
            <input type="text" value="{{$instructor->name}}" class="form-control" name="name"/>
        </div>
        <div class="mb-3">
            <label for="email">Email: </label>
            <textarea name="email" id="" cols="20" rows="5" class="form-control">{{$instructor->email}}</textarea>
        </div>
        <div class="mb-3">
            <label for="phone">Phone: </label>
            <textarea name="phone" id="" cols="20" rows="5" class="form-control">{{$instructor->phone}}</textarea>
        </div>

        <div>
            <button type="submit" class="btn btn-primary btn-sm">
                Update
            </button>
            <a href="{{ route('instructors.index')}}" class="btn btn-secondary btn-sm">Back</a>
        </div>
    </form>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
 --}}
@extends('layouts.app')
@section('title', 'edit Instrutctor')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white me-2">
                <i class="mdi mdi-account-tie"></i>
            </span> Edit Instructor
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
        <div class="card shadow-sm ">
            <div class="card-body">
                <form action="{{ route('instructors.update', [$instructor->id]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name">Instructor Name: </label>
                        <input type="text" value="{{ $instructor->name }}" class="form-control" name="name" />
                    </div>
                    <div class="mb-3">
                        <label for="email">Email: </label>
                        <textarea name="email" id="" cols="20" rows="5" class="form-control">{{ $instructor->email }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone: </label>
                        <textarea name="phone" id="" cols="20" rows="5" class="form-control">{{ $instructor->phone }}</textarea>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">
                            Update
                        </button>
                        <a href="{{ route('instructors.index') }}" class="btn btn-secondary btn-sm">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
