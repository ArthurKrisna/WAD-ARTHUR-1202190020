<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<!-- NAVBAR -->

<body class="d-flex flex-column">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="collapse navbar-collapse justify-content-center d-flex" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active fw-bold':''}}" href="{{ route('index') }}">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('vaccine') ? 'active fw-bold':'' }}"
                        href="{{ route('vaccine.index') }}">VACCINE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('patient') ? 'active fw-bold':'' }}"
                        href="{{ route('patient.index') }}">PATIENT</a>
                </li>
            </ul>
        </div>
    </nav>

    @yield('content')

    @extends('layout/footer')
</body>

</html>