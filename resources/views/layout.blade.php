<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Ticket System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav w-100">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                @guest()
                    <div class="d-md-flex">
                        <li class="nav-item ">
                            <a class="nav-link active" aria-current="page" href="/auth/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Register</a>
                        </li>
                    </div>
                @endguest

                @auth()
                    @if(Auth::user()->role == 'admin')
                        <li class="nav-item">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/users">Users</a>
                        </li>
                        </li>
                    @endif
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/tickets">Tickets</a>
                        </li>
                        <li class="nav-item ms-auto">
                            <form method="post" action="auth/logout">
                                @csrf
                                <button class="btn btn-dark" aria-current="page" href="#">Logout</button>
                            </form>
                        </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
<div class="content">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
