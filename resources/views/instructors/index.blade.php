{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="container bag-light mt-5">
    <div class="card shadow-sm">
        <header class="card-header bg-primary text-white">
            <h1 class="h4">Instructors</h1>
        </header>
        <div class="card-header bg-info"><a href="{{route ('instructors.create')}}">+Create</a></div>
        <table class="table table-hover table-bordered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instructors as $instructor)
                <tr>
                    <td>{{$instructor['id']}}</td>
                    <td>{{$instructor['name']}}</td>
                    <td>{{$instructor['email']}}</td>
                    <td>{{$instructor['phone']}}</td>
                    <td>
                        <a href="{{route('instructors.edit',['id'=>$instructor['id']])}}" class="btn btn-info btn-sm text-white">Edit</a>
                    </td>
                    <td> <form action="{{ route('instructors.delete', [$instructor->id]) }}"method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm text-white">Delete</button>
                    </form></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html> --}}
@extends('layouts.app')

@section('title', 'Instructors')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white me-2">
                <i class="mdi mdi-account-tie"></i>
            </span> Instructors
        </h3>
    </div>
    <div class="container">
        <div class="card shadow-sm">
            {{-- <header class="card-header bg-primary text-white">
                <h1 class="h4">Instructors</h1>
            </header> --}}
            @can('instructorCreate')
                <div class="card-header bg-info"><a href="{{ route('instructors.create') }}">+Create</a></div>
            @endcan

            <table class="table table-hover table-bordered mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Image</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($instructors as $instructor)
                        <tr>
                            <td>{{ $instructor['id'] }}</td>
                            <td>{{ $instructor['name'] }}</td>
                            <td>{{ $instructor['email'] }}</td>
                            <td>{{ $instructor['phone'] }}</td>
                            <td>
                                @if ($instructor->image)
                                    <img src="{{ asset('instructorImages/' . $instructor->image) }}"
                                        alt="{{ $instructor->image }}" style="width: 50px; height: 50px;">
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @can('instructorEdit')
                                    <a href="{{ route('instructors.edit', ['id' => $instructor['id']]) }}"
                                        class="btn btn-info btn-sm text-white">Edit</a>
                                @endcan

                            </td>
                            <td>
                                @can('instructorDelete')
                                    <form action="{{ route('instructors.delete', [$instructor->id]) }}"method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm text-white">Delete</button>
                                    </form>
                                @endcan

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
