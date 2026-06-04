@extends('layouts.app')
@section('content')
    <h1>Edit Permission</h1>
    <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
        @csrf
        <label>Name</label>
        <input type="text" name="name" value="{{ $permission->name }}">
        <button type="submit">Update</button>
    </form>
@endsection
