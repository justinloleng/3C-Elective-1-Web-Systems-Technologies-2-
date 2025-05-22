<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h2>Single Image Upload</h2>
    <form action="{{ route('photos.store.single') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <button type="submit">Upload</button>
    </form>

    <hr>

    <h2>Multiple Images Upload</h2>
    <form action="{{ route('photos.store.multiple') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="images[]" multiple required>
        <button type="submit">Upload</button>
    </form>

    <hr>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <h2>Uploaded Images</h2>
    <div style="display: flex; flex-wrap: wrap;">
        @foreach ($photos as $photo)
            <div style="margin: 10px; text-align: center;">
                <img src="{{ asset('images/' . $photo->image) }}" width="150" height="100" style="object-fit: cover;">
                <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" style="margin-top: 5px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
        @endforeach
    </div>

    <div style="margin-top: 20px;">
        {{ $photos->links() }}
    </div>

</body>
</html>