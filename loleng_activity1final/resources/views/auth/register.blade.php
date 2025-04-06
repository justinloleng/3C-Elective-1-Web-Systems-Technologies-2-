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
    <form action="{{route('register')}}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name')}}"><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email')}}"><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required>
        
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" required><br>


        <button type="submit">Register</button>
    </form>
</body>
</html>