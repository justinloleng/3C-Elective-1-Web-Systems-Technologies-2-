
<div class="container">
    <h2>Add New Student</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Student ID:</label>
            <input type="text" name="student_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Course:</label>
            <input type="text" name="course" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Year Level:</label>
            <input type="text" name="year_level" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Student</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>

