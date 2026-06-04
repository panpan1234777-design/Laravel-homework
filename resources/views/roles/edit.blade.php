@extends('layouts.app')
@section('content')
    <h1>Edit Role</h1>
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        <label>Name</label>
        <input type="text" name="name" value="{{ $role->name }}"> <br>

        <label>Permissions</label> <br>
        @foreach ($permissions as $permission )
        <label>
            <input type="checkbox" name="permissions[]" value="{{$permission->name}}"
            {{$role->hasPermissionTo($permission->name)? 'checked' : ''}}>
            {{$permission->name}}
        </label> <br>
        @endforeach
        <div>
        <button type="submit">Update</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-sm">Back</a>
    </form>
</div>
@endsection
