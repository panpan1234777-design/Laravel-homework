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
       <form action="{{route('students.update',[$student->id])}}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" value="{{$student->name}}" name="name"/>
        </div>
        <div>
            <label for="email">email:</label>
            <input type="text" value="{{$student->email}}" name="email"/>
        </div>
        <div>
            <label for="phone">phone:</label>
            <input type="text" value="{{$student->phone}}" name="phone"/>
        </div>
        <div>
            <label for="address">address:</label>
            <textarea name="address" id="" cols="20" rows="5">{{$student->address}}</textarea>
        </div>
        <button type="submit">
            Update
        </button>
        <a href="{{route('students.index')}}">Back</a>
    </form>
    </div>

</body>
</html>
