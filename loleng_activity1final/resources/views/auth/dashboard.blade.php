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

    <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</body>
</html>