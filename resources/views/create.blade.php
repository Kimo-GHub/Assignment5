@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1>Add New Student</h1>
        <form action="{{ route('students.store') }}" method="POST" class="form-group">
            @csrf
            <input type="text" name="name" placeholder="Name" required class="form-control mb-3">
            <input type="number" name="age" placeholder="Age" required class="form-control mb-3">
            <button type="submit" class="btn btn-primary">Add New Student</button>
        </form>
    </div>
@endsection
