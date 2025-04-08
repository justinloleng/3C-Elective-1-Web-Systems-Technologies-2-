@extends('navigation.sidebar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<style>
    .card:hover {
        box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease-in-out;
    }
</style>

<body>

    @section('content')
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="container mt-4">
        <h1 class="mb-4">All Threads</h1>
        <form action="{{ route('threads.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search threads and authors here..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-success">Search</button>

            </div>
        </form>
        <a href="{{ route('threads.create') }}" class="btn btn-success mb-3">Create New Thread</a>

        @if($threads->count() > 0)
        @foreach ($threads as $thread)
        <div class="card mb-4 shadow-sm border-0 rounded-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h4 class="card-title mb-1">
                            <a href="{{ route('threads.show', $thread->id) }}" class="text-decoration-none text-primary">
                                {{ $thread->title }}
                            </a>
                        </h4>
                        <p class="text-muted small mb-2">
                            Posted by <strong>{{ $thread->author }}</strong> 
                            on {{ $thread->created_at }}
                        </p>
                        <p class="card-text text-secondary">{{ Str::limit($thread->content, 100) }}</p>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                    <form action="{{ route('threads.like', $thread->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-primary">
                            👍 Like
                        </button>
                    </form>
                    
                    <small class="text-muted">
                        {{ DB::table('likes')->where('thread_id', $thread->id)->count() }} Likes
                    </small>
                        |
                    <small class="text-muted">
                        {{ DB::table('replies')->where('thread_id', $thread->id)->count() }} Replies
                    </small>

                </div>

                    </div>
    
                    @auth
                    @if(auth()->user()->id == $thread->user_id)
                        <div class="btn-group">
                            <a href="{{ route('threads.edit', $thread->id) }}" class="btn btn-sm btn-outline-warning">🖉 Edit</a>
                            <form action="{{ route('threads.destroy', $thread->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">🗑 Delete</button>
                            </form>
                        </div>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    @endforeach

            <div class="d-flex justify-content-center mt-3">
                {{ $threads->links('pagination::bootstrap-4') }}
            </div>
            
        @else
            <p class="text-center text-muted">No threads found.</p>
        @endif
    </div>

    @endsection

</body>
</html>
