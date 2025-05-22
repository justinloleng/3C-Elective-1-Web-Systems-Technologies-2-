<table border=1>
    {{-- <a href="{{ route('insert')}}">Insert new</a> --}}
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Action</td>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td><input type="submit" value="delete/{{$user->id}}">Delete</td>
    </tr>
    @endforeach
</table>
