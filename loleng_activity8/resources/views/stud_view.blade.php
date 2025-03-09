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
        <td>
            <a href = 'edit/{{ $user->id }}'>Edit</a> |
            <form action="/delete/{{ $user->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
        
    </tr>
    @endforeach
</table>
