{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Category Create</title>
</head>
<body>
    <div class="container">
        <h2 class="my-3">Create New Category</h2>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('categories.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name">Category Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Name"/>
                    @error('name')
                    <div class="invalid-feedback d-block">
                        {{$message}}
                    </div>
                    @enderror

                </div>
                <button type="submit" class="btn btn-primary btn-sm me-2">
                    +Create
                </button>
                <a href="{{ route('categories.index')}}" class="btn btn-secondary btn-sm">Back</a>
            </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html> --}}
@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-info text-white me-2">
                <i class="mdi mdi-tag-multiple"></i>
            </span> Create Category
        </h3>
    </div>
    <div class="container">
        <h2 class="my-3">Create New Category</h2>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('categories.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name">Category Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Name"/>
                    @error('name')
                    <div class="invalid-feedback d-block">
                        {{$message}}
                    </div>
                    @enderror

                </div>
                <button type="submit" class="btn btn-primary btn-sm me-2">
                    +Create
                </button>
                <a href="{{ route('categories.index')}}" class="btn btn-secondary btn-sm">Back</a>
            </form>
            </div>
        </div>
    </div>
@endsection
