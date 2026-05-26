<!DOCTYPE html>
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
        {{-- {{dd('here')}} --}}
        @if($errors->any())
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
       <form action="{{route('students.update',[$student->id])}}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" value="{{$student->name}}" name="name" class="form-control"/>
        </div>
        <div>
            <label for="email">email:</label>
            <input type="text" value="{{$student->email}}" name="email" class="form-control"/>
        </div>
        <div>
            <label for="phone">phone:</label>
            <input type="text" value="{{$student->phone}}" name="phone" class="form-control"/>
        </div>
        <div>
            <label for="address">address:</label>
            <textarea name="address" id="" cols="20" rows="5" class="form-control">{{$student->address}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">
            Update
        </button>
        <a href="{{route('students.index')}}" class="btn btn-secondary btn-sm">Back</a>
    </form>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
