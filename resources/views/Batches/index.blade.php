<!DOCTYPE html>
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
                    <td><a href="{{route('batches.edit',['id'=>$data['id']])}}" class="btn btn-primary btn-sm">Edit</a></td>
                    <td> <form action="{{route('batches.delete',[$data->id])}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button></td>
                    </form>
                @endforeach
                </tr>
            </tbody>
        </table>
        {{-- @foreach ($batches as $data)
            <p>{{ $data['id'] }}: {{ $data['name'] }}</p>
            <div>{{ $data['description'] }}</div>
            <a href="{{route('batches.edit',['id'=>$data['id']])}}">Edit</a>
            <form action="{{route('batches.delete',[$data->id])}}" method="POST">
                @csrf
                <button type="submit">Delete</button>
            </form>
        @endforeach --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
