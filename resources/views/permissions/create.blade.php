@extends('layouts.app')
@section('content')
    <h2>Create Permission</h2>
    <form action="{{ route('permissions.store') }}" method="POST">
        @csrf
        <label>Name</label>
        <input type="text" name="name">

        <button type="submit">Create</button>
    </form>
@endsection
