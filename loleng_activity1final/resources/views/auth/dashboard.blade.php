<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (session('success'))
    <p style="color: green">{{session('success')}}</p>
    @endif

    <h1>Welcome to the Dashboard</h1>
    <p>Logged in as: {{ Auth::user()->name }}</p>

    <h1>All Books</h1>

    <a href="{{ route('books.create') }}">Add New Book</a>

    <ul>

        @foreach ($books as $book)

            <li>

                {{ $book->title }} by {{ $book->author }} ({{ $book->published_date }})

                <a href="{{ route('books.edit', $book->id) }}">Edit</a>

                <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">

                    @csrf

                    @method('DELETE')

                    <button type="submit">Delete</button>

                </form>

            </li>

        @endforeach

    </ul>

    <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</body>
</html>