<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body>
    <h1>New Student List</h1>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li style="color:red">{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('students.store')}}" method="POST">
        @csrf
        <div>
            <label for="name">Student Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter Student Name"/>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" placeholder="Enter student's email"/>
        </div>
        <div>
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" placeholder="Enter Phone Number"/>
        </div>
        <div>
            <label for="address">Address:</label>
            <textarea name="address" id="address" cols="20" rows="10" placeholder="Enter Address"></textarea>
        </div>
        <button type="submit">+Create</button>
        <a href="{{route('students.index')}}">Back</a>
    </form>
</body>
</html>
