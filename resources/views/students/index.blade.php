<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
</head>
<body>
    <div>
        <h1>Students</h1>
        <a href="{{route('students.create')}}">+Create</a>
        @foreach ($students as $student )
        <p>{{$student['id']}}:{{$student['name']}}:{{$student['email']}}:{{$student['phone']}}
        </p>
        <div>
            {{$student['address']}}
        </div>
        <a href="{{route('students.edit',['id'=>$student])}}">Edit</a>
        <form action="{{route('students.delete',[$student->id])}}"method="POST">
            @csrf
            <button type="submit">Delete</button>
        </form>
        @endforeach
    </div>

</body>
</html>
