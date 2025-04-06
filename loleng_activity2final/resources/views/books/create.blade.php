<h1>Add New Book</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="author">Author:</label>
        <input type="text" id="author" name="author" required>
        <br>
        <label for="published_date">Published Date:</label>
        <input type="date" id="published_date" name="published_date" required>
        <br>
        <button type="submit">Save</button>    </form>