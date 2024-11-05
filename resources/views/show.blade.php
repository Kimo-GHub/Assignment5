@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1>{{ $student->name }}</h1>
        <p>Age: {{ $student->age }}</p>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to Student List</a>
    </div>
@endsection
