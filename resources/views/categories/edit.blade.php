{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h2 class="my-3">Edit Category</h2>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('categories.update', $data->id) }}" method="POST">
                    @csrf
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" value="{{ $data->name }}" name="name" class="form-control" />
                    @error('name')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="btn btn-primary btn-sm mt-3">
                        Update
                    </button>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-sm mt-3">Back</a>
                </form>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html> --}}
@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-info text-white me-2">
                <i class="mdi mdi-tag-multiple"></i>
            </span> Edit Category
        </h3>
    </div>
    <div class="container">
        <h2 class="my-3">Edit Category</h2>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('categories.update', $data->id) }}" method="POST">
                    @csrf
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" value="{{ $data->name }}" name="name" class="form-control" />
                    @error('name')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="btn btn-primary btn-sm mt-3">
                        Update
                    </button>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-sm mt-3">Back</a>
                </form>
            </div>
        </div>

    </div>
@endsection
