@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mt-3">New user List</h1>
    @if ($errors->any())
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
    <form action="{{route('users.store')}}" method="POST">
        @csrf
        <div class="mb-2">
            <label for="name">user Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter user Name" class="form-control"/>
        </div>
        <divm class="mb-2">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" placeholder="Enter user's email" class="form-control"/>
        </div>
        <div class="mb-2">
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" placeholder="Enter Phone Number" class="form-control"/>
        </div>
        <div class="mb-2">
            <label for="password">Password:</label>
            <input type="text" id="password" name="password" placeholder="Enter Password" class="form-control"/>
        </div>
        <div class="mb-2">
            <label for="address">Address:</label>
            <textarea name="address" id="address" cols="20" rows="10" placeholder="Enter Address" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">+Create</button>
        <a href="{{route('users.index')}}" class="btn btn-secondary btn-sm">Back</a>
    </form>
</div>
</div>
</div>
@endsection
