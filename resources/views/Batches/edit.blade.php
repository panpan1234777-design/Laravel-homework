<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <div>
        @if($errors->any())
         <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:red">{{$error}}</li>
                @endforeach
            </ul>
         </div>
        @endif
        <form action="{{route('batches.update', [$batch->id])}}" method="POST">
            @csrf
            {{-- {{dd($data->id)}} --}}
        <div>
            <label for="name">Batch Name: </label>
            <input type="text" value="{{$batch->name}}" name="name"/>
        </div>
        <div>
            <label for="description">Description: </label>
            <textarea name="description" id="" cols="20" rows="5">{{$batch->description}}</textarea>
        </div>
        <div>
            <button type="submit">
                Update
            </button>
            <a href="{{ route('batches.index')}}">Back</a>
        </div>
        </form>
        {{-- <h2>Batch edit</h2>
        <p>ID: {{$batch->id}} &nbsp; &nbsp;&nbsp;{{$batch->name}} &nbsp;{{ $batch->description}}</p> --}}
    </div>

</body>
</html>
