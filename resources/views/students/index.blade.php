{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <title>Students</title>
</head>

<body class="container bg-light mt-5">
    <div class="card shadow-sm">
        <header class="card-header bg-primary text-white">
            <h1 class="h4">Student</h1>
        </header>
        <div class="card-header bg-info"> <a href="{{ route('students.create') }}">+Create</a></div>
        <table class="table table-hover table-bordered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student['id'] }}</td>
                        <td>{{ $student['name'] }}</td>
                        <td>{{ $student['email'] }}</td>
                        <td>{{ $student['phone'] }}</td>
                        <td>{{ $student['address'] }}</td>
                        <td>
                            <a href="{{ route('students.edit', ['id' => $student->id]) }}" class="btn btn-info btn-sm text-white">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('students.delete', [$student->id]) }}"method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm text-white">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table> --}}
{{-- @foreach ($students as $student)
        <p>{{$student['id']}}:{{$student['name']}}:{{$student['email']}}:{{$student['phone']}}
        </p>
        <div>
            {{$student['address']}}
        </div>
        <a href="{{route('students.edit',['id'=>$student])}}">Edit</a> --}}
{{-- <form action="{{route('students.delete',[$student->id])}}"method="POST">
            @csrf
            <button type="submit">Delete</button>
        </form>
        @endforeach --}}
{{-- </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html> --}}

@extends('layouts.app')

@section('title', 'Students')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white me-2">
                <i class="mdi mdi-account-school"></i>
            </span> Students
        </h3>
    </div>

    <div class="card">
        <div class="card-body">
            {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title mb-0">Student List</h4> --}}
            @can('studentCreate')
                <a href="{{ route('students.create') }}" class="btn btn-gradient-success btn-sm">+ Create</a>
            @endcan

        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Batch</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>PHONE</th>
                        <th>ADDRESS</th>
                        <th>Enrolled_at</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->batch->name ?? '-' }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->address ?? '-' }}</td>
                            <td>{{ $student->enrolled_at }}</td>
                            <td>{{ $student->status }}</td>
                            <td>
                                @if ($student->image)
                                    <img src="{{ asset('studentImages/' . $student->image) }}" alt="{{ $student->image }}"
                                        style="width: 50px; height: 50px;">
                                @else
                                    -
                                @endif
                            </td>
                            <td class="d-flex">
                                @can('studentEdit')
                                    <a href="{{ route('students.edit', ['id' => $student->id]) }}"
                                        class="btn btn-outline-secondary btn-sm me-2">Edit</a>
                                @endcan
                                @can('studentDelete')
                                    <form action="{{ route('students.delete', [$student->id]) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
