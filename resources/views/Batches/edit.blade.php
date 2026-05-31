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
        <form action="{{route('batches.update', [$batch->id])}}" method="POST">
            @csrf

        <div class="mb-3">
            <label for="name">Batch Name: </label>
            <input type="text" value="{{$batch->name}}" class="form-control" name="name"/>
        </div>
        <div class="mb-3">
            <label for="description">Description: </label>
            <textarea name="description" id="" cols="20" rows="5" class="form-control">{{$batch->description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="start_date">Start Date</label>
            <input type="date" value"{{$batch->start_date}}" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="mb-3">
            <label for="end_date">End Date</label>
            <input type="date" value"{{$batch->start_date}}" class="form-control" id="end_date" name="end_date" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Batch Status: </label>
            <select name="status" id="status">
                <option value="upcoming" {{$batch->status == "upcoming"? 'selected':''}}>Upcoming</option>
                <option value="ongoing" {{$batch->status == "upcoming"? 'selected':''}}>Ongoing</option>
                <option value="complete" {{$batch->status == "upcoming"? 'selected':''}}>Complete</option>
            </select>
        </div>

        <div>
            <button type="submit" class="btn btn-primary btn-sm">
                Update
            </button>
            <a href="{{ route('batches.index')}}" class="btn btn-secondary btn-sm">Back</a>
        </div>
    </form>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html> --}}
@extends('layouts.app')

@section('title', 'Edit Batch')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white me-2">
                <i class="mdi mdi-layers"></i>
            </span> Edit Batch
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
                <form action="{{ route('batches.update', [$batch->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name">Batch Name: </label>
                        <input type="text" value="{{ $batch->name }}" class="form-control" name="name" />
                    </div>

                    <div class="mb-3">
                        <label for="description">Description: </label>
                        <textarea name="description" id="" cols="20" rows="5" class="form-control">{{ $batch->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="start_date">Start Date</label>
                        <input type="date" value"{{ $batch->start_date }}" class="form-control" id="start_date"
                            name="start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_date">End Date</label>
                        <input type="date" value"{{ $batch->start_date }}" class="form-control" id="end_date"
                            name="end_date" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Batch Status: </label>
                        <select name="status" id="status">
                            <option value="upcoming" {{ $batch->status == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                            <option value="ongoing" {{ $batch->status == 'upcoming' ? 'selected' : '' }}>Ongoing</option>
                            <option value="complete" {{ $batch->status == 'upcoming' ? 'selected' : '' }}>Complete</option>
                        </select>
                    </div>
                    <div>
                        <label for="image">image:</label>
                        @if ($batch->image)
                            <img src="{{ asset('batchImage/' . $batch->image) }}" alt="{{ $batch->image }}"
                                style="width: 50px; height: 50px;">
                        @endif
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="instructor">Select Instructor</label>
                        @foreach ($instructors as $instructor)
                        <input type="checkbox" name="instructor_ids[]" id="instructor_{{$instructor->id}}" value="{{$instructor->id}}"
                        {{in_array ($instructor->id,$batch->instructors->pluck('id')->toArray()) ? 'checked': ''}}>
                        <label for="instructor_{{$instructor->id}}">
                            {{$instructor->name}}
                        </label>
                        @endforeach
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">
                            Update
                        </button>
                        <a href="{{ route('batches.index') }}" class="btn btn-secondary btn-sm">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
