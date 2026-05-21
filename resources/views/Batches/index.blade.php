<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Batch List</h1>
        <a href="{{ route('batches.create') }}">+Create</a>
        @foreach ($batches as $data)
            <p>{{ $data['id'] }}: {{ $data['name'] }}</p>
            <div>{{ $data['description'] }}</div>
            <a href="{{route('batches.edit',['id'=>$data['id']])}}">Edit</a>
        @endforeach

    </div>
</body>
</html>
