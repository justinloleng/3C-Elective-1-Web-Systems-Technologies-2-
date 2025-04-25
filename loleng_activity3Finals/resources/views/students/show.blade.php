
<div class="container">
    <h2>{{ $student->name }} - QR Code</h2>
    <div>{!! $qrCode !!}</div>
    <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>

