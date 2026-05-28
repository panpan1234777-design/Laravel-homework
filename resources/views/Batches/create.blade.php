{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="container">
    <h1 class="my-3">New Batch</h1>

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
    <form action="{{ route('batches.store')}}" method="POST">
        @csrf
        <div class="mb-3">
        <label for="name">Batch Name:</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Enter Batch Name"/>
        </div>
        <div class="mb-3">
        <label for="description">Description:</label>
        <textarea id="description" name="description" class="form-control" placeholder="Enter Description"></textarea>
        <div class="mb-3">
            <label for="start_date">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="mb-3">
            <label for="end_date">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Batch Status: </label>
            <select name="status" id="status">
                <option value="upcoming">Upcoming</option>
                <option value="ongoing">Ongoing</option>
                <option value="complete">Complete</option>
            </select>
        </div>
        {{-- @error('name')1
        <div class="invalid-feedback d-block">
            {{$message}}
        </div>
        @enderror --}}
{{-- </div>
        <button type="submit" class="btn btn-primary btn-sm">
            +Create
        </button>
        <a href="{{route('batches.index')}}" class="btn btn-secondary btn-sm">Back</a>

    </form>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html> --}}
@extends('layouts.app')

@section('title', 'Create Batch')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white me-2">
                <i class="mdi mdi-layers"></i>
            </span> Create Batch
        </h3>
    </div>

    <div class="card">
        <div class="card-body" style="max-width: 600px;">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('batches.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Batch Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter batch name">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter batch description"></textarea>
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date">
                </div>
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="upcoming">Upcoming</option>
                        <option value="ongoing">Ongoing</option>
                        <option value="complete">Complete</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image" class="form-control" />
                </div>
                <button type="submit" class="btn btn-gradient-success me-2">+ Create</button>
                <a href="{{ route('batches.index') }}" class="btn btn-light">Back</a>
            </form>
        </div>
    </div>
@endsection
