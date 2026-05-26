<!DOCTYPE html>
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
            @foreach ($errors->all() as $error )
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
        {{-- @error('name')
        <div class="invalid-feedback d-block">
            {{$message}}
        </div>
        @enderror --}}
    </div>
        <button type="submit" class="btn btn-primary btn-sm">
            +Create
        </button>
        <a href="{{route('batches.index')}}" class="btn btn-secondary btn-sm">Back</a>

    </form>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
