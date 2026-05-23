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
        @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error )
                    <li style="color:red">{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{route('categories.update', [$data->id])}}" method="POST">
            @csrf
            {{-- {{dd($data->id)}} --}}
            
            <label for="name">Category Name: </label>
            <br>
            <input type="text" value="{{$data->name}}" name="name"/>
            <button type="submit">
                Update
            </button>
            <a href="{{ route('categories.index')}}">Back</a>
        </form>
    </div>
</body>
</html>
