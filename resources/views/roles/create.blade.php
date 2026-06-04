@extends('layouts.app')
@section('content')
    <h2>Create Role</h2>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <label>Name</label> <br>
        <input type="text" name="name"> <br>

        <label>Permissions</label> <br>
        @foreach ($permissions as $permission)
        <label>
            <input type="checkbox" name="permissions[]" value="{{$permission->name}}">
            {{$permission->name}}
        </label> <br>
        @endforeach
        <div>
        <button type="submit">Create</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-sm">Back</a>
    </form>
    </div>

@endsection
