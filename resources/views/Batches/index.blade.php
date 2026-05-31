{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Batch List</h1>
        <a href="{{ route('batches.create') }}" class="btn btn-outline btn-primary">+Create</a>
        <table class="table table-scripted table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($batches as $data)
                <tr>
                    <td>{{ $data['id'] }}</td>
                    <td>{{ $data['name'] }}</td>
                    <td>{{ $data['description'] }}</td>
                    <td>{{ $data['start_date'] }}</td>
                    <td>{{ $data['end_date'] }}</td>
                    <td>{{ $data['status'] }}</td>
                    <td><a href="{{route('batches.edit',['id'=>$data['id']])}}" class="btn btn-primary btn-sm">Edit</a></td>
                    <td> <form action="{{route('batches.delete',[$data->id])}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button></td>
                    </form>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html> --}}
@extends('layouts.app')
@section('title', 'Batches')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white me-2">
                <i class="mdi mdi-layers"></i>
            </span> Batches
        </h3>
    </div>
    <div class="container">
        {{-- <h1 class="mt-4">Batch List</h1> --}}
        <a href="{{ route('batches.create') }}" class="btn btn-outline btn-primary">+Create</a>
        <table class="table table-scripted table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Instructors</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($batches as $data)
                    <tr>
                        <td>{{ $data['id'] }}</td>
                        <td>{{ $data['name'] }}</td>
                        <td>
                            @if ($data->instructors->isNotEmpty())
                                {{$data->instructors->pluck('name')->join(',')}}
                            @else
                            -
                            @endif
                        </td>
                        <td>{{ $data['description'] }}</td>
                        <td>{{ $data['start_date'] }}</td>
                        <td>{{ $data['end_date'] }}</td>
                        <td>{{ $data['status'] }}</td>
                        <td>
                            @if ($data->image)
                                <img src="{{ asset('batchImages/' . $data->image) }}" alt="{{ $data->image }}"
                                    style="width: 50px; height: 50px;">
                            @else
                                -
                            @endif
                        </td>
                        <td><a href="{{ route('batches.edit', ['id' => $data['id']]) }}"
                                class="btn btn-primary btn-sm">Edit</a></td>
                        <td>
                            <form action="{{ route('batches.delete', [$data->id]) }}" method="POST">
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
