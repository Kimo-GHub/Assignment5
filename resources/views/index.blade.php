@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1>Students List</h1>
        <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add New Student</a>

        
        <form id="filterForm" class="form-inline mb-3">
            <input type="text" name="search" id="search" placeholder="Search by name" class="form-control mr-2">
            <input type="number" name="min_age" id="min_age" placeholder="Min Age" class="form-control mr-2">
            <input type="number" name="max_age" id="max_age" placeholder="Max Age" class="form-control mr-2">
            <button type="submit" class="btn btn-secondary">Filter</button>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="studentTableBody">
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->age }}</td>
                        <td>
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#filterForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('students.index') }}",  // Assuming you have a route for displaying filtered data
                method: 'GET',
                data: {
                    search: $('#search').val(),
                    min_age: $('#min_age').val(),
                    max_age: $('#max_age').val(),
                },
                success: function(response) {
                    $('#studentTableBody').html(response);
                }
            });
        });
    });
</script>

