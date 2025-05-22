<div class="container">
    <h2>Student List</h2>

    <form method="GET" class="mb-3">
        <input type="text" name="search" placeholder="Search by name, ID, or course" class="form-control" value="{{ request('search') }}">
    </form>

    <a href="{{ route('students.create') }}" class="btn btn-success mb-3">Add New Student</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>ID</th>
                <th>Course</th>
                <th>Year</th>
                <th>Email</th>
                <th>QR Code</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->student_id }}</td>
                <td>{{ $student->course }}</td>
                <td>{{ $student->year_level }}</td>
                <td>{{ $student->email }}</td>
                <td>
                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-primary btn-sm">View QR</a>
                </td>
                <td>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this student?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $students->links() }}
</div>

