<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Bros Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar-custom {
            background-color: #0c572d;
        }

        .navbar-custom .nav-link,
        .navbar-custom .navbar-brand,
        .navbar-custom .dropdown-item {
            color: #ffffff;
        }

        .navbar-custom .nav-link:hover,
        .navbar-custom .dropdown-item:hover {
            background-color:#116134;
        }

        .content {
            padding: 30px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">TYPEFORUM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('threads.index') }}">📌 All Threads</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('threads.create') }}">➕ Create Thread</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.edit') }}">⚙️ User Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">🚪 Logout</a>
                    </li>
                </ul>
                <span class="navbar-text text-light">
                    Hello, <strong>{{ auth()->user()->name }}</strong>
                </span>
            </div>
        </div>
    </nav>

    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
