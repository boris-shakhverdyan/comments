<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comments</title>
</head>

<body>
    <header>
        <a href="/">Home</a>
        @auth
            <a href="/logout">Logout</a>
        @else
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endauth

    </header>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @yield('content')
</body>

</html>
