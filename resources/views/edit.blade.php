@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1>Edit Student</h1>
        <form action="{{ route('students.update', $student->id) }}" method="POST" class="form-group">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ $student->name }}" required class="form-control mb-3">
            <input type="number" name="age" value="{{ $student->age }}" required class="form-control mb-3">
            <button type="submit" class="btn btn-primary">Update Student</button>
        </form>
    </div>
@endsection
